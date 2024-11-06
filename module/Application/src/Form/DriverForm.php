<?php

namespace Application\Form;

use Laminas\Form\Form;
use Laminas\InputFilter\InputFilter;

class DriverForm extends Form
{
    public function __construct()
    {
        parent::__construct('driver');

        $this->add([
            'name' => 'name',
            'type' => 'text',
            'options' => ['label' => 'Name'],
        ]);

        $this->add([
            'name' => 'rg',
            'type' => 'text',
            'options' => ['label' => 'RG'],
        ]);

        $this->add([
            'name' => 'cpf',
            'type' => 'text',
            'options' => ['label' => 'CPF'],
        ]);

        $this->add([
            'name' => 'phone',
            'type' => 'text',
            'options' => ['label' => 'Phone'],
        ]);

        $this->add([
            'name' => 'vehicle',
            'type' => 'select',
            'options' => [
                'label' => 'Vehicle',
                'empty_option' => 'Select a vehicle'
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Submit',
                'id'    => 'submitbutton',
                'class' => 'btn btn-primary',
            ],
        ]);

        $this->setInputFilter($this->createInputFilter());
    }

    private function createInputFilter()
    {
        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'name',
            'required' => true,
            'validators' => [
                ['name' => 'NotEmpty', 'options' => ['messages' => ['isEmpty' => 'Name is required']]],
                ['name' => 'StringLength', 'options' => ['max' => 200]],
            ],
        ]);

        $inputFilter->add([
            'name' => 'rg',
            'required' => true,
            'validators' => [
                ['name' => 'NotEmpty', 'options' => ['messages' => ['isEmpty' => 'RG is required']]],
                ['name' => 'StringLength', 'options' => ['max' => 20]],
            ],
        ]);

        $inputFilter->add([
            'name' => 'cpf',
            'required' => true,
            'validators' => [
                ['name' => 'NotEmpty', 'options' => ['messages' => ['isEmpty' => 'CPF is required']]],
                ['name' => 'StringLength', 'options' => ['max' => 11]],
            ],
        ]);

        $inputFilter->add([
            'name' => 'phone',
            'required' => false,
            'validators' => [
                ['name' => 'StringLength', 'options' => ['max' => 20]],
            ],
        ]);

        $inputFilter->add([
            'name' => 'vehicle',
            'required' => false,
        ]);

        return $inputFilter;
    }
}
