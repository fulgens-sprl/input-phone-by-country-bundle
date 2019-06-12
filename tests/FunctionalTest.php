<?php

namespace Fulgens\InputPhoneByCountryBundle\Tests;

use Fulgens\InputPhoneByCountryBundle\FulgensInputPhoneByCountryBundle;
use Fulgens\InputPhoneByCountryBundle\Provider\CountryProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class FunctionalTest extends TestCase
{
    public function testServiceWiring()
    {
        $kernel = new FulgensInputPhoneByCountryKernel('test', true);
        $kernel->boot();
        $container = $kernel->getContainer();

        $countryProvider = $container->get('fulgens_input_phone_by_country.country_provider');
        $this->assertInstanceOf(CountryProvider::class, $countryProvider);
    }
}

class FulgensInputPhoneByCountryKernel extends Kernel
{
    public function registerBundles()
    {
        return [
            new FulgensInputPhoneByCountryBundle()
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {

    }
}