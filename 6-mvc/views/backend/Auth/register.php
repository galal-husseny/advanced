<div class="row mt-5">
    <div class="col-12 text-center">
        <h1 class=" text-info"> Signup Now </h1>
    </div>
    <div class="offset-3 col-6">
        <!-- #success or error messsages  -->
        <?php if (app()->session->hasFlash('success')) : ?>
            <div class="alert alert-success"> <?= app()->session->getFlash('success') ?> </div>
        <?php endif; ?>
        <?php if (app()->session->hasFlash('error')) : ?>
            <div class="alert alert-danger"> <?= app()->session->getFlash('error') ?> </div>
        <?php endif; ?>
        <!-- validation errors  -->
        <?php if (app()->session->hasFlash('errors')) :  ?>
            <ul class="alert alert-danger">
                <?php foreach (app()->session->getFlash('errors') as  $error) : ?>
                    <li> <?= $error[0] ?> </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form action="<?= url('signup') ?>" method="post">
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="name" id="Name" class="form-control" placeholder="" aria-describedby="helpId" value="<?= old('name') ?>">
                <?php
                // if(app()->session->hasFlash('errors')){
                //     if(isset(app()->session->getFlash('errors')['name'])){
                //         echo "<p class='text-danger'> ".app()->session->getFlash('errors')['name'][0]." </p>";
                //     }
                // }
                ?>
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="email" id="Email" class="form-control" placeholder="" aria-describedby="helpId" value="<?= old('email') ?>">
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" name="password" id="Password" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="Gender">Gender</label>
                <select name="gender" class="form-control" id="Gender">
                    <option <?= old('gender') == 'm' ? 'selected' : '' ?> value="m">Male</option>
                    <option <?= old('gender') == 'f' ? 'selected' : '' ?> value="f">Female</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-outline-info rounded"> Sigup </button>
            </div>
        </form>
    </div>
</div>