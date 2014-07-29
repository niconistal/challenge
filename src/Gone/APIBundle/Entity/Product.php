<?php

namespace Gone\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gone\APIBundle\Model\ProductInterface;

/**
 * Product
 *
 * @ORM\Table(name="Product", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"}), @ORM\UniqueConstraint(name="box_id_2", columns={"box_id"})})
 * @ORM\Entity
 */
class Product implements ProductInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Gone\APIBundle\Entity\Box
     *
     * @ORM\ManyToOne(targetEntity="Gone\APIBundle\Entity\Box")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="box_id", referencedColumnName="id")
     * })
     */
    private $box;



    /**
     * Set name
     *
     * @param string $name
     * @return Product
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set box
     *
     * @param \Gone\APIBundle\Entity\Box $box
     * @return Product
     */
    public function setBox(\Gone\APIBundle\Entity\Box $box = null)
    {
        $this->box = $box;

        return $this;
    }

    /**
     * Get box
     *
     * @return \Gone\APIBundle\Entity\Box 
     */
    public function getBox()
    {
        return $this->box;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $log;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->log = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Product
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Add log
     *
     * @param \Gone\APIBundle\Entity\Log $log
     * @return Product
     */
    public function addLog(\Gone\APIBundle\Entity\Log $log)
    {
        $this->log[] = $log;

        return $this;
    }

    /**
     * Remove log
     *
     * @param \Gone\APIBundle\Entity\Log $log
     */
    public function removeLog(\Gone\APIBundle\Entity\Log $log)
    {
        $this->log->removeElement($log);
    }

    /**
     * Get log
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLog()
    {
        return $this->log;
    }
}
