<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit788d9c5365179c644576698860b72321
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit788d9c5365179c644576698860b72321::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit788d9c5365179c644576698860b72321::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit788d9c5365179c644576698860b72321::$classMap;

        }, null, ClassLoader::class);
    }
}