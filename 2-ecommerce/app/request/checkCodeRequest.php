<?php 

class checkCodeRequest {
    private $code;
    

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function codeValidation()
    {
        $errors = [];
        // required
        if(empty($this->code)){
            $errors['code-required'] = "<div class='alert alert-danger'> Code Is Required </div>";
        }else{
            // numeric
            if(!is_numeric($this->code)){
                $errors['code-numeric'] = "<div class='alert alert-danger'> Code Must Be a number </div>";
            }else{
                // 5 digits
                if(strlen($this->code) != 5){
                    $errors['code-invalid'] = "<div class='alert alert-danger'> Invalid Code </div>";
                }
            }
        }
       
       
        
        return $errors;
    }
}