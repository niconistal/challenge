<?php

namespace Gone\APIBundle\Handler;

use Gone\APIBundle\Model\ProductInterface;

interface ProductHandlerInterface
{
    /**
     * Get a Product given the identifier
     *
     * @api
     *
     * @param mixed $slug
     * @param mixed $id
     *
     * @return ProductInterface
     */
    public function get($id);

    /**
     * Get a list of Boxes.
     *
     * @param int $limit  the limit of the result
     * @param int $offset starting from the offset
     *
     * @return array
     */
    public function getByAttr(array $parameters);

    /**
     * Post Product, creates a new Product.
     *
     * @api
     *
     * @param array $parameters
     *
     * @return ProductInterface
     */
    public function post(array $parameters);

    /**
     * Edit a Product.
     *
     * @api
     *
     * @param ProductInterface   $product
     * @param array           $parameters
     *
     * @return ProductInterface
     */
    public function put(ProductInterface $product, array $parameters);

    /**
     * Partially update a Product.
     *
     * @api
     *
     * @param ProductInterface   $product
     * @param array           $parameters
     *
     * @return ProductInterface
     */
    public function patch(ProductInterface $product, array $parameters);
}