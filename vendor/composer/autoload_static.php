<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita19ba185333efd45ea02b1af4a3e9551
{
    public static $files = array (
        'decc78cc4436b1292c6c0d151b19445c' => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib/bootstrap.php',
        'aa75ea0761a2f40c1f3b32ad314f86c4' => __DIR__ . '/..' . '/phpseclib/mcrypt_compat/lib/mcrypt.php',
    );

    public static $prefixLengthsPsr4 = array (
        'p' => 
        array (
            'phpseclib\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'phpseclib\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita19ba185333efd45ea02b1af4a3e9551::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita19ba185333efd45ea02b1af4a3e9551::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
