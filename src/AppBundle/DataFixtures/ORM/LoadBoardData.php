<?php
/**
 * Created by PhpStorm.
 * User: Vin
 * Date: 15/09/2016
 * Time: 16:35
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Board;
use AppBundle\Entity\Column;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\ReferenceRepository;
use Doctrine\Common\DataFixtures\SharedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadBoardData implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $columns = $this->getColumns();

        $board = new Board();
        $board
            ->setName('Test')
            ->setDescription('Ceci est un test')
        ;
        foreach ($columns as $column) {
            $board->addColumn($column);
        }
        $manager->persist($board);

        $board = new Board();
        $board
            ->setName('Symfony')
            ->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consequuntur doloremque excepturi ipsa magnam minus nulla, odio vel veniam voluptate. Ab amet asperiores doloremque id mollitia nesciunt quia quod repudiandae!')
        ;
        $manager->persist($board);

        $manager->flush();
    }

    /**
     * @return Column[]
     */
    private function getColumns()
    {
        $columns[] = (new Column())->setName('TODO');
        $columns[] = (new Column())->setName('DO');
        $columns[] = (new Column())->setName('DONE');

        return $columns;
    }

}