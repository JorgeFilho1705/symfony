<?php
namespace Arca\EmpresaBundle\DataFixtures\ORM;

use Arca\EmpresaBundle\Entity\Categoria;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;



class LoadCategoria implements FixtureInterface
{
    /**
     * @var ContainerInterface
     */

    public function load(ObjectManager $manager)
    {

        $cat1 = new Categoria();
        $cat1->setCategoria('Auto');
        $manager->persist($cat1);

        $cat2 = new Categoria();
        $cat2->setCategoria('Beauty and Fitness');
        $manager->persist($cat2);

        $cat3 = new Categoria();
        $cat3->setCategoria('Entertainment');
        $manager->persist($cat3);

        $cat4 = new Categoria();
        $cat4->setCategoria('Food and Dining');
        $manager->persist($cat4);

        $cat5 = new Categoria();
        $cat5->setCategoria('Health');
        $manager->persist($cat5);

        $cat6 = new Categoria();
        $cat6->setCategoria('Sports');
        $manager->persist($cat6);

        $cat7 = new Categoria();
        $cat7->setCategoria('Travel');
        $manager->persist($cat7);


        $manager->flush();
    }
}