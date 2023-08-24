<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitcbffd9dc842ac67c238f7d96513b0a4b
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitcbffd9dc842ac67c238f7d96513b0a4b', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitcbffd9dc842ac67c238f7d96513b0a4b', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitcbffd9dc842ac67c238f7d96513b0a4b::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}