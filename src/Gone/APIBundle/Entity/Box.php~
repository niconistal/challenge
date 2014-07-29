<?php

namespace Gone\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gone\APIBundle\Model\BoxInterface;

/**
 * Box
 *
 * @ORM\Table(name="Box")
 * @ORM\Entity
 */
class Box implements BoxInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=100, nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="offer", type="string", length=10, nullable=false)
     */
    private $offer;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set name
     *
     * @param string $name
     * @return Box
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
     * Set status
     *
     * @param string $status
     * @return Box
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set offer
     *
     * @param string $offer
     * @return Box
     */
    public function setOffer($offer)
    {
        $this->offer = $offer;

        return $this;
    }

    /**
     * Get offer
     *
     * @return string 
     */
    public function getOffer()
    {
        return $this->offer;
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

    public static function getValidStatus(){
        return array('New', 'Accepted', 'To schedule pickup', 'Pickup scheduled', 'In transit', 'Received', 'Declined');
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
     * Add log
     *
     * @param \Gone\APIBundle\Entity\Log $log
     * @return Box
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
