<?php $__env->startSection('template_title'); ?>
__('Deposit') . " " . __('Account') }}
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<div class="row padding-1 p-1"></div>
    <div class="col-md-12">
        <form action="<?php echo e(route('accounts.processDeposit', ['id' => $account->id])); ?>" role="form" enctype="multipart/form-data" method="POST">
        <?php echo csrf_field(); ?>            
            <input type="hidden" name="id" value="<?php echo e($account->id); ?>">
            <div class="form-group mb-2 mb20">
                <label for="acconunt" class="form-label"><?php echo e(__('Ammount')); ?></label>
                <input type="number" min="0.01" max="100000" step="0.01" name="ammount"
                    class="form-control <?php $__errorArgs = ['ammount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ammount"
                    placeholder="Quanto deseja depositar?">
                <?php echo $errors->first('acconunt', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

            </div>
            <div class="col-md-12 mt20 mt-2">
                <input type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></input>
            </div>
        </form>
    </div>
</div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/marcel/dev/adriado/adriano/resources/views/account/deposit.blade.php ENDPATH**/ ?>