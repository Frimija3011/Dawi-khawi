<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-mobile"  style="height: 380px; margin-top: 10em">
                  <div class="card-header" style="color: whitesmoke; font-weight: bold"><i class="fas fa-pencil-alt"></i> Inscription rapide</div>

                <div class="card-body">
                      <form method="POST" action="<?php echo e(route('register')); ?>" id="formInscription">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="color: whitesmoke">Votre pseudo</label>

                            <div class="col-md-6">
                                  <input id="name" type="text" placeholder="Visible par tous" class="my-input-texte form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="color: whitesmoke">Adresse e-mail</label>

                            <div class="col-md-6">
                                  <input id="email" placeholder="Ex : adresse@domaine.fr" type="email" class="my-input-texte form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="color: whitesmoke">Mot de passe</label>

                            <div class="col-md-6">
                                  <input id="password" placeholder="Minimum 6 caractères" type="password" class="my-input-texte form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="color: whitesmoke">Confirmation</label>

                            <div class="col-md-6">
                                  <input id="password-confirm" placeholder="Confirmez-le ici" type="password" class="my-input-texte form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary" style="width: 100%">
                                      <i class="fas fa-check"></i> S'inscrire
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>