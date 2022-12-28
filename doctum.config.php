<?php

use Doctum\Doctum;
use Doctum\RemoteRepository\GitHubRemoteRepository;
use Symfony\Component\Finder\Finder;

$basePath = fn ($path = '') => __DIR__.'/'.$path;
$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in($basePath('src'));

return new Doctum(
    $iterator,
    [
        'title' => 'Doctum APIs Documentation',
        'language' => 'en',
        'build_dir' => $basePath('docs/api'),
        'cache_dir' => $basePath('docs/cache'),
        'source_dir' => $basePath(),
        'remote_repository' => new GitHubRemoteRepository('cndrsdrmn/doctum', $basePath()),
    ]
);
