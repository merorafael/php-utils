<?php

namespace Mero\Utils;

trait ClassNameTrait
{
    /**
     * Return the class name. Please, not use this method if you are using PHP 5.5 or above.
     *
     * @return string Class name
     *
     * @deprecated In PHP 5.5 or above you don't need to use this method. The native constant "::class" was implemented.
     */
    public static function className()
    {
        return get_called_class();
    }
}
