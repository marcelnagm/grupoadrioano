<?php $__env->startSection('template_title'); ?>
<?php echo e($account->name ?? __('Show') . " " . __('Account')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="content container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="float-left">
                        <span class="card-title"><?php echo e(__('Show')); ?> Account</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary btn-sm" href="<?php echo e(route('accounts.index')); ?>"> <?php echo e(__('Back')); ?></a>
                    </div>
                </div>

                <div class="card-body bg-white">
                    <?php if(Auth::user()->isAdmin()): ?>
                        <div class="form-group mb-2 mb20">
                            <strong>User Id:</strong>
                            <?php echo e($account->user_id); ?>

                        </div>
                    <?php endif; ?>
                    <div class="form-group mb-2 mb20">
                        <strong>Acconunt:</strong>
                        <?php echo e($account->acconunt); ?>

                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Agency Id:</strong>
                        <?php echo e($account->agency_id); ?>

                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Balance:</strong>
                        R$<?php echo e($account->balance); ?>

                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Operations:</strong>
                        <a class="btn btn-success" href="<?php echo e(route('accounts.deposit',['id' => $account->id])); ?>">Depositar</a>
                        <a class="btn btn-primary" href="<?php echo e(route('accounts.trasnfer',['id' => $account->id])); ?>">Transferir</a>
                        <a class="btn btn-secondary" href="<?php echo e(route('accounts.summary',['id' => $account->id])); ?>">Extrato</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/marcel/dev/adriado/adriano/resources/views/account/show.blade.php ENDPATH**/ ?>