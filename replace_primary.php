<?php

$dirs = [
    __DIR__ . '/resources/views/admin',
    __DIR__ . '/resources/views/layouts'
];

$replacements = [
    'text-primary' => 'text-teal-600',
    'bg-primary' => 'bg-teal-600',
    'bg-primary/10' => 'bg-teal-600/10',
    'bg-primary/20' => 'bg-teal-600/20',
    'bg-primary/90' => 'bg-teal-700',
    'hover:bg-primary' => 'hover:bg-teal-700',
    'hover:bg-primary/90' => 'hover:bg-teal-700',
    'hover:text-primary' => 'hover:text-teal-600',
    'border-primary' => 'border-teal-500',
    'focus:border-primary' => 'focus:border-teal-500',
    'ring-primary' => 'ring-teal-500',
    'focus:ring-primary' => 'focus:ring-teal-500',
];

function processDir($dir, $replacements) {
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        $path = $dir . '/' . $file;
        if (is_dir($path)) {
            processDir($path, $replacements);
        } else if (pathinfo($path, PATHINFO_EXTENSION) === 'php') {
            $content = file_get_contents($path);
            $newContent = str_replace(array_keys($replacements), array_values($replacements), $content);
            if ($content !== $newContent) {
                file_put_contents($path, $newContent);
                echo "Updated: $path\n";
            }
        }
    }
}

foreach ($dirs as $dir) {
    if (file_exists($dir)) {
        processDir($dir, $replacements);
    }
}

echo "Done.\n";
