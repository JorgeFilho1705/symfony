<?php
namespace Arca\EventBundle\DataFixtures\ORM;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Arca\UserBundle\Entity\User;


class LoadUsers implements FixtureInterface, ContainerAwareInterface
{
    private $container;
    /**
     * @var ContainerInterface
     */

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('administrador');
        $user->setPassword($this->encodePassword($user, 'admin100'));
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setEmail('jorge.filho@arcasolutions.com');
        $manager->persist($user);
        $manager->flush();

    }
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    private function encodePassword(User $user, $plainPassword)
    {
        $encoder = $this->container->get('security.encoder_factory')
            ->getEncoder($user)
        ;

        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }

}