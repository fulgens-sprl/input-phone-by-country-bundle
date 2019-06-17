<?php

namespace Fulgens\InputPhoneByCountryBundle\Provider;

interface CountryProviderInterface
{
    /*
     * This method return the countries you want to display in your inputs
     * @return [] Must be an array of CountryInterface
     */
    public function getCountries() : array;
}
