<?php

    namespace Gone\APIBundle\Model;

    Interface BoxInterface{
        /**
         * Set name
         *
         * @param string $name
         * @return BoxInterface
         */
        public function setName($name);

        /**
         * Get name
         *
         * @return string 
         */
        public function getName();

        /**
         * Set status
         *
         * @param string $status
         * @return BoxInterface
         */
        public function setStatus($status);

        /**
         * Get status
         *
         * @return string 
         */
        public function getStatus();

        /**
         * Set offer
         *
         * @param string $offer
         * @return BoxInterface
         */
        public function setOffer($offer);

        /**
         * Get offer
         *
         * @return string 
         */
        public function getOffer();
    }