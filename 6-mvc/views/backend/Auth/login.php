{{title=Signin}}
<div class="row mt-5">
    <div class="col-12 text-center">
        <h1 class=" text-info"> Signin </h1>
    </div>
    <div class="offset-3 col-6">
        <?php include_once component_path('response-message'); ?>

        <form action="<?= url('signin') ?>" method="post">

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
            <?php if (session()->hasFlash('wrong-attempt')) : ?>
                <p class="text-danger"> <?= session()->getFlash('wrong-attempt') ?> </p>
            <?php endif; ?>
            <div class="form-row mb-3">
                <div class="col-4">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" name="remember_me" value="1" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                    </div>
                </div>
                <div class="col-4 offset-4 text-right">
                    <a href="<?= url('email/verify') ?>"> Forget Password ? </a>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-outline-info rounded"> Signin </button>
            </div>
        </form>
    </div>
</div>