<select name="<?php echo e($name); ?>" class="form-control" id="<?php echo e($name); ?>">
    <option value="">Select an option</option>
    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $value ? 'selected': ''); ?> ><?php echo e($item); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    class="form-control <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
</select><?php /**PATH /home/marcel/dev/adriado/adriano/resources/views/layouts/partials/select.blade.php ENDPATH**/ ?>