<?php

namespace Application\Controller;

use Application\Entity\Vehicle;
use Application\Form\VehicleForm;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Application\Service\VehicleService;

class VehicleController extends AbstractActionController
{
    protected $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }


    public function indexAction()
    {
        $vehicles = $this->vehicleService->getAll();
        return new ViewModel([
            'activeRoute' => 'vehicle',
            'vehicles' => $vehicles
        ]);
    }

    public function createAction()
    {
        $form = new VehicleForm();

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $vehicle = new Vehicle();
                $vehicle->exchangeArray($form->getData());

                $this->vehicleService->add($vehicle);

                return $this->redirect()->toRoute('vehicle');
            }
        }

        return new ViewModel([
            'activeRoute' => 'vehicle',
            'form' => $form
        ]);
    }

    public function updateAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute('vehicle');
        }

        $vehicle = $this->vehicleService->getById($id);

        if (!$vehicle) {
            return $this->redirect()->toRoute('vehicle');
        }

        $form = new VehicleForm();
        $form->bind($vehicle);

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $this->vehicleService->update($vehicle);
                return $this->redirect()->toRoute('vehicle');
            }
        }

        return new ViewModel([
            'activeRoute' => 'vehicle',
            'form' => $form,
            'id' => $id
        ]);
    }

    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if ($id) {
            $vehicle = $this->vehicleService->getById($id);

            if ($vehicle) {
                $this->vehicleService->delete($vehicle);
            }
        }

        return $this->redirect()->toRoute('vehicle');
    }
}
