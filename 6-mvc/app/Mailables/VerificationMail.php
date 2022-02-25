<?php 
namespace App\Mailables;
use Src\Mail\Mail;
use PHPMailer\PHPMailer\Exception;

class VerificationMail extends Mail {
    private $emailTo,$subject,$body;
    public function __construct(string $emailTo,string $subject ,string $body) {
        parent::__construct();
        $this->emailTo = $emailTo;
        $this->body = $body;
        $this->subject = $subject;
    }
    public function send()
    {
        try{
            //Recipients
            $this->mail->addAddress($this->emailTo);               //Name is optional
    
            //Content
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = $this->subject;
            $this->mail->Body    = $this->body;
    
            $this->mail->send();
            // return 'Message has been sent';
            return true;
        }catch(Exception $e){
            // return "Mail Faild :{$e->errorMessage()}";
            return false;
        }
       
    }
}

