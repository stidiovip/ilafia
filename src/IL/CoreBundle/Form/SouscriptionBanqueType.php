<?php

namespace IL\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SouscriptionBanqueType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $mois = [];
        $i = 1;
        while($i <= 12){
            array_push($mois, $i);
            $i++;


        }
        $current_year = date('Y');
        $date_range = range($current_year, $current_year+10);


        $builder
            ->add('cb2c')
            ->add('c2cb')
            ->add('typeCompte')
            ->add('numeroCompte')
            ->add('numeroCarte')
            ->add('moisExpiration', ChoiceType::class, array(
                'choices' => [
                    '' => '',
                    '01' => '01',
                    '02' => '02',
                    '03' => '03',
                    '04' => '04',
                    '05' => '05',
                    '06' => '06',
                    '07' => '07',
                    '08' => '08',
                    '09' => '09',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12'
                ],


            ))
            ->add('anneeExpiration', ChoiceType::class, array(
                'choices' => $this->getYears(2018)

            ))
            ->add('numeroTelephone')


            ->add('typeCarte')
            ->add('statutLiaison')
            ->add('statutCarte')
            ->add('nomCarte')->add('labelCompte')->add('aliasCompte')->add('raison')
            ->add('balanceInquery')->add('miniStatement');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IL\CoreBundle\Entity\SouscriptionBanque'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'il_corebundle_souscriptionbanque';
    }

    private function getYears($min, $max='current')
    {
        $years = range($min, ($max === 'current' ? date('Y')+10 : $max));

        return array_combine($years, $years);
    }


}
