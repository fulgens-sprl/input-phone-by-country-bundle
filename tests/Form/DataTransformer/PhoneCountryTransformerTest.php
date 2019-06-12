<?php


namespace Fulgens\InputPhoneByCountryBundle\Tests\Form\DataTransformer;


use Fulgens\InputPhoneByCountryBundle\Form\DataTransformer\PhoneCountryTransformer;
use PHPUnit\Framework\TestCase;

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
     * @param $isValid
     *
     * @dataProvider usualTransformProvider
     */
    public function testUsualTransform($value, $isValid)
    {
        $this->assertEquals($isValid, $this->phoneByCountryTransformer->transform($value));
    }

    public function usualTransformProvider()
    {
        return [
            ["0032 498367983", ["countryCode" => "0032", "phone" => "498367983"]],
            ["0032 498 36 79 83", ["countryCode" => "0032", "phone" => "498 36 79 83"]],
            ["0032 49 0032 83", ["countryCode" => "0032", "phone" => "49 0032 83"]],
        ];
    }
}
