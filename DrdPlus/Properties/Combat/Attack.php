<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Codes\CombatCharacteristicCode;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Calculations\SumAndRound;
use DrdPlus\Properties\Combat\Partials\CombatCharacteristic;

class Attack extends CombatCharacteristic
{

    /**
     * See PPH page 34 left column
     * , @link https://pph.drdplus.jaroslavtyc.com/#tabulka_bojovych_charakteristik
     *
     * @param Agility $agility
     * @return Attack
     */
    public static function getIt(Agility $agility)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static(SumAndRound::flooredHalf($agility->getValue()));
    }

    /**
     * @return CombatCharacteristicCode
     */
    public function getCode()
    {
        return CombatCharacteristicCode::getIt(CombatCharacteristicCode::ATTACK);
    }

}