<?php

    namespace Gone\APIBundle\Model;

    Interface ImageInterface{
    
	    /**
	     * Set addedDate
	     *
	     * @param \DateTime $addedDate
	     * @return ProductImages
	     */
	    public function setAddedDate($addedDate);

	    /**
	     * Get addedDate
	     *
	     * @return \DateTime 
	     */
	    public function getAddedDate();

	    /**
	     * Set url
	     *
	     * @param string $url
	     * @return ProductImages
	     */
	    public function setUrl($url);

	    /**
	     * Get url
	     *
	     * @return string 
	     */
	    public function getUrl();

	    /**
	     * Get id
	     *
	     * @return integer 
	     */
	    public function getId();

	    /**
	     * Set product
	     *
	     * @param \Gone\APIBundle\Entity\Product $product
	     * @return ProductImages
	     */
	    public function setProduct(\Gone\APIBundle\Entity\Product $product = null);

	    /**
	     * Get product
	     *
	     * @return \Gone\APIBundle\Entity\Product 
	     */
	    public function getProduct();

    }