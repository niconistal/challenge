<?php

    namespace Gone\APIBundle\Model;

    Interface ProductInterface{
    	/**
	     * Set name
	     *
	     * @param string $name
	     * @return Product
	     */
	    public function setName( $name );

	    /**
	     * Get name
	     *
	     * @return string 
	     */
	    public function getName();

	    /**
	     * Get id
	     *
	     * @return integer 
	     */
	    public function getId();

	    /**
	     * Set box
	     *
	     * @param \Gone\APIBundle\Entity\Box $box
	     * @return Product
	     */
	    public function setBox( $box );

	    /**
	     * Get box
	     *
	     * @return \Gone\APIBundle\Entity\Box 
	     */
	    public function getBox();

    }