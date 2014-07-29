<?php

namespace Gone\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Log
 */
class Log
{
    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $detail;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $product;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $box;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
        $this->box = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Log
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set detail
     *
     * @param string $detail
     * @return Log
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string 
     */
    public function getDetail()
    {
        return $this->detail;
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
     * Add product
     *
     * @param \Gone\APIBundle\Entity\Product $product
     * @return Log
     */
    public function addProduct(\Gone\APIBundle\Entity\Product $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \Gone\APIBundle\Entity\Product $product
     */
    public function removeProduct(\Gone\APIBundle\Entity\Product $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Add box
     *
     * @param \Gone\APIBundle\Entity\Box $box
     * @return Log
     */
    public function addBox(\Gone\APIBundle\Entity\Box $box)
    {
        $this->box[] = $box;

        return $this;
    }

    /**
     * Remove box
     *
     * @param \Gone\APIBundle\Entity\Box $box
     */
    public function removeBox(\Gone\APIBundle\Entity\Box $box)
    {
        $this->box->removeElement($box);
    }

    /**
     * Get box
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBox()
    {
        return $this->box;
    }
}
