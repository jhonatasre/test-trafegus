<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\Driver;

class DriverService
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * DriverService constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Fetches all drivers.
     *
     * @return Driver[]
     */
    public function getAll()
    {
        return $this->entityManager->getRepository(Driver::class)->findAll();
    }

    /**
     * Count drivers.
     *
     * @return int
     */
    public function count()
    {
        return $this->entityManager->getRepository(Driver::class)->count([]);
    }

    /**
     * Finds a single driver by its ID.
     *
     * @param int $id
     * @return Driver|null
     */
    public function getById(int $id)
    {
        return $this->entityManager->getRepository(Driver::class)->find($id);
    }

    /**
     * Adds a new driver.
     *
     * @param Driver $driver
     * @return Driver
     */
    public function add(Driver $driver)
    {
        $this->entityManager->persist($driver);
        $this->entityManager->flush();
        return $driver;
    }

    /**
     * Updates an existing driver.
     *
     * @param Driver $driver
     * @return Driver
     */
    public function update(Driver $driver)
    {
        $this->entityManager->merge($driver);
        $this->entityManager->flush();
        return $driver;
    }

    /**
     * Removes a driver.
     *
     * @param Driver $driver
     * @return void
     */
    public function delete(Driver $driver)
    {
        $this->entityManager->remove($driver);
        $this->entityManager->flush();
    }
}
