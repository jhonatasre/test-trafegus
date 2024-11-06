<?php

namespace Application\Form;

use Laminas\Form\Form;
use Laminas\InputFilter\InputFilter;

class VehicleForm extends Form
{
    public function __construct()
    {
        parent::__construct('vehicle');

        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'mt-5');

        $this->add([
            'name' => 'license_plate',
            'type' => 'text',
            'attributes' => [
                'class' => 'form-control input-license-plate',
                'required' => 'required',
                'maxlength' => 8
            ],
        ]);

        $this->add([
            'name' => 'renavam',
            'type' => 'text',
            'attributes' => [
                'class' => 'form-control input-renavam',
                'required' => false,
                'maxlength' => 30
            ],
        ]);

        $this->add([
            'name' => 'model',
            'type' => 'text',
            'attributes' => [
                'class' => 'form-control',
                'required' => 'required',
                'maxlength' => 20
            ],
        ]);

        $this->add([
            'name' => 'brand',
            'type' => 'text',
            'attributes' => [
                'class' => 'form-control',
                'required' => 'required',
                'maxlength' => 20
            ],
        ]);

        $this->add([
            'name' => 'year',
            'type' => 'text',
            'attributes' => [
                'class' => 'form-control input-year',
                'required' => 'required',
                'maxlength' => 4
            ],
        ]);

        $this->add([
            'name' => 'color',
            'type' => 'text',
            'attributes' => [
                'class' => 'form-control',
                'required' => 'required',
                'maxlength' => 20
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Gravar',
                'id'    => 'submitbutton',
                'class' => 'btn btn-primary mt-3',
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
                [
                    'name' => 'NotEmpty',
                    'options' => [
                        'messages' => [
                            \Laminas\Validator\NotEmpty::IS_EMPTY => 'A placa é obrigatória',
                        ],
                    ],
                ],
                [
                    'name' => 'StringLength',
                    'options' => [
                        'max' => 8,
                        'messages' => [
                            \Laminas\Validator\StringLength::TOO_LONG => 'A placa não pode ter mais que 8 caracteres',
                        ],
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'renavam',
            'required' => false,
            'filters' => [
                ['name' => 'StringTrim'],
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'max' => 30,
                        'messages' => [
                            \Laminas\Validator\StringLength::TOO_LONG => 'O Renavam não pode ter mais que 30 caracteres',
                        ],
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'model',
            'required' => true,
            'validators' => [
                [
                    'name' => 'NotEmpty',
                    'options' => [
                        'messages' => [
                            \Laminas\Validator\NotEmpty::IS_EMPTY => 'O modelo é obrigatório',
                        ],
                    ],
                ],
                [
                    'name' => 'StringLength',
                    'options' => [
                        'max' => 20,
                        'messages' => [
                            \Laminas\Validator\StringLength::TOO_LONG => 'O modelo não pode ter mais que 20 caracteres',
                        ],
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'brand',
            'required' => true,
            'validators' => [
                [
                    'name' => 'NotEmpty',
                    'options' => [
                        'messages' => [
                            \Laminas\Validator\NotEmpty::IS_EMPTY => 'A marca é obrigatória',
                        ],
                    ],
                ],
                [
                    'name' => 'StringLength',
                    'options' => [
                        'max' => 20,
                        'messages' => [
                            \Laminas\Validator\StringLength::TOO_LONG => 'A marca não pode ter mais que 20 caracteres',
                        ],
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'year',
            'required' => true,
            'validators' => [
                [
                    'name' => 'NotEmpty',
                    'options' => [
                        'messages' => [
                            \Laminas\Validator\NotEmpty::IS_EMPTY => 'O ano é obrigatório',
                        ],
                    ],
                ],
                [
                    'name' => 'Digits',
                    'options' => [
                        'messages' => [
                            \Laminas\Validator\Digits::NOT_DIGITS => 'O ano deve conter apenas números',
                        ],
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'color',
            'required' => true,
            'validators' => [
                [
                    'name' => 'NotEmpty',
                    'options' => [
                        'messages' => [
                            \Laminas\Validator\NotEmpty::IS_EMPTY => 'A cor é obrigatória',
                        ],
                    ],
                ],
                [
                    'name' => 'StringLength',
                    'options' => [
                        'max' => 20,
                        'messages' => [
                            \Laminas\Validator\StringLength::TOO_LONG => 'A cor não pode ter mais que 20 caracteres',
                        ],
                    ],
                ],
            ],
        ]);

        return $inputFilter;
    }
}
