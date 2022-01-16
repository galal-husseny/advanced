<?php 

class loginRequest {
    private $password;
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

    public function passwordValidation()
    {
        
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        $errors = [];
        // required 
        if(empty($this->password)){
            $errors['password-required'] = "<div class='alert alert-danger'> Password Is Required </div>";
        }else{
            //regex
            if(!preg_match($pattern,$this->password)){
                $errors['password-pattern'] = "<div class='alert alert-danger'> Failed Attempt </div>";
            }
        }

        return $errors;
    }
}