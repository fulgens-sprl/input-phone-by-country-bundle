# InputPhoneByCountryBundle

This small bundle adds a new input type for your Symfony 3 or 4 application. 
The input contains the country code of the phone number in a select/option and the rest of the number in an input text. 

## Installing

To add the bundle, use composer

```console
composer require fulgens-sprl/input-phone-by-country-bundle
```

And that's it! If you're *not* ysubg Symfony Flex, you'll also need to enable the `Fulgens\InputPhoneByCountryBundle` in your `AppKernel.php` file.

## Usage

Just as a common FormType element :
```php
// src/Form/Type

use Fulgens\InputPhoneByCountryBundle\Form\PhoneByCountryType;
// ...

class MyFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        ...
        $builder->add("phoneByCountry", PhoneByCountryType::class);
        ...
    }
}
```

If you want to use the bundle as provided, you have nothing to do more.

### How can I use my own CountryProvider ?

If you want to use another CountryProvider, first, create your own Provider and implement the CountryProviderInterface

```php
// src/Form/TypeMyOwnCountryProvider

use Fulgens\InputPhoneByCountryBundle\Entity\Country;
// ...

class MyOwnCountryProvider implements CountryProviderInterface
{
    //This method must return an array of CountryInterface 
    public function getCountries(): array
    {
        // ...
        return [...];
    }
}
```
Note that you MUST return an array of CountryInterface entities.

Then, in the `config/packages/fulgens_input_phone_by_country.yaml`, specify your new service (create a new file if it isn't already there):

```yaml
fulgens_input_phone_by_country:
    country_provider: Namespace\To\MyOwnCountryProvider
```


## Running the tests

To run the tests, use

```console
./vendor/bin/simple-phpunit
```

## Authors

* **Alexandre Castelain** - *Author* - [For Fulgens](https://github.com/fulgens-sprl)

See also the list of [contributors](https://github.com/fulgens-sprl/input-phone-by-country-bundle/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* This bundle is my first Bundle, so it might have problems, don't hesitate to contact me if you notice any wrong information.