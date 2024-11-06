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
    public function getAll()
    {
        return $this->entityManager->getRepository(Vehicle::class)->findAll();
    }

    /**
     * Count vehicles.
     *
     * @return int
     */
    public function count()
    {
        return $this->entityManager->getRepository(Vehicle::class)->count([]);
    }

    /**
     * Finds a single vehicle by its ID.
     *
     * @param int $id
     * @return Vehicle|null
     */
    public function getById(int $id)
    {
        return $this->entityManager->getRepository(Vehicle::class)->find($id);
    }

    /**
     * Adds a new vehicle.
     *
     * @param Vehicle $vehicle
     * @return Vehicle
     */
    public function add(Vehicle $vehicle)
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
    public function update(Vehicle $vehicle)
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
    public function delete(Vehicle $vehicle)
    {
        $this->entityManager->remove($vehicle);
        $this->entityManager->flush();
    }
}
