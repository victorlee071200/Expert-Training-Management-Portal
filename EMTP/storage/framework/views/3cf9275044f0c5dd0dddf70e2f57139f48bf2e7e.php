

<?php $__env->startSection('content'); ?>

<div class="bg-white sm:rounded-lg flex">
    <!-- side nav -->
    <div class="bg-gray-300 text-gray-800 hidden md:flex h-auto">
        <ul>
            <li>
                <a href="<?php echo e(route('client.program-detail', $registeredprograms->program_id)); ?>" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Details</a>
            </li>
            <li>
                <a href="<?php echo e(route('client.program-announcement', $registeredprograms->program_id)); ?>" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Announcement</a>
            </li>
            <li>
                <a href="<?php echo e(route('client.program-material', $registeredprograms->program_id)); ?>" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 bg-white text-indigo-600 h-16 flex justify-center items-center w-auto">Materials</a>
            </li>
            <li>
                <a href="<?php echo e(route('client.program-feedback', $registeredprograms->program_id)); ?>" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Feedback</a>
            </li>
        </ul>
    </div>
    <div class="block w-full min-h-screen">
        <div class="mb-5">
            <h2 class="text-3xl font-bold text-gray-800 py-4 px-4 border-b border-gray-100 w-auto">
                <?php echo e(__('Material')); ?>

            </h2>
        </div>
        <div class="p-3 mx-2">

            <?php if($registeredprograms->status == 'approved' || $registeredprograms->status == 'completed'): ?>
            <h3> Download the ZIP file by clicking the link below </h3>
            <a href="<?php echo e(asset('storage/program_documents/'.$program_details->training_document)); ?>" download>
                <p class="hover:bg-blue-700 mt-5 text-xl inline-block"><?php echo e($program_details->training_document); ?> <i class="fa fa-download" aria-hidden="true"></i></p>
            </a>

            <?php else: ?>
            <h3> Please pay the program fee in order to view and download the training materials. If you have already paid, please wait for the staff to confirm the program. </h3>

            <?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LKW\Documents\GitHub\development_project_2\EMTP\resources\views/client/program/material.blade.php ENDPATH**/ ?>