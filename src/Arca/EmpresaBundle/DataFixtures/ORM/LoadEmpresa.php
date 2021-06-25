<?php
namespace Arca\EmpresaBundle\DataFixtures\ORM;

use Arca\EmpresaBundle\Entity\Categoria;
use Faker;
use Arca\EmpresaBundle\Entity\Empresa;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;



class LoadEmpresa implements FixtureInterface
{
    /**
     * @var ContainerInterface
     */

    public function load(ObjectManager $manager)
    {
        for ($aux = 1; $aux <= 12; $aux++) {
            $empresa = new Empresa();
            $faker = Faker\Factory::create('pt_BR');
            $empresa->setTitulo($faker->company);
            $empresa->setTelefone($faker->phoneNumber);
            $empresa->setImagem($aux.'.jpg');
            $empresa->setCep($faker->postcode);
            $empresa->setEndereco($faker->streetName);
            $empresa->setCidade($faker->city);
            $empresa->setEstado($faker->state);
            $empresa->setDescricao($faker->text);
            $categoria = $manager->getRepository("EmpresaBundle:Categoria")->findAll();
            $empresa->setCategorias($categoria);
            $manager->persist($empresa);
            $manager->flush();
        }




    }
}