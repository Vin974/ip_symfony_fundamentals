<?php
/**
 * Created by PhpStorm.
 * User: Vin
 * Date: 15/09/2016
 * Time: 16:35
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Project;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadProjectData implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $project = new Project();
        $project
            ->setName('Test')
            ->setDescription('Ceci est un test')
        ;
        $manager->persist($project);

        $project = new Project();
        $project
            ->setName('Symfony')
            ->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consequuntur doloremque excepturi ipsa magnam minus nulla, odio vel veniam voluptate. Ab amet asperiores doloremque id mollitia nesciunt quia quod repudiandae!')
        ;
        $manager->persist($project);

        $manager->flush();
    }
}