<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-mobile-reset" style="height: 240px; margin-top: 10em">
                  <div class="card-header card-mobile" style="color: whitesmoke; font-weight: bold"><i class="fas fa-unlock"></i> Réinitialisation du mot de passe</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right" style="font-weight: bold; color: whitesmoke">Adresse e-mail</label>

                            <div class="col-md-6">
                                  <input id="email" type="email" placeholder="Ex : adresse@domaine.fr" class="my-input-texte form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary" style="width: 100%">
                                      <i class="fas fa-link"></i> Recevoir le lien de réinitialisation
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