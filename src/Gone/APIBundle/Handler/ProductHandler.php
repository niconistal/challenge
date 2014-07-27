<?php

    namespace Gone\APIBundle\Handler;

    use Doctrine\Common\Persistence\ObjectManager;
    use Symfony\Component\Form\FormFactoryInterface;
    use Gone\APIBundle\Model\ProductInterface;
    use Gone\APIBundle\Form\ProductType;
    use Gone\APIBundle\Exception\InvalidFormException;

    class ProductHandler implements ProductHandlerInterface{

        private $om;
        private $entityClass;
        private $repository;
        private $formFactory;

        public function __construct(ObjectManager $om, $entityClass, FormFactoryInterface $formFactory)
        {
            $this->om = $om;
            $this->entityClass = $entityClass;
            $this->repository = $this->om->getRepository($this->entityClass);
            $this->formFactory = $formFactory;
        }

        /**
         * Get a Product.
         *
         * @param mixed $id
         *
         * @return ProductInterface
         */
        public function get($id)
        {
            return $this->repository->find($id);
        }

        /**
         * Get a list of Products by an attribute.
         *
         * @param array $parameters  the attributes to filter the search
         *
         * @return array
         */
        public function getByAttr(array $parameters)
        {
            return $this->repository->findBy($parameters);
        }

        /**
         * Create a new Product.
         *
         * @param array $parameters
         *
         * @return BoxInterface
         */
        public function post(array $parameters)
        {
            $product = $this->createProduct();

            return $this->processForm($product, $parameters, 'POST');
        }

        /**
         * Edit a Product.
         *
         * @param ProductInterface $product
         * @param array         $parameters
         *
         * @return ProductInterface
         */
        public function put(ProductInterface $product, array $parameters)
        {
            return $this->processForm($product, $parameters, 'PUT');
        }

        /**
         * Partially update a product.
         *
         * @param BoxInterface $product
         * @param array         $parameters
         *
         * @return ProductInterface
         */
        public function patch(ProductInterface $product, array $parameters)
        {
            return $this->processForm($product, $parameters, 'PATCH');
        }

        /**
         * Processes the form.
         *
         * @param ProductInterface $product
         * @param array         $parameters
         * @param String        $method
         *
         * @return ProductInterface
         *
         * @throws \Gone\APIBundle\Exception\InvalidFormException
         */
        private function processForm(ProductInterface $product, array $parameters, $method = "PUT")
        {
            $form = $this->formFactory->create(new ProductType(), $product, array('method' => $method));
            $form->submit($parameters, 'PATCH' !== $method);
            if ($form->isValid()) {

                $product = $form->getData();
                $this->om->persist($product);
                $this->om->flush($product);

                return $product;
            }

            throw new InvalidFormException('Invalid submitted data', $form);
        }

        private function createProduct()
        {
            return new $this->entityClass();
        }

    }