<?php
$title = "My Account";
include_once "views/layouts/header.php";
include_once "app/middlewares/auth.php";
include_once "app/services/uploadImage.php";
include_once "app/database/models/User.php";
include_once "app/request/loginRequest.php";
include_once "app/request/registerRequest.php";
include_once "app/mail/mail.php";
define('notverified',0);
$userData = new User;
$userData->setEmail($_SESSION['user']->email);
// update user in db , galal => ahmed
if (isset($_POST['update-profile'])) {
    $errors = [];
    $success = [];
    // validation
    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) and !empty($_POST['phone']) and !empty($_POST['gender'])) {
        // pass form data to user model
        $userData->setFirst_name($_POST['first_name']);
        $userData->setLast_name($_POST['last_name']);
        $userData->setPhone($_POST['phone']);
        $userData->setGender($_POST['gender']);
        // upload photo if exists
        if ($_FILES['image']['error'] == 0) {
            $directory = "assets/img/users/";
            $uploadImage = new uploadimage($_FILES['image'], $directory);
            $uploadImageSizeErrors = $uploadImage->validateOnSize();
            $uploadImageExtensionErrors = $uploadImage->validateOnExtension();
            if (empty($uploadImageSizeErrors) and empty($uploadImageExtensionErrors)) {
                $photoName = $uploadImage->uploadPhoto();
                $_SESSION['user']->image = $photoName;
                $userData->setImage($photoName);
            }
        }
        // update data if no errors in image
        if (empty($uploadImageSizeErrors) and empty($uploadImageExtensionErrors)) {
            // update database
            $updateResult = $userData->update();
            // if updated
            if ($updateResult) {
                // update session
                $_SESSION['user']->first_name = $_POST['first_name'];
                $_SESSION['user']->last_name = $_POST['last_name'];
                $_SESSION['user']->phone = $_POST['phone'];
                $_SESSION['user']->gender = $_POST['gender'];
                $success['update-profile']['message']['success'] = "<div class='alert alert-success'> Data Updated Successfully </div>";
            } else {
                // print error
                $errors['update-profile']['message']['something'] = "<div class='alert alert-danger'> Something Went Wrong </div>";
            }
        }
    } else {
        $errors['update-profile']['message']['all-fields'] = "<div class='alert alert-danger'> All Fields Are Required </div>";
    }
}

if (isset($_POST['change-password'])) {
    // validation
    $errors = [];
    $success = [];
    $oldPasswordObject = new loginRequest;
    $oldPasswordObject->setPassword($_POST['old_password']);
    // old password => required , regex
    $passwordValidationResult = $oldPasswordObject->passwordValidation();
    if (empty($passwordValidationResult)) {
        // correct old password
        $userData->setPassword($_POST['old_password']);
        if ($userData->getPassword() != $_SESSION['user']->password) {
            $errors['old-wrong'] = "<div class='alert alert-danger'> Wrong Password! </div>";
        }
        if (empty($errors['old-wrong'])) {
            $newConfirmPassword = new registerRequest;
            $newConfirmPassword->setPassword($_POST['new_password']);
            $newConfirmPassword->setConfrimPassword($_POST['confirm_password']);
            // required , confirmed , regex
            $newConfrimValidationResult = $newConfirmPassword->passwordValidation();
            if (empty($newConfrimValidationResult)) {
                // old must be a new one
                if ($_POST['old_password'] == $_POST['new_password']) {
                    $errors['old-equal-new'] = "<div class='alert alert-danger'> You Have Entered Your Old Password Again! </div>";
                }
            }
        }
    }

    // if no validation errors
    if (empty($passwordValidationResult) and empty($errors) and empty($newConfrimValidationResult)) {
        // update password
        $userData->setPassword($_POST['new_password']);
        $result = $userData->updatePassword();
        if ($result) {
            $_SESSION['user']->password = $userData->getPassword();
            $success['data'] = "<div class='alert alert-success'> Password Has Been Updated </div>";
        } else {
            $errors['something'] = "<div class='alert alert-danger'> Something Went Wrong </div>";
        }
    }
}

if(isset($_POST['change-email'])){
    $errors = [];
    $success = [];
    $emailValidation = new registerRequest;
    $emailValidation->setEmail($_POST['email']);
    $emailValidationResult = $emailValidation->emailValidation();
    if(empty($emailValidationResult)){
        if($_POST['email'] == $_SESSION['user']->email){
            $errors['old-email'] = "<div class='alert alert-danger'> You Should Change You Email Address ! </div>";
        }else{
            $userData->setEmail($_POST['email']);
            $userDatabase = $userData->checkIfEmailExists();
            if($userDatabase){
                $errors['unique-email'] = "<div class='alert alert-danger'> Email Already Has Been Taken ! </div>";
            }else{
                // update email , change status , code
                $code = rand(10000,99999);
                $userData->setStatus(notverified);
                $userData->setVerified_at('NULL');
                $userData->setCode($code);
                $userData->setId($_SESSION['user']->id);
                $updateEmailResult = $userData->updateEmail();
                if( $updateEmailResult) {
                    // send mail
                    $subject = "Ecommerce-Verification-Code-email";
                    $body = "<p>Hello {$_SESSION['first_name']}</p><p> Your Verification Code is:<b>$code</b></p><p>Thank You.</p>";
                    $newMail = new mail($_POST['email'], $subject, $body);
                    $mailResult = $newMail->sendMail();
                    if ($mailResult) {
                        $_SESSION['email'] = $_POST['email'];
                        // logout
                        unset($_SESSION['user']);
                        header("location:check-code.php?page=my-account");exit;
                    } else {
                        $errors['mail']  = "<div class='alert alert-danger'> Try To Verify You Account Later </div>";
                    }
                    // logout
                }else{
                    $errors['something'] = "<div class='alert alert-danger'> Something Went Wrong! </div>";
                }
               
                
            }
        }

    }
}

// get user from database => galal
$userData->setEmail($_SESSION['user']->email);
$userDataResult = $userData->checkIfEmailExists();
$user = $userDataResult->fetch_object();

include_once "views/layouts/nav.php";
include_once "views/layouts/breadcrumb.php";
?>
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse <?php if (isset($_POST['update-profile'])) {
                                                                                        echo "show";
                                                                                    } ?>">
                                <!--  -->
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Change Account Information</h4>
                                        </div>

                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 text-center">
                                                    <?php
                                                    if (isset($errors['update-profile']['message'])) {
                                                        foreach ($errors['update-profile']['message'] as $key => $value) {
                                                            echo $value;
                                                        }
                                                    }
                                                    if (isset($success['update-profile']['message'])) {
                                                        foreach ($success['update-profile']['message'] as $key => $value) {
                                                            echo $value;
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-lg-4 col-md-4 offset-4 mb-5">
                                                    <img src="assets/img/users/<?= $user->image ?>" alt="<?= $user->first_name . ' ' . $user->last_name ?>" class="w-100 rounded-circle">
                                                    <input type="file" name="image" class="form-control" id="">
                                                    <?php
                                                    if (isset($uploadImageSizeErrors)) {
                                                        foreach ($uploadImageSizeErrors as $key => $value) {
                                                            echo $value;
                                                        }
                                                    }
                                                    if (isset($uploadImageExtensionErrors)) {
                                                        foreach ($uploadImageExtensionErrors as $key => $value) {
                                                            echo $value;
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-lg-6 col-md-6 ">
                                                    <div class="billing-info">
                                                        <label>First Name</label>
                                                        <input type="text" name="first_name" value="<?= $user->first_name ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 ">
                                                    <div class="billing-info">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last_name" value="<?= $user->last_name ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Phone</label>
                                                        <input type="tel" name="phone" value="<?= $user->phone ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Gener</label>
                                                        <select name="gender" class="form-control" id="">
                                                            <option <?= $user->gender == 'm' ? 'selected' : '' ?> value="m">Male</option>
                                                            <option <?php if ($user->gender == 'f') {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?> value="f">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button type="submit" name="update-profile">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                            </div>
                            <div id="my-account-2" class="panel-collapse collapse <?php if (isset($_POST['change-password'])) {
                                                                                        echo "show";
                                                                                    } ?>">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Change Password</h4>
                                        </div>
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 text-center">
                                                    <?php
                                                    if (isset($success['data'])) {
                                                        echo $success['data'];
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Old Password</label>
                                                        <input type="password" name="old_password">
                                                    </div>
                                                    <?php
                                                    if (isset($passwordValidationResult)) {
                                                        foreach ($passwordValidationResult as $key => $value) {
                                                            echo $value;
                                                        }
                                                    }
                                                    if (!empty($errors)) {
                                                        foreach ($errors as $key => $value) {
                                                            echo $value;
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>New Password</label>
                                                        <input type="password" name="new_password">
                                                    </div>
                                                    <?php
                                                    if (isset($newConfrimValidationResult['password-required'])) {
                                                        echo $newConfrimValidationResult['password-required'];
                                                    }
                                                    if (isset($newConfrimValidationResult['password-pattern'])) {
                                                        echo $newConfrimValidationResult['password-pattern'];
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Password Confirm</label>
                                                        <input type="password" name="confirm_password">
                                                    </div>
                                                    <?php
                                                    if (isset($newConfrimValidationResult['confirmPassword-required'])) {
                                                        echo $newConfrimValidationResult['confirmPassword-required'];
                                                    }
                                                    if (isset($newConfrimValidationResult['password-confirmed'])) {
                                                        echo $newConfrimValidationResult['password-confirmed'];
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button type="submit" name="change-password">Change Password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Change Your Email Address</a></h5>
                            </div>
                            <div id="my-account-3" class="panel-collapse collapse <?php if(isset($_POST['change-email'])) {echo "show";} ?>">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Change Email</h4>
                                        </div>
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Email Address</label>
                                                        <input type="email" name="email" value="<?= $user->email ?>">
                                                        <?php 
                                                            if(isset($emailValidationResult)){
                                                                foreach ($emailValidationResult as $key => $value) {
                                                                    echo $value;
                                                                }
                                                            }
                                                            if(isset($errors)){
                                                                foreach ($errors as $key => $value) {
                                                                    echo $value;
                                                                }
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button type="submit" name="change-email">Change Email</button>
                                                </div>
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
</div>
<?php
include_once "views/layouts/footer.php";
?>