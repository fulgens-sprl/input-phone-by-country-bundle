<?php


namespace Fulgens\InputPhoneByCountryBundle\Tests\Form\DataTransformer;


use Fulgens\InputPhoneByCountryBundle\Form\DataTransformer\PhoneCountryTransformer;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Form\Exception\TransformationFailedException;

class PhoneCountryTransformerTest extends TestCase
{
    /** @var PhoneCountryTransformer */
    private $phoneByCountryTransformer;

    protected function setUp()
    {
        $this->phoneByCountryTransformer = new PhoneCountryTransformer();
    }

    /**
     * @param $value
     * @param $valueTransformed
     *
     * @dataProvider usualTransformProvider
     */
    public function testUsualTransform($value, $valueTransformed)
    {
        $this->assertEquals($valueTransformed, $this->phoneByCountryTransformer->transform($value));
    }

    public function usualTransformProvider()
    {
        return [
            ["0032 478367983", ["countryCode" => "0032", "phone" => "478367983"]],
            ["0032 478 36 79 83", ["countryCode" => "0032", "phone" => "478 36 79 83"]],
            ["0032 49 0032 83", ["countryCode" => "0032", "phone" => "49 0032 83"]],
        ];
    }

    /**
     * @param $value
     * @dataProvider expectExceptionTransformProvider
     */
    public function testExpectExceptionTransform($value)
    {
        $this->expectException(TransformationFailedException::class);
        $this->expectExceptionMessage("The phone number is in incorrect format");

        $this->phoneByCountryTransformer->transform($value);
    }

    public function expectExceptionTransformProvider()
    {
        return [
            ["003247836798"],
            ["azeaze"],
            ["123456789"],
            ["00 00 00 00 00"],
            ["00 32 484548"]
        ];
    }

    /**
     * @param $value
     * @param $valueTransformed
     * @dataProvider usualReverseTransformProvider
     */
    public function testUsualReverseTransform($value, $valueTransformed)
    {
        $this->assertEquals($valueTransformed, $this->phoneByCountryTransformer->reverseTransform($value));
    }

    public function usualReverseTransformProvider()
    {
        return [
            [["phone" => "479 36 79 83", "countryCode" => "0032"], "0032 479 36 79 83"],
            [["phone" => "479 36 7983", "countryCode" => "0032"], "0032 479 36 7983"],
        ];
    }

    /**
     * @param $value
     * @param $expectedExceptionMessage
     * @dataProvider exceptionReverseTransformProvider
     */
    public function testExceptionReverseTransform($value, $expectedExceptionMessage)
    {
        $this->expectException(TransformationFailedException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);
        $this->phoneByCountryTransformer->reverseTransform($value);
    }

    public function exceptionReverseTransformProvider()
    {
        return [
            [[], "The country code or phone is not set"],
            [["phone", "countryCode" => 5], "The country code or phone is not set"],
            [["phone" => 25, 5], "The country code or phone is not set"],
            [["phone" => "", "countryCode" => ""], "The country code does not have a correct format"],
            [["phone" => "", "countryCode" => "00"], "The country code does not have a correct format"],
            [["phone" => "azeaze", "countryCode" => "4444"], "The phone number only accepts number, dot or space"],
            [["phone" => "564aze", "countryCode" => "4444"], "The phone number only accepts number, dot or space"],
            [["phone" => "555 5!", "countryCode" => "4444"], "The phone number only accepts number, dot or space"],
        ];
    }
}
