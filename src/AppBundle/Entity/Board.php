<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Board
 *
 * @ORM\Table(name="kanban_board")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BoardRepository")
 */
class Board
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Column", mappedBy="board", cascade={"persist", "remove"})
     */
    private $columns;


    /**
     * Get id
     *
     * @return int
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
     * @return Board
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
     * Set description
     *
     * @param string $description
     *
     * @return Board
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->columns = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add column
     *
     * @param \AppBundle\Entity\Column $column
     *
     * @return Board
     */
    public function addColumn(\AppBundle\Entity\Column $column)
    {
        $this->columns[] = $column;
        $column->setBoard($this);

        return $this;
    }

    /**
     * Remove column
     *
     * @param \AppBundle\Entity\Column $column
     */
    public function removeColumn(\AppBundle\Entity\Column $column)
    {
        $this->columns->removeElement($column);
    }

    /**
     * Get columns
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getColumns()
    {
        return $this->columns;
    }
}
