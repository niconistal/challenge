<?php

    namespace Gone\APIBundle\Handler;

    use Doctrine\Common\Persistence\ObjectManager;
    use Symfony\Component\Form\FormFactoryInterface;
    use Gone\APIBundle\Model\BoxInterface;
    use Gone\APIBundle\Form\BoxType;
    use Gone\APIBundle\Exception\InvalidFormException;
    use Gone\APIBundle\Entity\Log;

    class BoxHandler implements BoxHandlerInterface{

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
         * Get a Box.
         *
         * @param mixed $id
         *
         * @return BoxInterface
         */
        public function get($id)
        {
            return $this->repository->find($id);
        }

        /**
         * Get a list of Boxes.
         *
         * @param int $limit  the limit of the result
         * @param int $offset starting from the offset
         *
         * @return array
         */
        public function all()
        {
            return $this->repository->findBy(array(), null);
        }

        /**
         * Create a new Box.
         *
         * @param array $parameters
         *
         * @return BoxInterface
         */
        public function post(array $parameters)
        {
            $box = $this->createBox();

            return $this->processForm($box, $parameters, 'POST');
        }

        /**
         * Edit a Box.
         *
         * @param BoxInterface $box
         * @param array         $parameters
         *
         * @return BoxInterface
         */
        public function put(BoxInterface $box, array $parameters)
        {
            if ($parameters['offer']){
                if ($box->getOffer() != $parameters['offer'] ){
                    $log = new Log();
                    $log->setDetail("Offer set to: $".$parameters['offer']);
                    $log->addBox($box);
                    $box->addLog($log);
                    $this->om->persist($log);
                    $this->om->flush($log);
                }
                $box->setOffer($parameters['offer']);
                
            }
            if ($parameters['status']){
                if ($box->getStatus() != $parameters['status'] ){
                    $log = new Log();
                    $log->setDetail("Status changed to: ".$parameters['status']);
                    $log->addBox($box);
                    $box->addLog($log);
                    $this->om->persist($log);
                    $this->om->flush($log);
                }
                $box->setStatus($parameters['status']);
            }

            $this->om->persist($box);      
            $this->om->flush($box);

            return $box;
        }

        /**
         * Partially update a Box.
         *
         * @param BoxInterface $box
         * @param array         $parameters
         *
         * @return BoxInterface
         */
        public function patch(BoxInterface $box, array $parameters)
        {
            return $this->processForm($box, $parameters, 'PATCH');
        }

        /**
         * Processes the form.
         *
         * @param BoxInterface $box
         * @param array         $parameters
         * @param String        $method
         *
         * @return BoxInterface
         *
         * @throws \Gone\APIBundle\Exception\InvalidFormException
         */
        private function processForm(BoxInterface $box, array $parameters, $method = "PUT")
        {
            $form = $this->formFactory->create(new BoxType(), $box, array('method' => $method));
            $form->submit($parameters, 'PATCH' !== $method);
            if ($form->isValid()) {

                $box = $form->getData();
                $this->om->persist($box);
                $this->om->flush($box);

                return $box;
            }

            throw new InvalidFormException('Invalid submitted data', $form);
        }

        private function createBox()
        {
            return new $this->entityClass();
        }

    }