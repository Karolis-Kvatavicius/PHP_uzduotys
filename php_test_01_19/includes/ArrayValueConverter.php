<?php

class ArrayValueConverter
{

    private static $array = [1, 2, 3, 4, 5];

    public static function setArray($array)
    {
        self::$array = $array;
    }

    private static function pickArraySecondValue()
    {
        $tempArray = array_slice(self::$array, 1, 1);
        return array_shift($tempArray);
    }

    private static function pickArrayThirdValue()
    {
        $tempArray = array_slice(self::$array, -3, 1);
        return array_shift($tempArray);
    }

    public static function valueToDec($thirdFromBack = false)
    {
        ($thirdFromBack) ? $array_value =  self::pickArrayThirdValue() : $array_value = self::pickArraySecondValue();
        $types = array("integer", "double");
        // IF VALUE IS OF TYPE INTEGER OR DOUBLE
        if (in_array(gettype($array_value), $types)) {
            return $array_value;
        } else {
            // IF VALUE IS STRING BUT CASTS NICELY TO INTEGER OR DOUBLE
            if ((int) $array_value == $array_value || (float) $array_value == $array_value) {
                return $array_value;
             // OTHER CASES WHEN VALUE IS STRING
            } else {
                // CONVERT STRING TO DECIMAL
                return self::decArrayToDecString(self::stringtoDecArray($thirdFromBack));
            }
        }
    }

    public static function valueToOct($thirdFromBack = false)
    {
        ($thirdFromBack) ? $array_value =  self::pickArrayThirdValue() : $array_value = self::pickArraySecondValue();
        $types = array("integer", "double");
        if (in_array(gettype($array_value), $types)) {
            return decoct($array_value);
        } else {
            if ((int) $array_value == $array_value || (float) $array_value == $array_value) {
                return decoct($array_value);
            } else {
                return decoct((int)self::decArrayToDecString(self::stringtoDecArray($thirdFromBack)));
            }
        }
    }

    public static function valueToHex($thirdFromBack = false)
    {
        ($thirdFromBack) ? $array_value =  self::pickArrayThirdValue() : $array_value = self::pickArraySecondValue();
        $types = array("integer", "double");
        if (in_array(gettype($array_value), $types)) {
            return dechex($array_value);
        } else {
            if ((int) $array_value == $array_value || (float) $array_value == $array_value) {
                return dechex($array_value);
            } else {
                // FIRST CONVERT WHOLE STRING TO DECIMAL THEN TO HEXADECIMAL
                return dechex((int)self::decArrayToDecString(self::stringtoDecArray($thirdFromBack)));
            }
        }
    }

    public static function valueToBin($thirdFromBack = false)
    {
        ($thirdFromBack) ? $array_value =  self::pickArrayThirdValue() : $array_value = self::pickArraySecondValue();
        $types = array("integer", "double");
        if (in_array(gettype($array_value), $types)) {
            return decbin($array_value);
        } else {
            if ((int) $array_value == $array_value || (float) $array_value == $array_value) {
                return decbin($array_value);
            } else {
                return decbin((int)self::decArrayToDecString(self::stringtoDecArray($thirdFromBack)));
            }
        }
    }

    private static function stringtoDecArray($thirdFromBack = false)
    {
        ($thirdFromBack) ? $value = self::pickArrayThirdValue() : $value = self::pickArraySecondValue();
        $chars = str_split($value);
        $number = [];
        foreach ($chars as $char) {
            $number[] = ord($char);
        }
        return $number;
    }

    private static function decArrayToDecString($array) {
        $decString = "";
        foreach ($array as $value) {
            $decString.=$value;
        }
        return $decString;
    }

    public static function decToString($thirdFromBack =false)
    {
        $chars = self::stringtoDecArray($thirdFromBack);
        $string = '';
        foreach ($chars as $char) {
            $string.=chr($char);
        }
        return $string;
    }
}
