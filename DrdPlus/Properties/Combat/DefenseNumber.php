<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Combat\Partials\CombatGameCharacteristic;
use DrdPlus\Calculations\SumAndRound;

/**
 * @method DefenseNumber add(int | IntegerInterface $value)
 * @method DefenseNumber sub(int | IntegerInterface $value)
 */
class DefenseNumber extends CombatGameCharacteristic
{

    /**
     * See PPH page 34 left column
     * , @link https://pph.drdplus.jaroslavtyc.com/?mode=dev&hide=covered#tabulka_bojovych_charakteristik
     *
     * @param Agility $agility
     */
    public function __construct(Agility $agility)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct(SumAndRound::ceiledHalf($agility->getValue()));
    }

}