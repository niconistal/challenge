<?php

namespace Gone\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gone\APIBundle\Model\ImageInterface;

/**
 * ProductImages
 *
 * @ORM\Table(name="Product_images", indexes={@ORM\Index(name="product_id", columns={"product_id"})})
 * @ORM\Entity
 */
class Image implements ImageInterface
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="added_date", type="datetime", nullable=false)
     */
    private $addedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=250, nullable=false)
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Gone\APIBundle\Entity\Product
     *
     * @ORM\ManyToOne(targetEntity="Gone\APIBundle\Entity\Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
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
    public function setProduct(\Gone\APIBundle\Entity\Product $product = null)
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
