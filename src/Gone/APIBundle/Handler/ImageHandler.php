<?php

    namespace Gone\APIBundle\Handler;

    use Doctrine\Common\Persistence\ObjectManager;
    use Symfony\Component\Form\FormFactoryInterface;
    use Gone\APIBundle\Model\ImageInterface;
    use Gone\APIBundle\Form\ImageType;
    use Gone\APIBundle\Exception\InvalidFormException;

    class ImageHandler implements ImageHandlerInterface{

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
         * Get a image.
         *
         * @param mixed $id
         *
         * @return ImageInterface
         */
        public function get($id)
        {
            return $this->repository->find($id);
        }

        /**
         * Delete a image.
         *
         * @param mixed $id
         *
         * @return array
         */
        public function delete($id){
            $image = $this->get($id);
            $this->om->remove($image);
            $this->om->flush();
        }

        /**
         * Get a list of Images by an attribute.
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
         * Create a new Image.
         *
         * @param array $parameters
         *
         * @return ImageInterface
         */
        public function post(array $parameters, $product)
        {


            $image = $this->createImage();
            $image->setUrl($parameters['url']);
            $image->setProduct($product);

            $this->om->persist($image);
            $this->om->flush($image);

            return $image;

            //return $this->processForm($image, $parameters, 'POST');
        }

        /**
         * Edit a Image.
         *
         * @param ImageInterface $image
         * @param array         $parameters
         *
         * @return ImageInterface
         */
        public function put(ImageInterface $image, array $parameters)
        {
            return $this->processForm($image, $parameters, 'PUT');
        }

        /**
         * Partially update a image.
         *
         * @param BoxInterface $image
         * @param array         $parameters
         *
         * @return ImageInterface
         */
        public function patch(ProductInterface $image, array $parameters)
        {
            return $this->processForm($image, $parameters, 'PATCH');
        }

        private function createImage()
        {
            return new $this->entityClass();
        }

    }