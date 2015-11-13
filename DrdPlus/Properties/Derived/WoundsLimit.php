<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCodes;
use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;
use DrdPlus\Tables\Measurements\Wounds\WoundsBonus;
use DrdPlus\Tables\Measurements\Wounds\WoundsTable;

class WoundsLimit extends AbstractDerivedProperty
{
    const WOUNDS_LIMIT = PropertyCodes::WOUNDS_LIMIT;

    public function __construct(Toughness $toughness, WoundsTable $woundsTable)
    {
        $wounds = $woundsTable->toWounds(new WoundsBonus($toughness->getValue() + 10, $woundsTable));
        $this->value = $wounds->getValue();
    }

    public function getCode()
    {
        return self::WOUNDS_LIMIT;
    }
}
