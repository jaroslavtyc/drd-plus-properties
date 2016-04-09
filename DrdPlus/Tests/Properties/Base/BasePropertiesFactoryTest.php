<?php
namespace DrdPlus\Tests\Properties\Base;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\BasePropertiesFactory;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;

class BasePropertiesFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function I_can_create_every_property()
    {
        $factory = new BasePropertiesFactory();

        $strength = $factory->createStrength($strengthValue = 123);
        self::assertInstanceOf(Strength::class, $strength);
        self::assertSame($strengthValue, $strength->getValue());
        $strength = $factory->createProperty($strengthValue, Strength::STRENGTH);
        self::assertInstanceOf(Strength::class, $strength);
        self::assertSame($strengthValue, $strength->getValue());

        $agility = $factory->createAgility($agilityValue = 123);
        self::assertInstanceOf(Agility::class, $agility);
        self::assertSame($agilityValue, $agility->getValue());
        $agility = $factory->createProperty($agilityValue, Agility::AGILITY);
        self::assertInstanceOf(Agility::class, $agility);
        self::assertSame($agilityValue, $agility->getValue());

        $knack = $factory->createKnack($knackValue = 123);
        self::assertInstanceOf(Knack::class, $knack);
        self::assertSame($knackValue, $knack->getValue());
        $knack = $factory->createProperty($knackValue, Knack::KNACK);
        self::assertInstanceOf(Knack::class, $knack);
        self::assertSame($knackValue, $knack->getValue());

        $will = $factory->createWill($willValue = 123);
        self::assertInstanceOf(Will::class, $will);
        self::assertSame($willValue, $will->getValue());
        $will = $factory->createProperty($willValue, Will::WILL);
        self::assertInstanceOf(Will::class, $will);
        self::assertSame($willValue, $will->getValue());

        $intelligence = $factory->createIntelligence($intelligenceValue = 123);
        self::assertInstanceOf(Intelligence::class, $intelligence);
        self::assertSame($intelligenceValue, $intelligence->getValue());
        $intelligence = $factory->createProperty($intelligenceValue, Intelligence::INTELLIGENCE);
        self::assertInstanceOf(Intelligence::class, $intelligence);
        self::assertSame($intelligenceValue, $intelligence->getValue());

        $charisma = $factory->createCharisma($charismaValue = 123);
        self::assertInstanceOf(Charisma::class, $charisma);
        self::assertSame($charismaValue, $charisma->getValue());
        $charisma = $factory->createProperty($charismaValue, Charisma::CHARISMA);
        self::assertInstanceOf(Charisma::class, $charisma);
        self::assertSame($charismaValue, $charisma->getValue());
    }

    /**
     * @test
     * @expectedException \DrdPlus\Properties\Base\Exceptions\UnknownBasePropertyCode
     */
    public function I_can_not_create_property_by_unknown_code()
    {
        $factory = new BasePropertiesFactory();

        $factory->createProperty(123, 'unknown code');
    }
}