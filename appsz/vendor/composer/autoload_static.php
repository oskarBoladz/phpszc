<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc6ab21dfc87c320420654caf58049d88
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc6ab21dfc87c320420654caf58049d88::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc6ab21dfc87c320420654caf58049d88::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc6ab21dfc87c320420654caf58049d88::$classMap;

        }, null, ClassLoader::class);
    }
}
