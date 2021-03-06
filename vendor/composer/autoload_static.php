<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8f90fe611b4e42c0764707b0da2f506c
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'core\\' => 5,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit8f90fe611b4e42c0764707b0da2f506c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8f90fe611b4e42c0764707b0da2f506c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8f90fe611b4e42c0764707b0da2f506c::$classMap;

        }, null, ClassLoader::class);
    }
}
