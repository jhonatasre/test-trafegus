<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="drivers")
 */
class Driver
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $rg;

    /**
     * @ORM\Column(type="string", length=11, nullable=false, unique=true)
     */
    private $cpf;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $phone;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Vehicle")
     * @ORM\JoinColumn(name="vehicle_id", referencedColumnName="id", nullable=true)
     */
    private $vehicle;

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
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of rg
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * Set the value of rg
     *
     * @return  self
     */
    public function setRg($rg)
    {
        $this->rg = $rg;

        return $this;
    }

    /**
     * Get the value of cpf
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @return  self
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of vehicle
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * Set the value of vehicle
     *
     * @return  self
     */
    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    public function exchangeArray(array $array)
    {
        $this->name = isset($array['name']) ? $array['name'] : null;
        $this->rg = isset($array['rg']) ? $array['rg'] : null;
        $this->cpf = isset($array['cpf']) ? $array['cpf'] : null;
        $this->phone = isset($array['phone']) ? $array['phone'] : null;
        $this->vehicle = isset($array['vehicle']) ? $array['vehicle'] : null;

        return $this;
    }

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'rg' => $this->rg,
            'cpf' => $this->cpf,
            'phone' => $this->phone,
            'vehicle' => $this->vehicle
        ];
    }
}
