<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akaun - Sistem Permohonan Data LZNK</title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">

        <!-- Card -->
        <div class="w-full max-w-5xl bg-white p-12 rounded-2xl shadow-xl">

            <!-- Header -->
            <div class="text-center mb-8">
                <img src="<?php echo e(asset('images/lznk-logo.png')); ?>" class="mx-auto h-20 mb-4">
                <h2 class="text-2xl font-semibold">Daftar Akaun</h2>
                <p class="text-gray-500 text-sm">Sistem Permohonan Data LZNK</p>
            </div>

            <!-- Error -->
            <?php if($errors->any()): ?>
                <div class="mb-4 text-red-500 text-center">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div><?php echo e($error); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <!-- Form -->
            <form method="POST" action="<?php echo e(route('register')); ?>" class="max-w-xl mx-auto">
                <?php echo csrf_field(); ?>

                <!-- Name -->
                <div class="mb-5">
                    <label class="block text-sm mb-1">Nama</label>
                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>

                <!-- Email -->
                <div class="mb-5">
                    <label class="block text-sm mb-1">Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <label class="block text-sm mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>

                <!-- Confirm Password -->
                <div class="mb-5">
                    <label class="block text-sm mb-1">Sahkan Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold text-lg transition">
                    Daftar Akaun
                </button>

                <!-- Login Link -->
                <div class="text-center mt-5 text-sm text-gray-600">
                    Sudah ada akaun?
                    <a href="<?php echo e(route('login')); ?>" class="text-blue-600 hover:underline font-medium">
                        Log Masuk
                    </a>
                </div>
            </form>

            <!-- Footer -->
            <div class="text-center text-xs text-gray-400 mt-8">
                © <?php echo e(date('Y')); ?> LZNK System
            </div>

        </div>

    </div>

</body>
</html><?php /**PATH C:\laragon\www\MohonData-LZNK\resources\views/auth/register.blade.php ENDPATH**/ ?>