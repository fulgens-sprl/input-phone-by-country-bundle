<?php


namespace Fulgens\InputPhoneByCountryBundle\Entity;


class Country implements CountryInterface
{
    /**
     * @var string
     */
    private $countryPhoneCode;
    /**
     * @var string
     */
    private $countryName;

    /**
     * Country constructor.
     * @param $countryPhoneCode
     * @param $countryName
     */
    public function __construct($countryPhoneCode, $countryName)
    {
        $this->countryPhoneCode = $countryPhoneCode;
        $this->countryName = $countryName;
    }


    /**
     * @return mixed
     */
    public function getCountryPhoneCode()
    {
        return $this->countryPhoneCode;
    }

    /**
     * @param mixed $countryPhoneCode
     */
    public function setCountryPhoneCode($countryPhoneCode): void
    {
        $this->countryPhoneCode = $countryPhoneCode;
    }

    /**
     * @return mixed
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @param mixed $countryName
     */
    public function setCountryName($countryName): void
    {
        $this->countryName = $countryName;
    }
}