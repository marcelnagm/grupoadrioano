<?php $__env->startSection('template_title'); ?>
    <?php echo e($user->name ?? __('Show') . " " . __('User')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title"><?php echo e(__('Show')); ?> User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="<?php echo e(route('users.index')); ?>"> <?php echo e(__('Back')); ?></a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    <?php echo e($user->name); ?>

                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email:</strong>
                                    <?php echo e($user->email); ?>

                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cpf:</strong>
                                    <?php echo e($user->CPF); ?>

                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rg:</strong>
                                    <?php echo e($user->RG); ?>

                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rg Emissor:</strong>
                                    <?php echo e($user->RG_emissor); ?>

                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rg Emissao:</strong>
                                    <?php echo e($user->RG_emissao); ?>

                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/marcel/dev/adriado/adriano/resources/views/user/show.blade.php ENDPATH**/ ?>