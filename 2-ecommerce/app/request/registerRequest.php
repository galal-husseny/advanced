<?php
require_once __DIR__."\..\database\models\User.php";

class registerRequest {
    private $email;
    private $phone;
    private $password;
    private $confirmPassword;
    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

   
    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of confrimPassword
     */ 
    public function getConfrimPassword()
    {
        return $this->confirmPassword;
    }

    /**
     * Set the value of confrimPassword
     *
     * @return  self
     */ 
    public function setConfrimPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;

        return $this;
    }

/**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }
    public function emailValidation() 
    {
        $pattern = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
        // required
        $errors = [];

        if(empty($this->email)){
            $errors['email-required'] = "<div class='alert alert-danger'> Email Is Required </div>";
        }else{
            // regular expression
            if(!preg_match($pattern,$this->email)){
                $errors['email-pattern'] = "<div class='alert alert-danger'> Email Is Invalid </div>";
            }
        }
        return $errors;  
    }
    public function passwordValidation()
    {
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        $errors = [];
        // required 
        if(empty($this->password)){
            $errors['password-required'] = "<div class='alert alert-danger'> Password Is Required </div>";
        }
        // required
        if(empty($this->confirmPassword)){
            $errors['confirmPassword-required'] = "<div class='alert alert-danger'> Confirm Password Is Required </div>";
        }

        if(empty($errors)){
            // confirmed
            if($this->password !== $this->confirmPassword){
                $errors['password-confirmed'] = "<div class='alert alert-danger'> Password Dosen't Match  </div>";
            }
            //regex
            if(!preg_match($pattern,$this->password)){
                $errors['password-pattern'] = "<div class='alert alert-danger'>Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character. </div>";
            }
        }
        // print_r($errors);die;
        return $errors;  

    }
    public function emailExists()
    {
        $errors  = [];
        $userObject = new User;
        $userObject->setEmail($this->email);
        $result = $userObject->checkIfEmailExists();
        if($result){
            $errors['email-unique'] = "<div class='alert alert-danger'>Email Already Exists </div>";
        }
        return $errors;
    }
    public function phoneExists()
    {
        $errors  = [];
        $userObject = new User;
        $userObject->setPhone($this->phone);
        $result = $userObject->checkIfPhoneExists();
        if($result){
            $errors['phone-unique'] = "<div class='alert alert-danger'>Phone Already Exists </div>";
        }
        return $errors;
    }



    
}