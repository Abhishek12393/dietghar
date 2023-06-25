<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit81f0a401a3d7488868266f7a00d52757
{
    public static $files = array (
        'a4a119a56e50fbb293281d9a48007e0e' => __DIR__ . '/..' . '/symfony/polyfill-php80/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'h' => 
        array (
            'h4cc\\WKHTMLToPDF\\' => 17,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Php80\\' => 23,
            'Symfony\\Component\\Process\\' => 26,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'K' => 
        array (
            'Knp\\Snappy\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'h4cc\\WKHTMLToPDF\\' => 
        array (
            0 => __DIR__ . '/..' . '/h4cc/wkhtmltopdf-amd64',
        ),
        'Symfony\\Polyfill\\Php80\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php80',
        ),
        'Symfony\\Component\\Process\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/process',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Knp\\Snappy\\' => 
        array (
            0 => __DIR__ . '/..' . '/knplabs/knp-snappy/src/Knp/Snappy',
        ),
    );

    public static $classMap = array (
        'Attribute' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Attribute.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'PhpToken' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/PhpToken.php',
        'Stringable' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Stringable.php',
        'UnhandledMatchError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php',
        'ValueError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/ValueError.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit81f0a401a3d7488868266f7a00d52757::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit81f0a401a3d7488868266f7a00d52757::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit81f0a401a3d7488868266f7a00d52757::$classMap;

        }, null, ClassLoader::class);
    }
}