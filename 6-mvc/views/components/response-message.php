<!-- #success or error messsages  -->
<?php if (session()->hasFlash('success')) : ?>
    <div class="alert alert-success"> <?= session()->getFlash('success') ?> </div>
<?php endif; ?>
<?php if (session()->hasFlash('error')) : ?>
    <div class="alert alert-danger"> <?= session()->getFlash('error') ?> </div>
<?php endif; ?>