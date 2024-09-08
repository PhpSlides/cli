<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit75f2f00f7aa56024dc21f1d9ef0c3b15
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

        spl_autoload_register(array('ComposerAutoloaderInit75f2f00f7aa56024dc21f1d9ef0c3b15', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit75f2f00f7aa56024dc21f1d9ef0c3b15', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit75f2f00f7aa56024dc21f1d9ef0c3b15::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}