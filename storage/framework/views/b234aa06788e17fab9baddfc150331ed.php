<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="acconunt" class="form-label"><?php echo e(__('Acconunt')); ?></label>
            <input type="text" name="acconunt" class="form-control <?php $__errorArgs = ['acconunt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('acconunt', $account?->acconunt)); ?>" id="acconunt" placeholder="Acconunt">
            <?php echo $errors->first('acconunt', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

        </div>
        <div class="form-group mb-2 mb20">
            <label for="agency_id" class="form-label"><?php echo e(__('Agency Id')); ?></label>            
            <?php echo $errors->first('agency_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

        
        <?php echo $__env->make('layouts.partials.select', [
        'list' => $agencies,
        'name' => 'agency_id',
          'value' =>   old('agency_id', $account?->agency_id) 
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div><?php /**PATH /home/marcel/dev/adriado/adriano/resources/views/account/form.blade.php ENDPATH**/ ?>