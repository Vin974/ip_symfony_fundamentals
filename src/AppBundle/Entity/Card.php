<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Card
 * @package AppBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="kanban_card")
 */
class Card
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string")
     */
    protected $text;
    /**
     * @var Column
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Column", inversedBy="cards", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $column;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Card
     */
    public function setText(string $text): Card
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return Column
     */
    public function getColumn(): Column
    {
        return $this->column;
    }

    /**
     * @param Column $column
     * @return Card
     */
    public function setColumn(Column $column): Card
    {
        $this->column = $column;
        return $this;
    }

}