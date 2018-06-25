<?php
namespace app\api\controller;
/**
 * 测试接口
 * @author wangcb
 * @date 2017年11月6日下午8:30:46
 * 
 */
class Test extends Controller{
    
    /**
     * ase对称加解密
     */
    public function openssl_ase(){
        $data   = 'phpbest';
        $key    = base64_encode(openssl_random_pseudo_bytes(32));
        $iv     = base64_encode(openssl_random_pseudo_bytes(16));
        echo $key."<br/>";
        echo $iv."<br/>";
        echo '内容: '.$data."<br/>";
        
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', base64_decode($key), OPENSSL_RAW_DATA, base64_decode($iv));
        echo '加密: '.base64_encode($encrypted)."<br/>";
        
        $encrypted = base64_decode(base64_encode($encrypted));
        $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', base64_decode($key), OPENSSL_RAW_DATA, base64_decode($iv));
        echo '解密: '.$decrypted."\n";
    }
    
    /**
     * rsa 非对象加解密
     */
    public function openssl_rsa(){
        $data = 'huamill';
        echo '原始内容: '.$data."<br/>";

        openssl_public_encrypt($data, $encrypted, file_get_contents(dirname(__FILE__).'/rsa_public_key.pem'));
        echo '公钥加密: '.base64_encode($encrypted)."<br/>";
        
        $encrypted = base64_decode(base64_encode($encrypted));
        openssl_private_decrypt($encrypted, $decrypted, file_get_contents(dirname(__FILE__).'/rsa_private_key.pem'));
        echo '私钥解密: '.$decrypted."<br/>";
    }
}
