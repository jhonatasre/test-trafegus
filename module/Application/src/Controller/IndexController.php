<?php

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Application\Service\DriverService;
use Application\Service\VehicleService;

class IndexController extends AbstractActionController
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
        return new ViewModel([
            'activeRoute' => 'home',
            'countVehicles' => $this->vehicleService->count(),
            'countDrivers' => $this->driverService->count()
        ]);
    }
}
