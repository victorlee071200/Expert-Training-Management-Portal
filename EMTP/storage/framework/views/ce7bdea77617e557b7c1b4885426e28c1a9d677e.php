

<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="m-10">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  <?php echo e($program->name); ?>

                </h2>



                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <section class="text-gray-700 body-font overflow-hidden bg-white">
                            <div class="container px-5 py-24 mx-auto">
                                <div class="lg:w-4/5 mx-auto flex flex-wrap">
                                    <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src = "<?php echo e(asset('storage/program_thumbnails/'.$program->thumbnail_path)); ?>" width="500" height="600">
                                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                                    <div class="m-6">
                                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Name</h2>
                                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1"><?php echo e($program->name); ?></h1>
                                    </div>

                                    <div class="m-6">
                                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Option</h2>
                                        <h1 class="text-gray-900 text-2xl title-font font-medium mb-1"><?php echo e($program->option); ?></h1>
                                    </div>

                                    <div class="m-6">
                                        <h2 class="text-sm title-font text-gray-500 tracking-widest">Type</h2>
                                        <h1 class="text-gray-900 text-2xl title-font font-medium mb-1"><?php echo e($program->type); ?></h1>
                                    </div>

                                    <div class="m-6">
                                        <h2 class="text-xs title-font text-gray-500 tracking-widest">Description</h2>
                                        <p class="leading-relaxed"><?php echo e($program->description); ?></p>
                                    </div>

                                    <div class="m-6">
                                        <h2 class="text-xs title-font text-gray-500 tracking-widest">Price</h2>
                                        <div class="flex">

                                        <span class="title-font font-medium text-2xl text-gray-900"><?php echo e($currency); ?><?php echo e(App\Helpers\CurrencyHelper::getSetPriceFormat($program->price)); ?></span>
                                        </div>
                                    </div>

                                    <?php if($userBoughtProgram): ?>
                                        <div class="m-6">
                                            <p style="color:green;font-size:20px;"><strong>You have access to this course!</strong></p>
                                        </div>

                                    <?php else: ?>
                                    <div class="m-6">
                                        <div class="block tracking-widest uppercase text-center shadow bg-green-400 hover:bg-green-500 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">
                                            
                                            <a href="<?php echo e(url('/client/program/register/'. $program->id)); ?>">Register Now</a>
                                        </div>
                                    </div>

                                    <?php endif; ?>
                              
                                    </div>
                                </div>
                            </div>
                        </section>

                        
                        <div class="ml-5">

                            <p class="text-3xl">Feedbacks</p>

                            <?php if(!($feedbacks->isEmpty())): ?>

                            <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="flex mt-6">
                            <div class="flex-shrink-0 mr-3">
                                <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src = "<?php echo e(asset('storage/profile_pictures/'.$feedback->profile_thumbnail)); ?>" alt="">
                            </div>
                            <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                                <strong><?php echo e($feedback->client_name); ?></strong> <span class="text-xs text-gray-400"><?php echo e($feedback->created_at); ?></span>
                                <p class="text-sm">
                                <?php echo e($feedback->feedback); ?>

                                </p>

                                <?php if(!($feedback->image_path == "")): ?>
                                <img width="300" height="300" src = "<?php echo e(asset('storage/feedback_images/'.$feedback->image_path)); ?>" alt="">
                                <?php endif; ?>

                            </div>
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php else: ?>
                            <p class="text-xl mt-3">This program currently don't have any feedback</p>

                            <?php endif; ?>
                            
                        </div>

                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LKW\Documents\GitHub\development_project_2\EMTP\resources\views/client/new/program/details.blade.php ENDPATH**/ ?>