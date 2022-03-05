<div>
    <h3>
        Hello <?= $name ?>
    </h3>
    <p > Please Click On This Link To Reset Your Password </p>
    <a href="<?= url("/change-password?signture={$signture}")?>" target="_blank" > <b> Reset Password </b> </a>
    <p> This Link Will Expired At  <b>  <?= $expirationDate ?>  </b> </p>
    <p > Thank You </p>
</div>