<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc83c34c37fa2c1090d9684c53664008e
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dreamcoders\\LaravelDingbot\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dreamcoders\\LaravelDingbot\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc83c34c37fa2c1090d9684c53664008e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc83c34c37fa2c1090d9684c53664008e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc83c34c37fa2c1090d9684c53664008e::$classMap;

        }, null, ClassLoader::class);
    }
}