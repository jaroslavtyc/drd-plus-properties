<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Derived\Partials\AspectOfVisage;
use DrdPlus\Properties\Base\Knack;

class Beauty extends AspectOfVisage
{
    /**
     * @param Agility $agility
     * @param Knack $knack
     * @param Charisma $charisma
     * @return Beauty
     */
    public static function getIt(Agility $agility, Knack $knack, Charisma $charisma)
    {
        return new static($agility, $knack, $charisma);
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::BEAUTY);
    }
}