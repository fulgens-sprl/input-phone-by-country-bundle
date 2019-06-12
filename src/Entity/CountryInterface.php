<?php

namespace Fulgens\InputPhoneByCountryBundle\Entity;

interface CountryInterface
{
    public function getCountryPhoneCode();
    public function getCountryName();
}