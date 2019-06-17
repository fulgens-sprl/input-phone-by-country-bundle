<?php

namespace Fulgens\InputPhoneByCountryBundle\Provider;

use Fulgens\InputPhoneByCountryBundle\Entity\Country;

class CountryProvider implements CountryProviderInterface
{
    /*
     * This method return the countries you want to display in your inputs
     * @return [] Must be an array of CountryInterface
     */
    public function getCountries(): array
    {
        return [
            new Country("0033", "France"),
            new Country("0032", "Belgique")
        ];
    }
}
