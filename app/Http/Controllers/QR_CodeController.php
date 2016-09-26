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
            			return redirect('indexgoogle');
        		}else{
            			return redirect('/verify')->with('error', '驗證碼錯誤');
       		 }
   	}

    	public function image()
    	{
        		return view('QR Code.image');
    	}

    	public function imageProcess(Request $request)
    	{
	        	$user = Auth::User();
	            	#取得圖片
	            	$image = $request->image;

	            	if(!$image){
	            		//die($fileName);
	            		return redirect('/image')->with('error', '請上傳圖片');
	            	}

	            	#給予圖片一個絕對路徑去存放
	            	$destinationPath = '../storages/app/';
	            	#給予檔案一個固定檔名存取
	            	$fileName = $user->name . '.png';
	           	
	            	#將圖片移動到指定位置
	            	$image->move($destinationPath, $fileName);
	            	#建立一個新物件
	            	$QRCode = new ZbarDecoder();

	            	#將上傳的圖片與資料庫的做比對
	            	// Outputs the decoded text
	            	$valid = $QRCode->make($destinationPath .$fileName);

	            	//與資料庫的secert進行比對
	            	$result = str_contains($valid , $user->secret );
	            	
	            	if($result){
	            		//die($fileName);
	                	return redirect('indexgoogle');
	            	}else{
	            		return redirect('/image')->with('error', '圖片錯誤');
	            	}
    	}       
}