<?php

namespace Gone\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductImages
 */
class ProductImages
{
    /**
     * @var \DateTime
     */
    private $addedDate;

    /**
     * @var string
     */
    private $url;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Gone\APIBundle\Entity\Product
     */
    private $product;


    /**
     * Set addedDate
     *
     * @param \DateTime $addedDate
     * @return ProductImages
     */
    public function setAddedDate($addedDate)
    {
        $this->addedDate = $addedDate;

        return $this;
    }

    /**
     * Get addedDate
     *
     * @return \DateTime 
     */
    public function getAddedDate()
    {
        return $this->addedDate;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return ProductImages
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return ProductImages
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set product
     *
     * @param \Gone\APIBundle\Entity\Product $product
     * @return ProductImages
     */
    public function setProduct(\Gone\APIBundle\Entity\Product $product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Gone\APIBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
