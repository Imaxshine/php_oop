<?php
interface credentialsData
{
    public function PassData($data);
}
class Encryption implements credentialsData
{
    public function PassData($data):string
    {
        $cipher = 'AES-128-CTR';
        $key = "mySimpleOOp_Reg";
        $option = 0;
        $iv = openssl_cipher_iv_length($cipher);
        $iv_length = openssl_random_pseudo_bytes($iv);
        $encryptedData = openssl_encrypt($data,$cipher,$key,$option,$iv_length);
        return base64_encode($iv_length . $encryptedData);
    }
}
class Decryption implements credentialsData
{
    public function PassData($data):string
    {
        $cipher = 'AES-128-CTR';
        $key = "mySimpleOOp_Reg";
        $option = 0;
        $iv = openssl_cipher_iv_length($cipher);
        $decode = base64_decode($data);
        $iv_length = substr($decode,0,$iv);
        $encryptedData = substr($decode,$iv);
        return openssl_decrypt($encryptedData,$cipher,$key,$option,$iv_length);
    }
}
