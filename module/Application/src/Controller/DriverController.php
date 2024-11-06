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
        $drivers = $this->driverService->getAllDrivers();
        return new ViewModel(['drivers' => $drivers]);
    }

    public function addAction()
    {
        $vehicles = $this->vehicleService->getAllVehicles();

        $vehiclesArray = [];
        foreach ($vehicles as $vehicle) {
            $vehiclesArray[$vehicle->getId()] = $vehicle->getLicensePlate();
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
                $vehicle = $this->vehicleService->getVehicleById($vehicleId);
                $driver->setVehicle($vehicle);

                $this->driverService->addDriver($driver);
                return $this->redirect()->toRoute('driver');
            }
        }

        return new ViewModel(['form' => $form]);
    }

    public function editAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute('driver');
        }

        $driver = $this->driverService->getDriverById($id);

        if (!$driver) {
            return $this->redirect()->toRoute('driver');
        }

        $vehicles = $this->vehicleService->getAllVehicles();

        $vehiclesArray = [];
        foreach ($vehicles as $vehicle) {
            $vehiclesArray[$vehicle->getId()] = $vehicle->getLicensePlate();
        }

        $form = new DriverForm();
        $form->get('vehicle')->setValueOptions($vehiclesArray);
        $form->bind($driver);

        $form->get('vehicle')->setValue($driver->getVehicle()->getId());

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $vehicleId = $form->get('vehicle')->getValue();
                $vehicle = $this->vehicleService->getVehicleById($vehicleId);

                $driver->setVehicle($vehicle);

                $this->driverService->updateDriver($driver);

                return $this->redirect()->toRoute('driver');
            }
        }

        return new ViewModel(['form' => $form, 'id' => $id]);
    }

    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);

        if ($id) {
            $driver = $this->driverService->getDriverById($id);

            if ($driver) {
                $this->driverService->deleteDriver($driver);
            }
        }

        return $this->redirect()->toRoute('driver');
    }
}
