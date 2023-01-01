<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Scripts -->
        <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

        <!-- Styles -->
        <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet">
    </head>
    <body class="bg-gray-100 h-screen antialiased leading-none font-sans">
        <div id="app" class="font-sans text-gray-900 antialiased">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </body>

<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</html>
<?php /**PATH C:\Users\LKW\Documents\GitHub\development_project_2\EMTP\resources\views/layouts/guest.blade.php ENDPATH**/ ?>