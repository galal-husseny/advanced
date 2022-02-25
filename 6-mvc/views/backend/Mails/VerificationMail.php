<div>
    <h3>
        Hello <?= $name ?>
    </h3>
    <p > Please Click On This Link To Verify Your Account </p>
    <a href="<?= url("/email-verification?email={$email}")?>" target="_blank" > <b> Verify Your Account </b> </a>
    <p > Thank You </p>
</div>