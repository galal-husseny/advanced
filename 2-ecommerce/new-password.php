<?php
$title = "Set New Password";
include_once "views/layouts/header.php";
include_once "app/request/registerRequest.php";
include_once "app/database/models/User.php";
if (isset($_POST['change-password'])) {
    $errors = [];
    $registerValidation = new registerRequest;
    $registerValidation->setPassword($_POST['password']);
    $registerValidation->setConfrimPassword($_POST['confirm_password']);
    $passwordValidationResult = $registerValidation->passwordValidation();
    if(empty($passwordValidationResult)){
        $userData = new User;
        $userData->setPassword($_POST['password']);
        $userData->setEmail($_SESSION['email']);
        $updatePasswordResult = $userData->updatePassword();
        if($updatePasswordResult){
            header('location:login.php');die;
        }else{
            $errors['something'] = "<div class='alert alert-danger'> something went wrong  </div>";
        }
    }
}
?>

<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> <?= $title ?> </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <input type="password" name="password" placeholder="New Password">
                                        <?php
                                        if (isset($passwordValidationResult['password-required'])) {
                                            echo $passwordValidationResult['password-required'];
                                        }
                                        if (isset($passwordValidationResult['password-pattern'])) {
                                            echo $passwordValidationResult['password-pattern'];
                                        }
                                        ?>
                                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                                        <?php
                                        if (isset($passwordValidationResult['confirmPassword-required'])) {
                                            echo $passwordValidationResult['confirmPassword-required'];
                                        }
                                        if (isset($passwordValidationResult['password-confirmed'])) {
                                            echo $passwordValidationResult['password-confirmed'];
                                        }

                                        if(isset($errors)){
                                            foreach ($errors as $key => $value) {
                                                echo $value;
                                            }
                                        }
                                        ?>
                                        <div class="button-box">
                                            <button type="submit" name="change-password"><span><?= $title ?></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "views/layouts/footer.php" ?>