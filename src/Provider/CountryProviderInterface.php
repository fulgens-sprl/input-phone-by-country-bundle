<?php

namespace Fulgens\InputPhoneByCountryBundle\Provider;

interface CountryProviderInterface
{
    public function getCountries() : array;

}
