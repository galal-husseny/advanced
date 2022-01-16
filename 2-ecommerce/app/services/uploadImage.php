<?php 

class uploadimage {

    private $image;
    private $directory;
    private const maxUploadFile = 10 **6;
    private const allowedExtensions = ['png','jpg','jpeg'];

    function __construct($image,$directory)
    {
        $this->image = $image;
        $this->directory = $directory;
    }

    public function validateOnSize()
    {
        $errors = [];
        if ($this->image['size'] > self::maxUploadFile) {
            $errors['size'] = "<div class='alert alert-danger'> Too Large Image , max size is ".self::maxUploadFile." Bytes </div>";
        }
        return $errors;
    }

    public function validateOnExtension()
    {
        $errors = [];
        $extension = $this->getExtension(); // png
        if (!in_array($extension, self::allowedExtensions)) {
            $msg = "<div class='alert alert-danger'> Allowed Extensions Is ";
            foreach (self::allowedExtensions as $value) {
                $msg .= $value . ' , ';
            }
            $msg .= "</div>";
            $errors['extension'] = $msg;
        }
        return $errors;
    }

    public function uploadPhoto()
    {
         // upload image
         $photoName = time() . '-' . $_SESSION['user']->id . '.' . $this->getExtension(); // 12313512-1.png
         $fullPath =  $this->directory .$photoName;
         $status = move_uploaded_file($this->image['tmp_name'], $fullPath);
         return $status ? $photoName : "";

    }

    public function getExtension()
    {
        return pathinfo($this->image['name'], PATHINFO_EXTENSION);
    }
}