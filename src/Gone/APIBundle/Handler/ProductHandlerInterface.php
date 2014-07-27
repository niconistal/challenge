<?php

namespace Gone\APIBundle\Handler;

use Gone\APIBundle\Model\ProductInterface;

interface ProductHandlerInterface
{
    /**
     * Get a Box given the identifier
     *
     * @api
     *
     * @param mixed $id
     *
     * @return BoxInterface
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
     * Post Box, creates a new Box.
     *
     * @api
     *
     * @param array $parameters
     *
     * @return BoxInterface
     */
    public function post(array $parameters);

    /**
     * Edit a Box.
     *
     * @api
     *
     * @param BoxInterface   $box
     * @param array           $parameters
     *
     * @return BoxInterface
     */
    public function put(BoxInterface $box, array $parameters);

    /**
     * Partially update a Box.
     *
     * @api
     *
     * @param BoxInterface   $box
     * @param array           $parameters
     *
     * @return BoxInterface
     */
    public function patch(BoxInterface $box, array $parameters);
}