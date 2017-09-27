<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit86b9e94e12c405a7e9b49f399ddccb1a
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit86b9e94e12c405a7e9b49f399ddccb1a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit86b9e94e12c405a7e9b49f399ddccb1a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
