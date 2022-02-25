<?php 
namespace Src\Support;
class Session {

    public function __construct() {
        $this->expireFlashMessage();
    }

    private function expireFlashMessage(){
        $flashMessages = $_SESSION['flash'] ?? [];
        foreach ($flashMessages as &$flashMessage) {
            $flashMessage['remove'] = true;
         }
         $_SESSION['flash'] = $flashMessages;
    }

    public function put(string $key,$value) :void
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key) 
    {
        return $_SESSION[$key] ?? null;
    }

    public function has(string $key) :bool
    {
        return (bool) isset($_SESSION[$key]);
    }

    public function forget(string $key)
    {
        if($this->has($key)) {
            unset($_SESSION[$key]);
            return true;
        }else{
            return false;
        };
    }

    public function setFlash(string $key , $message)
    {
        $_SESSION['flash'][$key] = ['remove'=>false,'content'=>$message];
    }

    public function getFlash(string $key)
    {
       return $_SESSION['flash'][$key]['content'] ?? null;
    }

    public function hasFlash(string $key) :bool
    {
        return (bool) isset($_SESSION['flash'][$key]);
    }

    public function flush() :void
    {
        session_unset();
    }

    public function __destruct () {
       $this->revokeFlashMessages();
    }
    private function revokeFlashMessages(){
        $flashMessages = $_SESSION['flash'] ?? [];
        foreach ($flashMessages as $key => $flashMessage) {
            if($flashMessage['remove']){
                unset($flashMessages[$key]);
            }
        }
        $_SESSION['flash'] = $flashMessages;
    }
}


