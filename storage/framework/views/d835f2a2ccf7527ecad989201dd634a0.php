<?php $__env->startSection('template_title'); ?>
__('Transfer') . " " . __('Account') }}
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container">    
<div class="row padding-1 p-1">
    <h3>Dados do Pagador</h3>

    <div class="col-md-12 justify-content-center">
        <div class="row">
            <div class="col-md-3 h6">
                Conta Origem:
            </div>
            <div class="col-md-9 h6">
                <?php echo e($account->acconunt); ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-3 h6">
                Agencia Origem:
            </div>
            <div class="col-md-9 h6">
                <?php echo e($account->agency()->first()); ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-3 h6">
                Saldo:
            </div>
            <div class="col-md-9 h6">
                R$<?php echo e($account->balance); ?>

            </div>
        </div>
    </div>
    <hr>
    <h3>Dados do Destino</h3>
    <div class="col-md-8">
        <form action="<?php echo e(route('accounts.processTransfer', ['id' => $account->id])); ?>" role="form"
            enctype="multipart/form-data" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group mb-2 mb20">
                <label for="ammount" class="form-label"><?php echo e(__('Valor:')); ?></label>
                <input type="number" min="0.01" max="<?php echo e($account->balance); ?>" step="0.01" name="ammount"
                    class="form-control <?php $__errorArgs = ['ammount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ammount"
                    placeholder="Quanto deseja Transferir?">
                <?php echo $errors->first('acconunt', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

            </div>
            <div class="form-group mb-2 mb20">
                <label for="deposit_account_id" class="form-label"><?php echo e(__('Conta Recebedora')); ?></label>
                <input type="text" name="deposit_account_id"
                    class="form-control <?php $__errorArgs = ['deposit_account_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="deposit_account_id"
                    placeholder="Acconunt">
                <?php echo $errors->first('deposit_account_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

            </div>
            <div class="form-group mb-2 mb20">
                <label for="deposit_agency_id" class="form-label"><?php echo e(__('Agencia Recebora')); ?></label>
                <?php echo $errors->first('deposit_agency_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                <?php echo $__env->make('layouts.partials.select', [
    'list' => $agencies,
    'name' => 'deposit_agency_id',
    'value' => ''
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
          <div   class="col-md-12 mt20 mt-2">
            <input type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></input>
          </div>
</form>
    </div>
</div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/marcel/dev/adriado/adriano/resources/views/account/transfer.blade.php ENDPATH**/ ?>