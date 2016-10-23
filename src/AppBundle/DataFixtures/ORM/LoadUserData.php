<?php


namespace AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FOS\UserBundle\Model\UserManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use UserBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @var UserManager
     */
    private $manager;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $this->container->get('fos_user.user_manager');

        $this->loadDevUser();
    }

    /**
     * Load dev user;
     */
    private function loadDevUser()
    {
        /** @var User $user */
        $user = $this->manager->createUser()
            ->setEmail('dev@kanban.com')
            ->setUsername('dev')
            ->setPlainPassword('dev')
            ->setEnabled(true)
        ;

        $user->setFullname('Dev user');

        $this->manager->updateUser($user);
        echo 'Load dev/dev user' . PHP_EOL;
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}