<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Codes\Properties\CharacteristicForGameCode;
use DrdPlus\Properties\Combat\Partials\CharacteristicForGame;

/**
 * See PPH page 92 right column, @link https://pph.drdplus.jaroslavtyc.com/#utocne_cislo_uc
 * Attack number can be affected by many ways unlike Attack.
 *
 * @method AttackNumber add(int | IntegerInterface $value)
 * @method AttackNumber sub(int | IntegerInterface $value)
 */
class AttackNumber extends CharacteristicForGame
{
    /**
     * @param Attack $attack
     * @return AttackNumber
     */
    public static function getItFromAttack(Attack $attack)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static($attack->getValue());
    }

    /**
     * @param Shooting $shooting
     * @return AttackNumber
     */
    public static function getItFromShooting(Shooting $shooting)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static($shooting->getValue());
    }

    /**
     * @return CharacteristicForGameCode
     */
    public function getCode()
    {
        return CharacteristicForGameCode::getIt(CharacteristicForGameCode::ATTACK_NUMBER);
    }
}