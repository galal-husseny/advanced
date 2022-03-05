{{title=Verify Email}}
<div class="row mt-5">
    <div class="col-12 text-center">
        <h1 class=" text-info"> Verify Your Email Address </h1>
    </div>
    <div class="offset-3 col-6">
        <?php include_once component_path('response-message'); ?>

        <form action="<?= url('email/verify') ?>" method="post">

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="email" id="Email" class="form-control" placeholder="" aria-describedby="helpId" value="<?= old('email') ?>">
            </div>
            <?php
            if (session()->hasFlash('errors')) :
                if (isset(session()->getFlash('errors')['email'])) : ?>
                    <p class='text-danger'> <?= session()->getFlash('errors')['email'][0] ?> </p>
            <?php
                endif;
            endif;
            ?>
            <div class="form-group">
                <button class="btn btn-outline-info rounded"> Verify </button>
            </div>
        </form>
    </div>
</div>