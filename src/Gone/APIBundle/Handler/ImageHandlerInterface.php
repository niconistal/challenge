<?php

    namespace Gone\APIBundle\Handler;

    use Gone\APIBundle\Model\ImageInterface;

    interface ImageHandlerInterface{

        /**
         * Get a image.
         *
         * @param mixed $id
         *
         * @return ImageInterface
         */
        public function get($id);

        /**
         * Get a list of Images by an attribute.
         *
         * @param array $parameters  the attributes to filter the search
         *
         * @return array
         */
        public function getByAttr(array $parameters);


        /**
         * Create a new Image.
         *
         * @param array $parameters
         *
         * @return ImageInterface
         */
        public function post(array $parameters, $product);

        /**
         * Edit a Image.
         *
         * @param ImageInterface $image
         * @param array         $parameters
         *
         * @return ImageInterface
         */
        public function put(ImageInterface $image, array $parameters);

        /**
         * Partially update a image.
         *
         * @param BoxInterface $image
         * @param array         $parameters
         *
         * @return ImageInterface
         */
        public function patch(ProductInterface $image, array $parameters);


    }