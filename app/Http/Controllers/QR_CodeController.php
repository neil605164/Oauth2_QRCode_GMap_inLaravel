<?php

namespace App\Http\Controllers;

//use Zoular\Quser\Quser;
use RobbieP\ZbarQrdecoder\ZbarDecoder;
use PragmaRX\Google2FA\Google2FA;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\User;
use Auth;

class QR_CodeController extends Controller
{

    public function index()
    {
        $google2fa = new Google2FA();
        $user = Auth::User();

        return view('QR Code.index')->with("google2fa", $google2fa->getQRCodeInline(
            'test',
            $user->email,
            $user->secret
            ));
    }

    public function verify()
    {
        return view('QR Code.verify');
    }

    public function verifyProcess(Request $request)
    {
        $code = $request->code;
        $google2fa = new Google2FA();
        $user = Auth::User();

        $valid = $google2fa->verifyKey($user->secret, $code);
        if($valid){
            return view('googleMap.indexgoogle');
        }else{
            return redirect('/verify')->with('error', 'worng');
        }
    }

    public function image()
    {
        return view('QR Code.image');
    }

    public function imageProcess(Request $request)
    {
        /*#從User資料表中去找到第一筆
        $user = Auth::User();        

        #取得圖片，並將圖片移動到指定位置
        $image = $request->image;
        #給予圖片一個絕對路徑去存放
        $destinationPath = '../storages/app/';
        #給予檔案一個固定檔名存取
        $fileName = $user->name . '.png';
        
        #將圖片移動到指定位置
        $image->move($destinationPath, $fileName);
        #建立一個新物件
        $QRCode = new Quser();
        #將上傳的圖片與資料庫的做比對
        //die($user . $fileName);
        $valid = $QRCode->validQrcode($user, 'storages/app/'.$fileName);
        

        if($valid){
            return view('QR Code.index')->with("google2fa", $google2fa->getQRCodeInline(
            'test',
            $user->email,
            $user->secret
            ));
        }else{
            return redirect('/image')->with('error', 'worng');*/

            #從User資料表中去找到第一筆
            $user = Auth::User();
            #取得圖片，並將圖片移動到指定位置
            $image = $request->image;
            #給予圖片一個絕對路徑去存放
            $destinationPath = '../storages/app/';
            #給予檔案一個固定檔名存取
            $fileName = $user->name . '.png';


            #將圖片移動到指定位置
            $image->move($destinationPath, $fileName);
            #建立一個新物件
            $QRCode = new ZbarDecoder();

            #將上傳的圖片與資料庫的做比對
            $valid = $QRCode->make($destinationPath .$fileName);

            if($valid){
                return view('googleMap.indexgoogle');
            }else{
            return redirect('/image')->with('error', 'worng');
            }
    }       
}