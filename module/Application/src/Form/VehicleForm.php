<?php

namespace Application\Form;

use Laminas\Form\Form;
use Laminas\InputFilter\InputFilter;

class VehicleForm extends Form
{
    public function __construct()
    {
        parent::__construct('vehicle');

        $this->add([
            'name' => 'license_plate',
            'type' => 'text',
            'options' => ['label' => 'License Plate'],
        ]);

        $this->add([
            'name' => 'renavam',
            'type' => 'text',
            'options' => ['label' => 'Renavam'],
        ]);

        $this->add([
            'name' => 'model',
            'type' => 'text',
            'options' => ['label' => 'Model'],
        ]);

        $this->add([
            'name' => 'brand',
            'type' => 'text',
            'options' => ['label' => 'Brand'],
        ]);

        $this->add([
            'name' => 'year',
            'type' => 'number',
            'options' => ['label' => 'Year'],
        ]);

        $this->add([
            'name' => 'color',
            'type' => 'text',
            'options' => ['label' => 'Color'],
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
            'name' => 'license_plate',
            'required' => true,
            'validators' => [
                ['name' => 'NotEmpty', 'options' => ['messages' => ['isEmpty' => 'License plate is required']]],
                ['name' => 'StringLength', 'options' => ['max' => 7]],
            ],
        ]);

        $inputFilter->add([
            'name' => 'renavam',
            'required' => false,
            'filters' => [['name' => 'StringTrim']],
            'validators' => [['name' => 'StringLength', 'options' => ['max' => 30]]],
        ]);

        $inputFilter->add([
            'name' => 'model',
            'required' => true,
            'validators' => [['name' => 'StringLength', 'options' => ['max' => 20]]],
        ]);

        $inputFilter->add([
            'name' => 'brand',
            'required' => true,
            'validators' => [['name' => 'StringLength', 'options' => ['max' => 20]]],
        ]);

        $inputFilter->add([
            'name' => 'year',
            'required' => true,
            'validators' => [['name' => 'Digits']],
        ]);

        $inputFilter->add([
            'name' => 'color',
            'required' => true,
            'validators' => [['name' => 'StringLength', 'options' => ['max' => 20]]],
        ]);

        return $inputFilter;
    }
}
