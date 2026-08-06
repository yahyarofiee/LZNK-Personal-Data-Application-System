<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Permohonan Data LZNK</title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body>

    <div class="min-h-screen flex items-center justify-center bg-cover bg-center relative"
        style="background-image: url('<?php echo e(asset('images/zakat-bg.jpg')); ?>');">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>

        <!-- Main Card -->
        <div class="relative z-10 w-full max-w-5xl bg-white text-gray-800 p-12 rounded-2xl shadow-xl">

            <!-- Logo + Title -->
            <div class="text-center mb-8">
                <img src="<?php echo e(asset('images/lznk-logo.png')); ?>" class="mx-auto h-20 mb-4">
                <h2 class="text-2xl font-semibold">Sistem Permohonan Data</h2>
                <p class="text-gray-500 text-sm">Lembaga Zakat Negeri Kedah</p>
            </div>

            <!-- Status -->
            <?php if(session('status')): ?>
                <div class="text-green-600 text-center mb-4">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <!-- Errors -->
            <?php if($errors->any()): ?>
                <div class="text-red-500 text-center mb-4">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div><?php echo e($error); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <!-- Form -->
            <form method="POST" action="<?php echo e(route('login')); ?>" class="max-w-lg mx-auto">
                <?php echo csrf_field(); ?>

                <div class="mb-5">
                    <input type="email" name="email" placeholder="Email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-5">
                    <input type="password" name="password" placeholder="Password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="flex items-center justify-between text-sm text-gray-600 mb-5">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="mr-2">
                        Remember me
                    </label>

                <?php if(Route::has('password.request')): ?>
                    <a class="text-sm text-blue-600 hover:underline"
                    href="<?php echo e(route('password.request')); ?>">
                        Lupa Kata Laluan
                    </a>
                <?php endif; ?>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold text-lg transition">
                    Log Masuk
                </button>

                <div class="text-center mt-5 text-sm text-gray-600">
                    Belum ada akaun?
                    <a href="<?php echo e(route('register')); ?>" class="text-blue-600 hover:underline font-medium">
                        Daftar
                    </a>
                </div>

            </form>

            <div class="text-center text-xs text-gray-400 mt-8">
                © <?php echo e(date('Y')); ?> LZNK System
            </div>

        </div>

    </div>

</body>
</html><?php /**PATH C:\laragon\www\MohonData-LZNK\resources\views/auth/login.blade.php ENDPATH**/ ?>