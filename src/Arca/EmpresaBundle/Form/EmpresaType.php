<?php

namespace Arca\EmpresaBundle\Form;

use Arca\EmpresaBundle\Entity\Categoria;
use Arca\EmpresaBundle\Entity\Empresa;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EmpresaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titulo')
                ->add('imagem', FileType::class, array(
                    'label' => 'Logotipo',
                    'required' => false,
                    'data_class' => null
                ))
                ->add('categorias', EntityType::class, [
                    'class' => Categoria::class,
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('c')
                            ->orderBy('c.categoria', 'ASC');
                    },
                    'choice_label' => 'categoria',
                    'multiple' => true,
                    'expanded' => true,
                    ]
                )
                ->add('telefone',  TextType::class, array(
                    'label' => 'Telefone',
                    'attr' => array(
                                  'placeholder' => '(99) 9999-9999',
                              )
                    )
                )
                ->add('cep',  TextType::class, array(
                    'label' => 'CEP',
                        'attr' => array(
                            'placeholder' => '99999-999',
                            'onblur' => 'buscaCEP(this.value)'
                        )
                    )
                )
                ->add('endereco')
                ->add('cidade')
                ->add('estado', ChoiceType::class, [
                    'choices'  => $this->GetEstados(),
                ])
                ->add('descricao', TextareaType::class);
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Arca\EmpresaBundle\Entity\Empresa'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'empresa';
    }


    public function GetEstados(){
        $estado = array(
            '' => 'Selecione o Estado',
            'AC' => 'Acre',
            'AL' => 'Alagoas',
            'AP' => 'Amap??',
            'AM' => 'Amazonas',
            'BA' => 'Bahia',
            'CE' => 'Cear??',
            'DF' => 'Distrito Federal',
            'ES' => 'Espirito Santo',
            'GO' => 'Goi??s',
            'MA' => 'Maranh??o',
            'MS' => 'Mato Grosso do Sul',
            'MT' => 'Mato Grosso',
            'MG' => 'Minas Gerais',
            'PA' => 'Par??',
            'PB' => 'Para??ba',
            'PR' => 'Paran??',
            'PE' => 'Pernambuco',
            'PI' => 'Piau??',
            'RJ' => 'Rio de Janeiro',
            'RN' => 'Rio Grande do Norte',
            'RS' => 'Rio Grande do Sul',
            'RO' => 'Rond??nia',
            'RR' => 'Roraima',
            'SC' => 'Santa Catarina',
            'SP' => 'S??o Paulo',
            'SE' => 'Sergipe',
            'TO' => 'Tocantins',
        );
        return $estado;
    }
}
