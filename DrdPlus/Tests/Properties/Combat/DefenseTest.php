<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Combat\Defense;
use DrdPlus\Tests\Properties\Combat\Partials\CombatCharacteristicTest;

class DefenseTest extends CombatCharacteristicTest
{
    protected function createSut()
    {
        return Defense::getIt($this->createAgility(123));
    }

    /**
     * @test
     */
    public function I_can_get_property_easily()
    {
        $defense = Defense::getIt($this->createAgility($agilityValue = 123));
        self::assertSame((int)ceil($agilityValue / 2), $defense->getValue());
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Agility
     */
    private function createAgility($value)
    {
        $agility = \Mockery::mock(Agility::class);
        $agility->shouldReceive('getValue')
            ->andReturn($value);

        return $agility;
    }
}