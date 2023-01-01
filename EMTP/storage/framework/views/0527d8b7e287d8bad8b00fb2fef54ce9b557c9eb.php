

<?php $__env->startSection('content'); ?>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg min-h-screen">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight px-32 py-5">
            <?php echo e(__('Dashboard')); ?>

        </h2>
        <!--Card list container-->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-1 mx-2">
            <?php $__currentLoopData = $registeredprograms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indexKey => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!--card container-->
                <div class="hover:bg-gray-100 lg:m-4 shadow-md hover:shadow-lg rounded-lg bg-white w-auto">
                    <!-- Card Image -->
                    <a class="hover:bg-blue-700" href="/client/dashboard/<?php echo e($program->program_id); ?>/detail">
                    <img src = "<?php echo e(asset('storage/program_thumbnails/'.$program_details[$indexKey]->thumbnail_path)); ?>" alt="fitness training" class="h-auto">
                    <!-- Card Content -->
                    <div class="p-4">
                        <h3 class="font-medium text-gray-600 text-lg my-2 uppercase"><?php echo e($program_details[$indexKey]->name); ?></h3>
                        <p class="text-justify"><?php echo e(substr($program_details[$indexKey]->description,0,100)); ?>...</p>
                        <div class="mt-5">
                            <span class="rounded-full py-2 px-3 font-semibold bg-gray-200 text-gray-800 ml-2"><?php echo e($program->status); ?></span>
                        </div>
                    </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LKW\Documents\GitHub\development_project_2\EMTP\resources\views/client/new/dashboard/index.blade.php ENDPATH**/ ?>