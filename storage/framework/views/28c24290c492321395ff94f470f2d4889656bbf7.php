<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        
          <div class="col-md-8">
            <div class="card" style="height: 350px; margin-top: 10em">
                  <div class="card-header" style="color: whitesmoke; font-weight: bold"><i class="fas fa-key"></i> Connectez-vous pour ouvrir une session</div>

                <div class="card-body">
                      <form method="POST" action="<?php echo e(route('login')); ?>" id="formConnexion">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right" style="color: white">Adresse E-mail</label>

                            <div class="col-md-6">
                                  <input id="email" type="email" placeholder="" class="my-input-texte form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?> " name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right" style="color: white">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="my-input-texte form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                  <div class="form-check" style="padding-left: 18px">
                                      <input class="form-check-input" type="checkbox" style="margin-left: -17px !important; margin-right: 10px !important;" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                    <label class="form-check-label"  for="remember" style="color: white; ">
                                        Rester connecté
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">                                  
                                  <button type="submit" class="btn btn-primary" >                                      
                                      Se connecter
                                </button>

                                <?php if(Route::has('password.request')): ?>
                                    <a class="btn btn-link" style="color: white" href="<?php echo e(route('password.request')); ?>">
                                          <u>Mot de passe oublié ?</u>
                                    </a>
                                <?php endif; ?>
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