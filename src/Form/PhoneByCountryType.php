<?php

namespace Fulgens\InputPhoneByCountryBundle\Form;


use Fulgens\InputPhoneByCountryBundle\Entity\CountryInterface;
use Fulgens\InputPhoneByCountryBundle\Form\DataTransformer\PhoneCountryTransformer;
use Fulgens\InputPhoneByCountryBundle\Provider\CountryProviderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhoneByCountryType extends AbstractType
{

    /**
     * @var CountryProviderInterface
     */
    private $countryProvider;

    public function __construct(CountryProviderInterface $countryProvider)
    {
        $this->countryProvider = $countryProvider;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('countryCode', ChoiceType::class, [
                'choices' => $this->countryProvider->getCountries($options["countryOptions"]),
                'choice_label' => function(CountryInterface $country) {
                    return $country->getCountryPhoneCode();
                }
            ])
            ->add('phone', TelType::class);

        $builder->addModelTransformer(new PhoneCountryTransformer());
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            "countryOptions" => []
        ]);
    }
}
