<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $__env->yieldContent('title', 'GameLib'); ?></title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
  <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-gray-100">
  <header class="bg-white shadow-md">
    <nav class="container mx-auto px-4 py-4">
      <div class="flex justify-between items-center">
        <a href="<?php echo e(route('home')); ?>" class="text-xl font-bold text-gray-800">
          GameLib
        </a>
        <div class="space-x-4">
          <a href="<?php echo e(route('presentation')); ?>" class="text-gray-600 hover:text-gray-900">Présentation</a>
          <a href="<?php echo e(url('/games')); ?>" class="text-gray-600 hover:text-gray-900">Liste des jeux</a>
          <a href="<?php echo e(route('games.create')); ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Ajouter un jeu
          </a>
        </div>
      </div>
    </nav>
  </header>

  <main class="container mx-auto px-4 py-8">
    <?php if(session('success')): ?>
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        <?php echo e(session('success')); ?>

      </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <?php echo e(session('error')); ?>

      </div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>
  </main>

  <footer class="bg-white shadow-md mt-8">
    <div class="container mx-auto px-4 py-6">
      <p class="text-center text-gray-600">
        © <?php echo e(date('Y')); ?> GameLib - made with ❤️ by <a href="https://github.com/not-Kami" class="text-blue-500">Nacho</a> <span class="text-white">et ChatGPT aussi ...</span>
      </p>
    </div>
  </footer>
  <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH /var/www/html/resources/views/layouts/app.blade.php ENDPATH**/ ?>