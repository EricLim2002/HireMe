<header class="fixed top-0 left-0 w-full bg-white shadow-md z-50 row">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <h1 class="text-xl font-bold">My App</h1>

        <nav class="space-x-4">
            <a href="/" class="hover:underline">Home</a>
            <a href="/about" class="hover:underline">About</a>
        </nav>

        <div class="space-x-3">
            <a href="<?php echo e(route('lang.switch', 'en')); ?>" 
               class="<?php echo e(app()->getLocale() === 'en' ? 'font-bold underline' : ''); ?>">
               English
            </a>
            <a href="<?php echo e(route('lang.switch', 'ms')); ?>" 
               class="<?php echo e(app()->getLocale() === 'ms' ? 'font-bold underline' : ''); ?>">
               Bahasa Melayu
            </a>
            <a href="<?php echo e(route('lang.switch', 'zh')); ?>" 
               class="<?php echo e(app()->getLocale() === 'zh' ? 'font-bold underline' : ''); ?>">
               中文
            </a>
        </div>
    </div>
</header><?php /**PATH /var/www/html/resources/views/livewire/header.blade.php ENDPATH**/ ?>