<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Combat\Partials\CombatGameCharacteristic;
use DrdPlus\Tools\Calculations\SumAndRound;

class Shooting extends CombatGameCharacteristic
{
    /**
     * @param Knack $knack
     */
    public function __construct(Knack $knack)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct(SumAndRound::flooredHalf($knack->getValue()));
    }
}