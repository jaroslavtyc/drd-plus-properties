<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Derived\Beauty;

class BeautyTest extends AbstractTestOfAspectOfVisage
{

    /**
     * #@test
     */
    public function I_can_get_property_easily()
    {
        $beauty = new Beauty($this->getAgility($agilityValue = 123), $this->getKnack($knackValue = 456), $this->getCharisma($charismaValue = 789));
        self::assertSame('beauty', $beauty->getCode());
        self::assertSame('beauty', $beauty::BEAUTY);
        self::assertSame($this->calculateValue($agilityValue, $knackValue, $charismaValue), $beauty->getValue());
        self::assertSame((string)$this->calculateValue($agilityValue, $knackValue, $charismaValue), "$beauty");

        return $beauty;
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Agility
     */
    private function getAgility($value)
    {
        return $this->createProperty(Agility::class, $value);
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Knack
     */
    private function getKnack($value)
    {
        return $this->createProperty(Knack::class, $value);
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Charisma
     */
    private function getCharisma($value)
    {
        return $this->createProperty(Charisma::class, $value);
    }
}
