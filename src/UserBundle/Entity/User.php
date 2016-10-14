<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 14/10/2016
 * Time: 11:26
 */

namespace UserBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Class User
 * @package AppBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="kanban_user")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Id()
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var string
     *
     * @ORM\Column(name="fullname", type="string")
     */
    protected $fullname;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * @param string $fullname
     * @return User
     */
    public function setFullname(string $fullname)
    {
        $this->fullname = $fullname;
        return $this;
    }
}
