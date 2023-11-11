<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit520ebf7205b5f4f8e02961ff8c144b93
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

        spl_autoload_register(array('ComposerAutoloaderInit520ebf7205b5f4f8e02961ff8c144b93', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit520ebf7205b5f4f8e02961ff8c144b93', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit520ebf7205b5f4f8e02961ff8c144b93::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}