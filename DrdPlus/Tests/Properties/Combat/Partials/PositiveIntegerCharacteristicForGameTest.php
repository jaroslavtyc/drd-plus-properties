<?php
namespace DrdPlus\Tests\Properties\Combat\Partials;

abstract class PositiveIntegerCharacteristicForGameTest extends CharacteristicForGameTest
{
    /**
     * @test
     */
    public function I_can_add_value_and_subtract_from_it()
    {
        $sut = $this->createSut();
        $increased = $sut->add(123);
        self::assertNotEquals($sut, $increased);
        self::assertSame($sut->getValue() + 123, $increased->getValue());
        $double = $increased->add($increased);
        self::assertSame($increased->getValue() * 2, $double->getValue());

        $decreased = $sut->sub(111);
        self::assertNotEquals($sut, $decreased);
        self::assertSame($sut->getValue() - 111, $decreased->getValue());
        $zeroed = $decreased->sub($decreased);
        self::assertSame(0, $zeroed->getValue());
    }

    /**
     * @test
     * @expectedException \Granam\Integer\Tools\Exceptions\PositiveIntegerCanNotBeNegative
     * @expectedExceptionMessageRegExp ~-1~
     */
    public function I_can_not_turn_it_to_negative_by_add_negative()
    {
        $sut = $this->createSut();
        $sut->add(-($sut->getValue() + 1));
    }

    /**
     * @test
     * @expectedException \Granam\Integer\Tools\Exceptions\PositiveIntegerCanNotBeNegative
     * @expectedExceptionMessageRegExp ~-1~
     */
    public function I_can_not_subtract_to_negative()
    {
        $sut = $this->createSut();
        $sut->sub($sut->getValue() + 1);
    }
}