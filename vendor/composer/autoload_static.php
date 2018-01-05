<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitca16b169a7b3f6a3e777f2aa746a1b1d
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modules\\Gallery\\' => 16,
            'Modules\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\Gallery\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
            1 => __DIR__ . '/../..' . '/',
        ),
        'Modules\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Modules',
        ),
    );

    public static $classMap = array (
        'Modules\\Gallery\\Database\\Seeders\\GalleryDatabaseSeeder' => __DIR__ . '/../..' . '/Database/Seeders/GalleryDatabaseSeeder.php',
        'Modules\\Gallery\\Entities\\Gallery' => __DIR__ . '/../..' . '/Entities/Gallery.php',
        'Modules\\Gallery\\Entities\\GalleryTranslation' => __DIR__ . '/../..' . '/Entities/GalleryTranslation.php',
        'Modules\\Gallery\\Events\\GalleryWasCreated' => __DIR__ . '/../..' . '/Events/GalleryWasCreated.php',
        'Modules\\Gallery\\Events\\GalleryWasDeleted' => __DIR__ . '/../..' . '/Events/GalleryWasDeleted.php',
        'Modules\\Gallery\\Events\\GalleryWasUpdated' => __DIR__ . '/../..' . '/Events/GalleryWasUpdated.php',
        'Modules\\Gallery\\Http\\Controllers\\Admin\\GalleryController' => __DIR__ . '/../..' . '/Http/Controllers/Admin/GalleryController.php',
        'Modules\\Gallery\\Http\\Requests\\StoreGallery' => __DIR__ . '/../..' . '/Http/Requests/StoreGallery.php',
        'Modules\\Gallery\\Http\\Requests\\UpdateGallery' => __DIR__ . '/../..' . '/Http/Requests/UpdateGallery.php',
        'Modules\\Gallery\\Providers\\GalleryServiceProvider' => __DIR__ . '/../..' . '/Providers/GalleryServiceProvider.php',
        'Modules\\Gallery\\Providers\\RouteServiceProvider' => __DIR__ . '/../..' . '/Providers/RouteServiceProvider.php',
        'Modules\\Gallery\\Repositories\\Cache\\CacheGalleryDecorator' => __DIR__ . '/../..' . '/Repositories/Cache/CacheGalleryDecorator.php',
        'Modules\\Gallery\\Repositories\\Eloquent\\EloquentGalleryRepository' => __DIR__ . '/../..' . '/Repositories/Eloquent/EloquentGalleryRepository.php',
        'Modules\\Gallery\\Repositories\\GalleryRepository' => __DIR__ . '/../..' . '/Repositories/GalleryRepository.php',
        'Modules\\Gallery\\Sidebar\\SidebarExtender' => __DIR__ . '/../..' . '/Sidebar/SidebarExtender.php',
        'Modules\\Gallery\\Tests\\BaseGalleryTest' => __DIR__ . '/../..' . '/Tests/BaseGalleryTest.php',
        'Modules\\Gallery\\Tests\\GalleryRepositoryTest' => __DIR__ . '/../..' . '/Tests/GalleryRepositoryTest.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitca16b169a7b3f6a3e777f2aa746a1b1d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitca16b169a7b3f6a3e777f2aa746a1b1d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitca16b169a7b3f6a3e777f2aa746a1b1d::$classMap;

        }, null, ClassLoader::class);
    }
}
