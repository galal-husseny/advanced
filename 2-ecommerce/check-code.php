<?php
$title = "Check Code";
include_once "views/layouts/header.php";
include_once "app/request/checkCodeRequest.php";
include_once "app/database/models/User.php";

// print_r($_GET);die;
if ($_GET) {
    if (!isset($_GET['page'])) {
        header('location:views/errors/404.php');die;
    }else{
      if(!in_array($_GET['page'],["login","register","verify","my-account"])){
        header('location:views/errors/404.php');die;
      }  
    }
} else {
    header('location:views/errors/404.php');die;
}

if (isset($_POST['check-code'])) {
    $errors = [];
    $checkCOde = new checkCodeRequest;
    $checkCOde->setCode($_POST['code']);
    // required , numeric , digits:5
    $codeValidationResult = $checkCOde->codeValidation();
    if (empty($codeValidationResult)) {
        // check if code correct in db
        $userData = new User;
        $userData->setCode($_POST['code']);
        $userData->setEmail($_SESSION['email']);
        $checkCodeResult = $userData->checkCode();
        if ($checkCodeResult) {
            // update status , change email verified_at
            $userData->setStatus(1);
            $userData->setVerified_at(date("Y-m-d H:i:s"));
            $verifyUserResult = $userData->verifyUser();
            if ($verifyUserResult) {
                switch ($_GET['page']) {
                    case 'login':
                        $_SESSION['user'] = $checkCodeResult->fetch_object();
                        unset($_SESSION['email']);
                        header('location:index.php');die;
                    case 'register':
                        unset($_SESSION['email']);
                        header('location:login.php');die;
                    case 'my-account':
                        $_SESSION['user'] = $checkCodeResult->fetch_object();
                        unset($_SESSION['email']);
                        header('location:my-account.php');die;
                    case 'verify':
                        header('location:new-password.php');die;
                    default:
                        header('location:views/errors/404.php');die;
                }
            } else {
                $errors['something'] = "<div class='alert alert-danger'> Something Went Wrong </div>";
            }
        } else {
            $errors['wrong'] = "<div class='alert alert-danger'> Code Isn't Correct </div>";
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
                                        <input type="number" name="code" placeholder="Code">
                                        <?php
                                        if (!empty($codeValidationResult)) {
                                            foreach ($codeValidationResult as $key => $value) {
                                                echo $value;
                                            }
                                        }
                                        if (isset($errors['wrong'])) {
                                            echo $errors['wrong'];
                                        }
                                        if (isset($errors['something'])) {
                                            echo $errors['something'];
                                        }
                                        ?>
                                        <div class="button-box">
                                            <button type="submit" name="check-code"><span><?= $title ?></span></button>
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