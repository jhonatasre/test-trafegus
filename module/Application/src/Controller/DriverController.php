<?php

namespace Application\Controller;

use Application\Entity\Driver;
use Application\Form\DriverForm;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Application\Service\DriverService;
use Application\Service\VehicleService;

class DriverController extends AbstractActionController
{
    protected $driverService;

    protected $vehicleService;

    public function __construct(DriverService $driverService, VehicleService $vehicleService)
    {
        $this->driverService = $driverService;
        $this->vehicleService = $vehicleService;
    }

    public function indexAction()
    {
        $drivers = $this->driverService->getAll();
        return new ViewModel([
            'activeRoute' => 'driver',
            'drivers' => $drivers
        ]);
    }

    public function createAction()
    {
        $vehicles = $this->vehicleService->getAll();

        $vehiclesArray = [];
        foreach ($vehicles as $vehicle) {
            $vehiclesArray[$vehicle->getId()] = $vehicle->getLicensePlate() . ' | ' . $vehicle->getBrand() . ' | ' . $vehicle->getModel();
        }

        $form = new DriverForm();
        $form->get('vehicle')->setValueOptions($vehiclesArray);
        $form->setInputFilter($form->getInputFilter());

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $driver = new Driver();
                $driver->exchangeArray($form->getData());

                $vehicleId = $form->getData()['vehicle'];
                $vehicle = $this->vehicleService->getById($vehicleId);
                $driver->setVehicle($vehicle);

                $this->driverService->add($driver);
                return $this->redirect()->toRoute('driver');
            }
        }

        return new ViewModel([
            'activeRoute' => 'driver',
            'form' => $form
        ]);
    }

    public function updateAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute('driver');
        }

        $driver = $this->driverService->getById($id);

        if (!$driver) {
            return $this->redirect()->toRoute('driver');
        }

        $vehicles = $this->vehicleService->getAll();

        $vehiclesArray = [];
        foreach ($vehicles as $vehicle) {
            $vehiclesArray[$vehicle->getId()] = $vehicle->getLicensePlate() . ' | ' . $vehicle->getBrand() . ' | ' . $vehicle->getModel();
        }

        $form = new DriverForm();
        $form->get('vehicle')->setValueOptions($vehiclesArray);
        $form->bind($driver);

        $form->get('vehicle')->setValue($driver->getVehicle()->getId());

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $vehicleId = $form->get('vehicle')->getValue();
                $vehicle = $this->vehicleService->getById($vehicleId);

                $driver->setVehicle($vehicle);

                $this->driverService->update($driver);

                return $this->redirect()->toRoute('driver');
            }
        }

        return new ViewModel([
            'activeRoute' => 'driver',
            'form' => $form,
            'id' => $id
        ]);
    }

    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if ($id) {
            $driver = $this->driverService->getById($id);

            if ($driver) {
                $this->driverService->delete($driver);
            }
        }

        return $this->redirect()->toRoute('driver');
    }
}
