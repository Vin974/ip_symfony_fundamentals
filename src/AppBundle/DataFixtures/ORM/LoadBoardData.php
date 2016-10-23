<?php
/**
 * Created by PhpStorm.
 * User: Vin
 * Date: 15/09/2016
 * Time: 16:35
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Board;
use AppBundle\Entity\Card;
use AppBundle\Entity\Column;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class LoadBoardData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $this->loadDevBoard();
        $this->loadEmptyBoard();
    }

    /**
     * Dev Board
     */
    private function loadDevBoard()
    {
        $board = new Board();
        $board
            ->setName('Dev')
            ->setDescription('Ceci est un board de dev')
        ;
        foreach ($this->getColumns() as $column) {
            $board->addColumn($column);
        }

        $this->manager->persist($board);
        $this->manager->flush();
        echo 'Load board dev created' . PHP_EOL;
    }

    /**
     * Empty board
     */
    private function loadEmptyBoard()
    {
        $board = new Board();
        $board
            ->setName('Symfony')
            ->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consequuntur doloremque excepturi ipsa magnam minus nulla, odio vel veniam voluptate. Ab amet asperiores doloremque id mollitia nesciunt quia quod repudiandae!')
        ;
        $this->manager->persist($board);
        $this->manager->flush();
        echo 'Load empty board' . PHP_EOL;
    }

    /**
     * @return Column[]
     */
    private function getColumns()
    {
        $card = (new Card())->setText('JS');

        $columns[] = (new Column())->setName('TODO')->addCard($card);
        $columns[] = (new Column())->setName('DO');
        $columns[] = (new Column())->setName('DONE');

        return $columns;
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}