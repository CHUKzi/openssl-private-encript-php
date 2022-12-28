<?php 
/*gen privet key and public key*/

$config = array (

'config' => 'C:\xampp\htdocs\chat\openssl.cnf',
'default_mid' => 'sha512',
'privet_key_bits' => 512, //1024,2048,4096
'privet_key_type' => OPENSSL_KEYTYPE_RSA,

);

$keypair = openssl_pkey_new($config);

openssl_pkey_export($keypair, $privkey, null, $config);

$publickey = openssl_pkey_get_details($keypair);

$pubkey = $publickey['key'];

/*encript*/

echo $privkey .'</br><hr>'.$pubkey.'</br><hr>';


$text = 'This is the text to encrypt';

echo $text.'<br><br>';

openssl_public_encrypt($text, $encrypted, $pubkey);

$encrypted_hex = bin2hex($encrypted);
echo $encrypted_hex.'<br><br>';

openssl_private_decrypt($encrypted, $decrypted, $privkey);

echo $decrypted;

?>