

<?php $__env->startSection('content'); ?>
    <style>
        .bg-image {
          background:url(https://images.unsplash.com/photo-1596079890744-c1a0462d0975?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1351&q=80);
          background-size:cover;
          background-repeat:no-repeat;
        }

        body {background:rgb(240, 240, 240) !important;}

      </style>
      <!-- section end -->

      <div class="section bg-image flex overflow-hidden h-screen text-gray-800">
        <div class="hero bg-gray-200 text-center grid md:grid-cols-2 border w-4/6 m-auto p-8 bg-opacity-90 rounded-lg">
          <img class="icon m-auto rounded-lg" src="https://images.unsplash.com/photo-1585336261022-680e295ce3fe?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="" />
          <div class="text m-auto text-lg md:ml-5 p-5 md:text-left">
            <div class="head text-3xl mb-3 font-semibold">Why Us ?</div>
            <div class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta minus excepturi facilis eveniet consequatur doloremque rerum pariatur, velit nemo debitis libero, iusto a sapiente veniam dolor culpa quibusdam sed laudantium.</div>
          </div>
        </div>
      </div>
      <!-- section end -->

<body class="antialiased md:bg-gray-100">

    <!--Parent div-->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <!--First card-->
        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="md:p-8 p-2 bg-white m-10">
            <!--Banner image-->
            <img class="rounded-lg w-full h-2/5" src = "<?php echo e(asset('storage/program_thumbnails/'.$program->thumbnail_path)); ?>">

            <div class="m-2">
                <!--Tag-->
                <p class="text-indigo-500 font-semibold text-base mt-2"><?php echo e($program->code); ?></p>
            </div>

            <div class="m-2">
                <!--Title-->
                <h1 class="font-semibold text-gray-900 leading-none text-xl mt-1 capitalize truncate">
                    <?php echo e($program->name); ?>

                </h1>
            </div>

            <div class="m-2">
                <!--Description-->
                <div class="max-w-full">
                <p class="text-base font-medium tracking-wide text-gray-600 mt-1">
                <?php echo e($program->description); ?>

                </p>
            </div>
            </div>

            <div class="m-2">
                <div class="flex items-center space-x-2 mt-20">
                    <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white transition bg-indigo-500 rounded shadow ripple hover:shadow-lg hover:bg-indigo-600 focus:outline-none">
                    <a href="<?php echo e(route('client.program.show', $program->id)); ?>">View More</a>
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div>
</body>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LKW\Documents\GitHub\development_project_2\EMTP\resources\views/client/new/program/index.blade.php ENDPATH**/ ?>