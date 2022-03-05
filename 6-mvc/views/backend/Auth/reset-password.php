{{title=Reset Password}}
<div class="row mt-5">
    <div class="col-12 text-center">
        <h1 class=" text-info"> Reset Password </h1>
    </div>
    <div class="offset-3 col-6">
        <?php include_once component_path('response-message'); ?>

        <form action="<?= url('change-password?signture=' . $signture) ?>" method="post">
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" name="password" id="Password" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <?php
            if (session()->hasFlash('errors')) :
                if (isset(session()->getFlash('errors')['password'])) : ?>
                    <p class='text-danger'> <?= session()->getFlash('errors')['password'][0] ?> </p>
            <?php
                endif;
            endif;
            ?>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <?php
            if (session()->hasFlash('errors')) :
                if (isset(session()->getFlash('errors')['password_confirmation'])) : ?>
                    <p class='text-danger'> <?= session()->getFlash('errors')['password_confirmation'][0] ?> </p>
            <?php
                endif;
            endif;
            ?>
            <div class="form-group">
                <button class="btn btn-outline-info rounded"> Change </button>
            </div>
        </form>
    </div>
</div>