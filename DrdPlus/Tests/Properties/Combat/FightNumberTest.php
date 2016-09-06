<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Codes\ProfessionCode;
use DrdPlus\Properties\Combat\BasePropertiesInterface;
use DrdPlus\Properties\Combat\FightNumber;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Body\Size;
use DrdPlus\Tests\Properties\Combat\Partials\CombatGameCharacteristicTest;

class FightNumberTest extends CombatGameCharacteristicTest
{
    protected function createSut()
    {
        return new FightNumber(ProfessionCode::getIt(ProfessionCode::FIGHTER), $this->createBaseProperties(0, 0, 0, 0), $this->createSize(0));
    }

    /**
     * @param ProfessionCode $professionCode
     * @param BasePropertiesInterface $baseProperties
     * @param Size $size
     * @param int $expectedFightNumber
     *
     * @test
     * @dataProvider provideProfessionInfo
     */
    public function I_can_get_fight_number_for_every_profession(
        ProfessionCode $professionCode,
        BasePropertiesInterface $baseProperties,
        Size $size,
        $expectedFightNumber
    )
    {
        $fightNumber = new FightNumber($professionCode, $baseProperties, $size);
        self::assertSame($expectedFightNumber, $fightNumber->getValue());
        self::assertSame((string)$expectedFightNumber, (string)$fightNumber);
    }

    public function provideProfessionInfo()
    {
        return [
            [
                ProfessionCode::getIt(ProfessionCode::FIGHTER),
                $this->createBaseProperties($agility = 123, 0, 0, 0),
                $this->createSize($size = -2),
                (int)($agility + ceil($size / 3) - 2),
            ],
            [
                ProfessionCode::getIt(ProfessionCode::FIGHTER),
                $this->createBaseProperties($agility = 456, 0, 0, 0),
                $this->createSize($size = 7),
                (int)($agility + ceil($size / 3) - 2),
            ],
            [
                ProfessionCode::getIt(ProfessionCode::THIEF),
                $this->createBaseProperties($agility = 123, $knack = 234, 0, 0),
                $this->createSize($size = -2),
                (int)(round(($agility + $knack) / 2) + ceil($size / 3) - 2),
            ],
            [
                ProfessionCode::getIt(ProfessionCode::THIEF),
                $this->createBaseProperties($agility = 456, $knack = 567, 0, 0),
                $this->createSize($size = 7),
                (int)(round(($agility + $knack) / 2) + ceil($size / 3) - 2),
            ],
            [
                ProfessionCode::getIt(ProfessionCode::RANGER),
                $this->createBaseProperties($agility = 123, $knack = 234, 0, 0),
                $this->createSize($size = -2),
                (int)(round(($agility + $knack) / 2) + ceil($size / 3) - 2),
            ],
            [
                ProfessionCode::getIt(ProfessionCode::RANGER),
                $this->createBaseProperties($agility = 456, $knack = 567, 0, 0),
                $this->createSize($size = 7),
                (int)(round(($agility + $knack) / 2) + ceil($size / 3) - 2),
            ],
            [
                ProfessionCode::getIt(ProfessionCode::WIZARD),
                $this->createBaseProperties($agility = 123, 0, $intelligence = 234, 0),
                $this->createSize($size = -2),
                (int)(round(($agility + $intelligence) / 2) + ceil($size / 3) - 2),
            ],
            [
                ProfessionCode::getIt(ProfessionCode::WIZARD),
                $this->createBaseProperties($agility = 456, 0, $intelligence = 567, 0),
                $this->createSize($size = 7),
                (int)(round(($agility + $intelligence) / 2) + ceil($size / 3) - 2),
            ],
            [
                ProfessionCode::getIt(ProfessionCode::THEURGIST),
                $this->createBaseProperties($agility = 123, 0, $intelligence = 234, 0),
                $this->createSize($size = -2),
                (int)(round(($agility + $intelligence) / 2) + ceil($size / 3) - 2),
            ],
            [
                ProfessionCode::getIt(ProfessionCode::THEURGIST),
                $this->createBaseProperties($agility = 456, 0, $intelligence = 567, 0),
                $this->createSize($size = 7),
                (int)(round(($agility + $intelligence) / 2) + ceil($size / 3) - 2),
            ],
            [
                ProfessionCode::getIt(ProfessionCode::PRIEST),
                $this->createBaseProperties($agility = 123, 0, 0, $charisma = 234),
                $this->createSize($size = -2),
                (int)(round(($agility + $charisma) / 2) + ceil($size / 3) - 2),
            ],
            [
                ProfessionCode::getIt(ProfessionCode::PRIEST),
                $this->createBaseProperties($agility = 456, 0, 0, $charisma = 567),
                $this->createSize($size = 7),
                (int)(round(($agility + $charisma) / 2) + ceil($size / 3) - 2),
            ],
        ];
    }

    /**
     * @param $agility
     * @param $knack
     * @param $intelligence
     * @param $charisma
     *
     * @return BasePropertiesInterface
     */
    private function createBaseProperties($agility, $knack = 0, $intelligence = 0, $charisma = 0)
    {
        $properties = \Mockery::mock(BasePropertiesInterface::class);
        $properties->shouldReceive('getAgility')
            ->andReturn(Agility::getIt($agility));
        $properties->shouldReceive('getKnack')
            ->andReturn(Knack::getIt($knack));
        $properties->shouldReceive('getIntelligence')
            ->andReturn(Intelligence::getIt($intelligence));
        $properties->shouldReceive('getCharisma')
            ->andReturn(Charisma::getIt($charisma));

        return $properties;
    }

    /**
     * @param $value
     * @return Size
     */
    private function createSize($value)
    {
        $size = \Mockery::mock(Size::class);
        $size->shouldReceive('getValue')
            ->andReturn($value);

        return $size;
    }

    /**
     * @test
     * @expectedException \DrdPlus\Properties\Combat\Exceptions\UnknownProfession
     */
    public function I_can_not_get_fight_for_unknown_profession()
    {
        $monk = $this->mockery(ProfessionCode::class);
        $monk->shouldReceive('getValue')
            ->andReturn('monk');
        /** @var ProfessionCode $monk */

        new FightNumber($monk, $this->createBaseProperties(0, 0, 0, 0), $this->createSize(0));
    }
}