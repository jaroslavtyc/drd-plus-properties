<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Body\Size;
use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;
use DrdPlus\Tools\Numbers\SumAndRound;

class Speed extends AbstractDerivedProperty
{
    const SPEED = 'speed';

    public function __construct(Strength $strength, Agility $agility, Size $size)
    {
        $this->value = SumAndRound::average($strength->getValue(), $agility->getValue())
            + $this->getSpeedBonusBySize($size);
    }

    private function getSpeedBonusBySize(Size $size)
    {
        if ($size->getValue() > 0) {
            return SumAndRound::ceil($size->getValue() / 3) - 2; // 1 - 3 = -1; 4 - 6 = 0; 7 - 9 = +1 ...
        }

        return SumAndRound::floor(($size->getValue() - 1) / 3) - 1; // -2 - 0 = -2 ...
    }

    public function getCode()
    {
        return self::SPEED;
    }
}
