<div>
    <h3>
        Hello <?= $name ?>
    </h3>
    <p > Please Click On This Link To Verify Your Account </p>
    <a href="<?= url("/email-verification?signture={$signture}")?>" target="_blank" > <b> Verify Your Account </b> </a>
    <p > Thank You </p>
</div>