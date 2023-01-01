

<?php $__env->startSection('content'); ?>

<div class="bg-white sm:rounded-lg flex">
    <!-- side nav -->
    <div class="bg-gray-300 text-gray-800 hidden md:flex h-auto">
        <ul>
            <li>
                <a href="<?php echo e(route('client.program-detail', $registeredprograms->program_id)); ?>" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Details</a>
            </li>
            <li>
                <a href="<?php echo e(route('client.program-announcement', $registeredprograms->program_id)); ?>" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 bg-white text-indigo-600 h-16 flex justify-center items-center w-auto">Announcement</a>
            </li>
            <li>
                <a href="<?php echo e(route('client.program-material', $registeredprograms->program_id)); ?>" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Materials</a>
            </li>
            <li>
                <a href="<?php echo e(route('client.program-feedback', $registeredprograms->program_id)); ?>" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Feedback</a>
            </li>
        </ul>
    </div>
    <div class="block w-full min-h-screen">
        <div class="mb-5">
            <h2 class="text-3xl font-bold text-gray-800 py-4 px-4 border-b border-gray-100 w-auto">
                <?php echo e(__('Announcement')); ?>

            </h2>
        </div>
        <div class="p-3 mx-2">
            <table class="w-full">
                <?php if($registeredprograms->payment_status == "approved" && $registeredprograms->status != "to-be-confirmed"): ?>
                    <?php $__currentLoopData = $announcement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indexKey => $announcements): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($announcements->state == "ACTIVE"): ?>
                            <tr class="grid-cols-1 rounded shadow-sm">
                                <th class="w-auto py-5 px-2 hover:bg-gray-50">
                                    <a href="<?php echo e(route('client.program-specific-announcement', [ $registeredprograms->id, $announcements->id])); ?>">
                                        <h2 class="text-left pl-10"><?php echo e($announcements->title); ?></h2>
                                    </a>
                                </th>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <p class="px-2">Please pay the program fee in order to view the announcement. If you have already paid, please wait for the staff to confirm the program.</p>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LKW\Documents\GitHub\development_project_2\EMTP\resources\views/client/program/announcement.blade.php ENDPATH**/ ?>