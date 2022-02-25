<?php 
namespace Src\Mail;
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
class Mail {
    protected PHPMailer $mail;
    public function __construct() {
         //Server settings
         $this->mail = new PHPMailer(true);
         $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
         $this->mail->isSMTP();                                            //Send using SMTP
         $this->mail->Host       = env('MAIL_HOST');                     //Set the SMTP server to send through
         $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
         $this->mail->Username   = env('MAIL_USERNAME');                     //SMTP username
         $this->mail->Password   = env('MAIL_PASSWORD');                               //SMTP password
         $this->mail->SMTPSecure = env('MAIL_ENCRYPTION');            //Enable implicit TLS encryption
         $this->mail->Port       = env('MAIL_PORT');   
         $this->mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));    
    }
}