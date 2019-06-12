<?php

namespace Fulgens\InputPhoneByCountryBundle\Tests;

use Fulgens\InputPhoneByCountryBundle\Entity\Country;
use Fulgens\InputPhoneByCountryBundle\Provider\CountryProvider;
use PHPUnit\Framework\TestCase;

class CountryProviderTest extends TestCase
{
    /** @var CountryProvider */
    private $countryProvider;

    public function setUp()
    {
        $this->countryProvider = new CountryProvider();
    }

    public function testGetCountriesIsArray()
    {
        $this->assertTrue(is_array($this->countryProvider->getCountries()));
        $this->assertGreaterThanOrEqual(2, count($this->countryProvider->getCountries()));
    }

    public function testGetCountriesReturnType()
    {
        foreach ($this->countryProvider->getCountries() as $country)
            $this->assertInstanceOf(Country::class, $country);
    }
}
