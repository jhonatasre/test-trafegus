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
        $vehicles = $this->vehicleService->getAllVehicles();
        return new ViewModel(['vehicles' => $vehicles]);
    }

    public function addAction()
    {
        $form = new VehicleForm();

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $vehicle = new Vehicle();
                $vehicle->exchangeArray($form->getData());

                $this->vehicleService->addVehicle($vehicle);

                return $this->redirect()->toRoute('vehicle');
            }
        }

        return new ViewModel(['form' => $form]);
    }

    public function editAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute('vehicle');
        }

        $vehicle = $this->vehicleService->getVehicleById($id);

        if (!$vehicle) {
            return $this->redirect()->toRoute('vehicle');
        }

        $form = new VehicleForm();
        $form->bind($vehicle);

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $this->vehicleService->updateVehicle($vehicle);
                return $this->redirect()->toRoute('vehicle');
            }
        }

        return new ViewModel(['form' => $form, 'id' => $id]);
    }

    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if ($id) {
            $vehicle = $this->vehicleService->getVehicleById($id);

            if ($vehicle) {
                $this->vehicleService->deleteVehicle($vehicle);
            }
        }

        return $this->redirect()->toRoute('vehicle');
    }
}
