<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5a753014a74b69f166bd9adf666c7be8
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MetaBox\\Support\\' => 16,
            'MetaBox\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MetaBox\\Support\\' => 
        array (
            0 => __DIR__ . '/..' . '/meta-box/support',
        ),
        'MetaBox\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit5a753014a74b69f166bd9adf666c7be8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5a753014a74b69f166bd9adf666c7be8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5a753014a74b69f166bd9adf666c7be8::$classMap;

        }, null, ClassLoader::class);
    }
}
