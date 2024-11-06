<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\Vehicle;

class VehicleService
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * VehicleService constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Fetches all vehicles.
     *
     * @return Vehicle[]
     */
    public function getAllVehicles()
    {
        return $this->entityManager->getRepository(Vehicle::class)->findAll();
    }

    /**
     * Finds a single vehicle by its ID.
     *
     * @param int $id
     * @return Vehicle|null
     */
    public function getVehicleById(int $id)
    {
        return $this->entityManager->getRepository(Vehicle::class)->find($id);
    }

    /**
     * Adds a new vehicle.
     *
     * @param Vehicle $vehicle
     * @return Vehicle
     */
    public function addVehicle(Vehicle $vehicle)
    {
        $this->entityManager->persist($vehicle);
        $this->entityManager->flush();

        return $vehicle;
    }

    /**
     * Updates an existing vehicle.
     *
     * @param Vehicle $vehicle
     * @return Vehicle
     */
    public function updateVehicle(Vehicle $vehicle)
    {
        $this->entityManager->merge($vehicle);
        $this->entityManager->flush();
        return $vehicle;
    }

    /**
     * Removes a vehicle.
     *
     * @param Vehicle $vehicle
     * @return void
     */
    public function deleteVehicle(Vehicle $vehicle)
    {
        $this->entityManager->remove($vehicle);
        $this->entityManager->flush();
    }
}
