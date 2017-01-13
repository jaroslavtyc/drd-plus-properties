<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Combat\Partials\CombatGameCharacteristic;
use DrdPlus\Calculations\SumAndRound;

/**
 * @method Shooting add(int | IntegerInterface $value)
 * @method Shooting sub(int | IntegerInterface $value)
 */
class Shooting extends CombatGameCharacteristic
{
    /**
     * See PPH page 34 left column, @link https://pph.drdplus.jaroslavtyc.com/?mode=dev&hide=covered#tabulka_bojovych_charakteristik
     *
     * @param Knack $knack
     */
    public function __construct(Knack $knack)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct(SumAndRound::flooredHalf($knack->getValue()));
    }
}