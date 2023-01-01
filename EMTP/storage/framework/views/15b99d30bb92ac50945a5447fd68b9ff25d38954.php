

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
        <div class="mb-5 ml-3 text-3xl font-bold text-gray-800 py-4 px-4 border-b border-gray-100">
            <h2 class="">
                <?php echo e($announcement->title); ?>

            </h2>
            <p class="text-xs text-gray-400">Date created: <?php echo e($announcement->created_at); ?></p>
            <p class="text-xs text-gray-400">Date updated: <?php echo e($announcement->updated_at); ?></p>
        </div>
        <div class="px-5 mt-2 mx-2">
            <?php echo e($announcement->content); ?>

        </div>
        <div class="mt-5 mx-7">
            <a href="<?php echo e(route('client.program-announcement', $registeredprograms->id)); ?>">
                <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white transition bg-indigo-500 rounded shadow ripple hover:shadow-lg hover:bg-indigo-600 focus:outline-none">
                    Back
                </button>
            </a>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LKW\Documents\GitHub\development_project_2\EMTP\resources\views/client/program/view_announcement.blade.php ENDPATH**/ ?>