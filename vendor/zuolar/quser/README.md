Quser

config/app.php

    providers = [ .... ....

        Zoular\Quser\QuserProvider::class,

    ]

Example

    use Zoular\Quser\Quser;

    /*** Create QR_Code PNG ***/ 
    public function create(Request $request) { 
        $user_id = $request->id;

        $qrcode = new LoginQrcode;

        $data['png'] = $qrcode->createQrcode($user_id);

    }

QRCode

    /*** Comfirm QR_Code PNG ***/ 
    public function check(Request $request) { 

        $id = $request->id; $file = $request->qrImg;
        $qrcode = new LoginQrcode;
        $user = $qrcode->validQrcode($file, $id);

        if(!$user)
        {
            $data['error'] = $qrcode->getErrorMessage();
        }

        $data['user_id'] = $user->id;

    }

Usage

    use Zoular\Quser\Quser;

    $lq = new Quser;

    $lq->createQrcode($id, $propertiesForQrcode = []); // return PNG

    $lq->validQrcode($file, $id, $path = 'qrcodes/'); // return Model::Qrcode

    $lq->getErrorMessage();

    #1: 'Need argument [ID]';

    #2: 'Need argument [File]';

    #3: 'File is not valid!';

    #4: 'File Type Error!';

    #5: 'QR_Code is not valid!';

