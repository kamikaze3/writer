<?php

namespace Kamikaze3\Bundle\WriterCoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="writer_user")
 * @ORM\Entity(repositoryClass="Kamikaze3\Bundle\WriterCoreBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Owning side (un Phonenumber sólo puede pertenecer a un User)
     *
     * One-To-Many uni-directional relations with join-table only work using the
     * ManyToMany annotation and a unique-constraint.
     *
     * @ORM\ManyToMany(targetEntity="Sheet")
     * @ORM\JoinTable(name="users_sheets",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="sheet_id", referencedColumnName="id", unique=true)}
     *      )
     **/
    private $sheets;

    public function __construct()
    {
        parent::__construct();

        $this->sheets = new ArrayCollection();
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
     * @return mixed
     */
    public function getSheets()
    {
        return $this->sheets;
    }

    public function addSheet(Sheet $sheet)
    {
        $this->sheets[] = $sheet;
    }

    public function removeSheet(Sheet $sheet)
    {
        $this->sheets->remove($sheet);
    }
}
