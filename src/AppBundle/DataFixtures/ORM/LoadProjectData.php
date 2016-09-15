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
        $project->setName('Test');

        $manager->persist($project);

        $project = new Project();
        $project->setName('Symfony');

        $manager->persist($project);

        $manager->flush();
    }
}