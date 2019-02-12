<?php
declare(strict_types=1);

namespace DrdPlus\Properties\Partials;

use Doctrineum\Float\FloatEnum;
use DrdPlus\BaseProperties\Property;
use Granam\Number\NumberInterface;

/**
 * @method static AbstractFloatProperty getEnum(float|NumberInterface $enumValue)
 */
abstract class AbstractFloatProperty extends FloatEnum implements Property
{

    /**
     * @param float|NumberInterface $value
     * @return AbstractFloatProperty
     */
    public static function getIt($value)
    {
        return static::getEnum($value);
    }

}