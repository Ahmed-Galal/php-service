<?php
    $encrypted_txt = $_GET["key"];
    function decryptSerial($encrypted_txt){
        $secret_key = 'your-key';
        $secret_iv = 'your-iv';
        $encrypt_method = 'AES-256-CBC';
        $key = hash('sha256', $secret_key);
        //iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        return openssl_decrypt(base64_decode($encrypted_txt), $encrypt_method, $key, 0, $iv);
    }
    $myObj = (object) null;
    $myObj->code = decryptSerial($encrypted_txt);
    echo json_encode($myObj);
?>
