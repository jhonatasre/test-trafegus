<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="vehicles")
 */
class Vehicle
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=7, nullable=false, name="license_plate")
     */
    private $licensePlate;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $renavam;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $brand;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $color;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of licensePlate
     */
    public function getLicensePlate()
    {
        return $this->licensePlate;
    }

    /**
     * Set the value of licensePlate
     *
     * @return  self
     */
    public function setLicensePlate($licensePlate)
    {
        $this->licensePlate = $licensePlate;

        return $this;
    }

    /**
     * Get the value of renavam
     */
    public function getRenavam()
    {
        return $this->renavam;
    }

    /**
     * Set the value of renavam
     *
     * @return  self
     */
    public function setRenavam($renavam)
    {
        $this->renavam = $renavam;

        return $this;
    }

    /**
     * Get the value of model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @return  self
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get the value of brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set the value of brand
     *
     * @return  self
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get the value of year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    public function exchangeArray(array $array)
    {
        $this->licensePlate = isset($array['license_plate']) ? $array['license_plate'] : null;
        $this->renavam = isset($array['renavam']) ? $array['renavam'] : null;
        $this->model = isset($array['model']) ? $array['model'] : null;
        $this->brand = isset($array['brand']) ? $array['brand'] : null;
        $this->year = isset($array['year']) ? $array['year'] : null;
        $this->color = isset($array['color']) ? $array['color'] : null;

        return $this;
    }

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'license_plate' => $this->licensePlate,
            'renavam' => $this->renavam,
            'model' => $this->model,
            'brand' => $this->brand,
            'year' => $this->year,
            'color' => $this->color,
        ];
    }
}
