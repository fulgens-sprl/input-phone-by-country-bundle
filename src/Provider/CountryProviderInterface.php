<?php

namespace Fulgens\InputPhoneByCountryBundle\Provider;

use Fulgens\InputPhoneByCountryBundle\Entity\Country;

interface CountryProviderInterface
{
    /**
     * This method return the countries you want to display in your inputs
     * @param array $options There options are use to customize the return. It can be anything but is not used by default
     * @return Country[] Must be an array of CountryInterface
     */
    public function getCountries(array $options) : array;
}
