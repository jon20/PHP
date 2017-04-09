<?php

class ClassLoder
{
    protected $dirs;

    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    public function registerDir($dir)
    {
        $this->dirs[] = $dir;
    }

    public function loadClass($class)
    {
        foreach ($this->dirs as $dir){
            $file = $dir . '/' . $class . '.php';
            if(is_readable($file)){
                require $file;

                return;
            }
        }
    }
}
?>
/**
 * Created by IntelliJ IDEA.
 * User: jon
 * Date: 3/30/17
 * Time: 10:49 PM
 */