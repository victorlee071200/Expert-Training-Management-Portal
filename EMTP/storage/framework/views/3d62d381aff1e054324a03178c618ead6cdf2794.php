

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
                <a href="<?php echo e(route('client.program-material', $registeredprograms->program_id)); ?>" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 h-16 flex justify-center items-center w-auto">Materials</a>
            </li>
            <li>
                <a href="<?php echo e(route('client.program-feedback', $registeredprograms->program_id)); ?>" class="hover:bg-white hover:text-indigo-600 px-7 md:px-16 lg:px-20 bg-white text-indigo-600 h-16 flex justify-center items-center w-auto">Feedback</a>
            </li>
        </ul>
    </div>
    <div class="block w-full min-h-screen">
        <div class="mb-5">
            <h2 class="text-3xl font-bold text-gray-800 py-4 px-4 border-b border-gray-100 w-auto">
                <?php echo e(__('Feedback')); ?>

            </h2>
        </div>
        <div class="p-6">
            <p class="text-3xl">My Feedback</p>

            <?php if(!($registeredprograms->status == "completed")): ?>
            <p class="text-m mt-3">
                You can only give a feedback after you have completed a program. The feedback form is only available after the staff has marked your program as completed.
            </p>

            <?php elseif($registeredprograms->status == "completed"): ?>
                <?php if($clientfeedback): ?>
                    <div class="mb-8">
                    </div>

                    <div class="flex mt-6">

                        <div class="flex-shrink-0 mr-3">
                            <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src = "<?php echo e(asset('storage/profile_pictures/'.$clientfeedback->profile_thumbnail)); ?>" alt="">
                        </div>
                        <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                            <strong><?php echo e($clientfeedback->client_name); ?></strong> <span class="text-xs text-gray-400"><?php echo e($clientfeedback->created_at); ?></span>

                            <form id="feedbackForm" action="/client/feedbacks/<?php echo e($clientfeedback->id); ?>/edit" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>

                                <div class="mb-8">
                                    <label class="text-xl text-gray-600">Your feedback <span class="text-red-500">*</span></label><br/>
                                    <textarea id="feedback" required rows="5" cols="80" id="feedback" name="feedback" class="border-2 border-gray-500"></textarea>
                                </div>

                                <?php if(!($clientfeedback->image_path == "")): ?>
                                    <div class="mb-8">
                                        <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            You have uploaded an image for the feedback. Uploading again will replace the current one.
                                        </p>

                                        <img width="300" height="300" src = "<?php echo e(asset('storage/feedback_images/'.$clientfeedback->image_path)); ?>" alt="yourimage">
                                    </div>
                                <?php endif; ?>

                                <div class="mb-8">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">
                                        Upload an image (Less than 500KB)
                                    </label>
                                    <input type="file" id="image" name="image" accept="image/*" onchange="checkSize()">

                                    <script>
                                        function checkSize(){
                                            var uploadField = document.getElementById("image");

                                            if(uploadField.files[0].size > 500000){
                                                alert("File is too big!");
                                                uploadField.value = "";
                                            };

                                        }
                                    </script>

                                </div>

                                <input type="hidden" id="clientprogramid" name="clientprogramid" value=<?php echo e($clientfeedback->program_id); ?>>

                                <div class="p-1 justify-end">
                                    <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Edit</button>
                                </div>

                            </form>

                            <p id="feedbackText" class="text-sm">
                                <?php echo e($clientfeedback->feedback); ?>

                            </p>

                            <img id="feedbackImage" src = "" alt="">

                            <div class="p-1 justify-end">
                                <button id="editButton1" onclick="editFeedback()" role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Edit</button>
                            </div>

                        </div>
                    </div>

                    <script>

                        function editFeedback() {
                          var feedbackText = document.getElementById("feedbackText");
                          var feedbackImage = document.getElementById("feedbackImage");
                          var feedbackForm = document.getElementById("feedbackForm");
                          var editButton1 = document.getElementById("editButton1");

                          feedbackText.style.display = "none";
                          feedbackImage.style.display = "none";
                          editButton1.style.display = "none";


                          feedbackForm.style.display = "inline";

                        }

                        function myFunction() {
                              document.getElementById("feedback").value = "<?php echo e($clientfeedback->feedback); ?>";
                              document.getElementById("feedbackForm").style.display = "none";

                              if ("<?php echo e($clientfeedback->image_path); ?>"){
                              feedbackImage.src = "<?php echo e(asset('storage/feedback_images/'.$clientfeedback->image_path)); ?>";
                              feedbackImage.height = 300;
                              feedbackImage.width = 300;

                          }
                        }

                            window.onload = myFunction();
                    </script>

                <?php else: ?>
                    <form method="POST" action="<?php echo e(route('client.program-feedback', $registeredprograms->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="mb-8">
                            <label class="text-xl text-gray-600">Your feedback <span class="text-red-500">*</span></label><br/>
                            <textarea required rows="5" cols="80" id="feedback" name="feedback" class="border-2 border-gray-500"></textarea>
                        </div>

                        <div class="mb-8">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">
                                Upload an image (Less than 500KB)
                            </label>
                            <input type="file" id="image" name="image" accept="image/*" onchange="checkSize()">

                            <script>
                                function checkSize(){
                                    var uploadField = document.getElementById("image");

                                    if(uploadField.files[0].size > 500000){
                                        alert("File is too big!");
                                        uploadField.value = "";
                                    };

                                }
                            </script>
                        </div>

                        <input type="hidden" id="programid" name="programid" value=<?php echo e($program_details->id); ?>>
                        <input type="hidden" id="clientprogramid" name="clientprogramid" value=<?php echo e($registeredprograms->id); ?>>

                        <div class="p-1 justify-end">
                            <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                        </div>
                    </form>
                <?php endif; ?>
            <?php endif; ?>

            
            <div class="mb-8 mt-10">
                <p class="text-3xl">Feedback from others</p>
                <?php if(!($feedbacks->isEmpty())): ?>
                    <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex mt-6">
                            <div class="flex-shrink-0 mr-3">
                                <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src = "<?php echo e(asset('storage/profile_pictures/'.$feedback->profile_thumbnail)); ?>" alt="">
                            </div>
                            <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                                <strong><?php echo e($feedback->client_name); ?></strong> <span class="text-xs text-gray-400"><?php echo e($feedback->created_at); ?></span>
                                <p class="text-sm"><?php echo e($feedback->feedback); ?></p>
                                <?php if(!($feedback->image_path == "")): ?>
                                    <img width="300" height="300" src = "<?php echo e(asset('storage/feedback_images/'.$feedback->image_path)); ?>" alt="">
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>

        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content');
        </script>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LKW\Documents\GitHub\development_project_2\EMTP\resources\views/client/program/feedback.blade.php ENDPATH**/ ?>