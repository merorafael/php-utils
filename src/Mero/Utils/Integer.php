<?php

namespace Mero\Utils;

/**
 * Integer class representation, based on Java API.
 *
 * @author Rafael Mello <merorafael@gmail.com>
 */
class Integer
{
    use ClassNameTrait;

    /**
     * @var int Value
     */
    protected $value;

    public function __construct($value)
    {
        $this->value = (!is_int($value))
            ? (int) $value
            : $value;
    }

    /**
     * Returns a String object representing this Integer's value.
     *
     * @return string String object representing this Integer's value
     */
    public function __toString()
    {
        return (string) $this->value;
    }

    /**
     * Compares two int values numerically.
     *
     * @param int $x First int to compare
     * @param int $y Second int to compare
     *
     * @return int The value 0 if x == y; a value less than 0 if x < y; and a value greater than 0 if x > y
     */
    public static function compare($x, $y)
    {
        if ($x < $y) {
            return -1;
        } elseif ($x == $y) {
            return 0;
        } else {
            return 1;
        }
    }
}
