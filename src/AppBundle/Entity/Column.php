<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 09/10/2016
 * Time: 19:40
 */

namespace AppBundle\Entity;

use AppBundle\Entity\Board;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Column
 * @package AppBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="kanban_column")
 */
class Column
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;
    /**
     * @var Board
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Board", inversedBy="columns")
     */
    private $board;
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Card", mappedBy="column", cascade={"persist", "remove"})
     */
    private $cards;

    public function __construct()
    {
        $this->cards = new ArrayCollection;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Column
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set board
     *
     * @param Board $board
     *
     * @return Column
     */
    public function setBoard(Board $board = null)
    {
        $this->board = $board;

        return $this;
    }

    /**
     * Get board
     *
     * @return Board
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * @return ArrayCollection
     */
    public function getCards()
    {
        return $this->cards;
    }

    /**
     * @param Card $card
     * @return $this
     */
    public function addCard(Card $card)
    {
        $this->cards->add($card);
        $card->setColumn($this);

        return $this;
    }

    /**
     * @param Card $card
     * @return $this
     */
    public function removeCard(Card $card)
    {
        $this->cards->remove($card);

        return $this;
    }
}
