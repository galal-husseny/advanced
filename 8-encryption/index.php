  
<?php

// Store a string into the variable which
// need to be Encrypted
$simple_string = "Advanced Course";
  
// Display the original string
echo "Original String: " . $simple_string .'<br>';
  
// Store the cipher method
$ciphering = "aes-128-cbc-hmac-sha256";
  
// Use OpenSSl Encryption method
// $iv_length = openssl_cipher_iv_length($ciphering);

$options = 0;
  
// Non-NULL Initialization Vector for encryption
$encryption_iv = '1234567897654321';
  
// Store the encryption key
$encryption_key = "WELCOMETONTI";
  
// Use openssl_encrypt() function to encrypt the data
$encryption = openssl_encrypt($simple_string, $ciphering,
            $encryption_key, $options, $encryption_iv);
  
// Display the encrypted string
echo "Encrypted String: " . $encryption . "\n" .'<br>';
  








// Non-NULL Initialization Vector for decryption
$decryption_iv = '1234567897654321';
  
// Store the decryption key
$decryption_key = "WELCOMETONTI";
  
// Use openssl_decrypt() function to decrypt the data
$decryption=openssl_decrypt ($encryption, $ciphering, 
        $decryption_key, $options, $decryption_iv);
  
// Display the decrypted string
echo "Decrypted String: " . $decryption .'<br>';
  
?>