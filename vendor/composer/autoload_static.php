<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit25bb316feed865ea761dfcf9a2f2ad6d
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/app/Classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit25bb316feed865ea761dfcf9a2f2ad6d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit25bb316feed865ea761dfcf9a2f2ad6d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit25bb316feed865ea761dfcf9a2f2ad6d::$classMap;

        }, null, ClassLoader::class);
    }
}