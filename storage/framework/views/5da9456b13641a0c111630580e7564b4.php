<?php $__env->startSection('template_title'); ?>
Statements
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <?php echo e(__('Statements')); ?>

                        </span>

                        <div class="float-right">
                            <?php if(Auth::user()->isAdmin()): ?>
                                <a href="<?php echo e(route('type-operations.index')); ?>" class="btn btn-success btn-sm float-right"
                                    data-placement="left">
                                    <?php echo e(__('List Operations Types')); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success m-4">
                        <p><?php echo e($message); ?></p>
                    </div>
                <?php endif; ?>

                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>User Id</th>
                                    <th>Account Id</th>
                                    <th>Agency Id</th>
                                    <th>Value</th>
                                    <th>Deposit Account Id</th>
                                    <th>Deposit Agency Id</th>
                                    <th>Date</th>
                                    <th>Type Operation Id</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $statements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$i); ?></td>
                                        <td><?php echo e($statement->user()->first()); ?></td>
                                        <td><?php echo e($statement->account()->first()); ?></td>
                                        <td><?php echo e($statement->agency()->first()); ?></td>
                                        <td><?php echo e($statement->value); ?></td>
                                        <td><?php echo e($statement->depositAccount()->first()); ?></td>
                                        <td><?php echo e($statement->depositAgency()->first()); ?></td>
                                        <td><?php echo e($statement->date); ?></td>
                                        <td><?php echo e($statement->operation()); ?></td>


                                        <td>
                                            <form action="<?php echo e(route('statements.destroy', $statement->id)); ?>" method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                    href="<?php echo e(route('statements.show', $statement->id)); ?>"><i
                                                        class="fa fa-fw fa-eye"></i> <?php echo e(__('Show')); ?></a>
                                                <a class="btn btn-sm btn-success"
                                                    href="<?php echo e(route('statements.edit', $statement->id)); ?>"><i
                                                        class="fa fa-fw fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i
                                                        class="fa fa-fw fa-trash"></i> <?php echo e(__('Delete')); ?></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php echo $statements->withQueryString()->links(); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/marcel/dev/adriado/adriano/resources/views/statement/index.blade.php ENDPATH**/ ?>