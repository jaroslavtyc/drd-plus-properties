<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Combat\Partials\CombatCharacteristic;
use DrdPlus\Calculations\SumAndRound;
use Granam\Integer\IntegerInterface;

/**
 * @method Attack add(int | IntegerInterface $value)
 * @method Attack sub(int | IntegerInterface $value)
 */
class Attack extends CombatCharacteristic
{

    /**
     * See PPH page 34 left column
     * , @link https://pph.drdplus.jaroslavtyc.com/#tabulka_bojovych_charakteristik
     *
     * @param Agility $agility
     */
    public function __construct(Agility $agility)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct(SumAndRound::flooredHalf($agility->getValue()));
    }

}