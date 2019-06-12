<?php

namespace Fulgens\InputPhoneByCountryBundle\Provider;

use Fulgens\InputPhoneByCountryBundle\Entity\Country;

class CountryProvider implements CountryProviderInterface
{

    public function getCountries(): array
    {
        return [
            new Country("0033", "France"),
            new Country("0032", "Belgique")
        ];
    }
}
