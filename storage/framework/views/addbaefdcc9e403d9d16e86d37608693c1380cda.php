<?php $__env->startSection('content'); ?>

<div class="contenu" >
      <div class="card-body">

          <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
          <?php endif; ?>

          <div class="container-fluid h-100" >
                   <div class="row justify-content-center h-100" >

                        <div class="col-md-4 chat hidden ">
                              <?php if($affichage_gauche == 'liste_membres'): ?>            

                                    <?php echo $__env->make('membres.liste', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                              <?php elseif($affichage_gauche == 'liste_rooms'): ?>

                                    <?php echo $__env->make('rooms.liste', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                              <?php elseif($affichage_gauche == 'room_add'): ?>

                                    <?php echo $__env->make('rooms.add', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                              <?php elseif($affichage_gauche == 'room_edit'): ?>

                                    <?php echo $__env->make('rooms.edit', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                              <?php endif; ?>
                        </div>

                        <div class="col-md-12 chat" >
                              
                              <?php echo $__env->make('messages.with_user', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--                              <?php if($affichage_droite == 'liste_messages_user'): ?>

                                    <?php echo $__env->make('messages.with_user', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                              <?php elseif($affichage_droite == 'liste_messages_room'): ?>

                                    <?php echo $__env->make('messages.in_room', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                              <?php endif; ?>-->
                        </div>

                  </div>
          </div>

      </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>