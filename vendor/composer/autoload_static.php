<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb10ed6304c697830b32404e70b8c672f
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb10ed6304c697830b32404e70b8c672f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb10ed6304c697830b32404e70b8c672f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb10ed6304c697830b32404e70b8c672f::$classMap;

        }, null, ClassLoader::class);
    }
}