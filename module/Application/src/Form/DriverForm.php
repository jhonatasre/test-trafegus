<?php

namespace Application\Form;

use Laminas\Form\Form;
use Laminas\InputFilter\InputFilter;
use Symfony\Component\Console\Helper\Helper;

class DriverForm extends Form
{
    public function __construct()
    {
        parent::__construct('driver');

        $this->add([
            'name' => 'name',
            'type' => 'text',
            'attributes' => [
                'class' => 'form-control',
                'required' => 'required',
                'maxlength' => 200
            ],
        ]);

        $this->add([
            'name' => 'rg',
            'type' => 'text',
            'attributes' => [
                'class' => 'form-control input-integer',
                'required' => 'required',
                'maxlength' => 20
            ],
        ]);

        $this->add([
            'name' => 'cpf',
            'type' => 'text',
            'attributes' => [
                'class' => 'form-control input-cpf',
                'required' => 'required',
                'maxlength' => 14
            ],
        ]);

        $this->add([
            'name' => 'phone',
            'type' => 'text',
            'attributes' => [
                'class' => 'form-control input-phone',
                'required' => false,
                'maxlength' => 20
            ],
        ]);

        $this->add([
            'name' => 'vehicle',
            'type' => 'select',
            'options' => [
                'empty_option' => 'Selecione um veículo'
            ],
            'attributes' => [
                'class' => 'form-select select2',
                'required' => 'required',
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
                ['name' => 'NotEmpty', 'options' => ['messages' => ['isEmpty' => 'O nome é obrigatório']]],
                ['name' => 'StringLength', 'options' => ['max' => 200, 'messages' => [
                    \Laminas\Validator\StringLength::TOO_LONG => 'O nome não pode ter mais de 200 caracteres.'
                ]]],
            ],
        ]);

        $inputFilter->add([
            'name' => 'rg',
            'required' => true,
            'validators' => [
                ['name' => 'NotEmpty', 'options' => ['messages' => ['isEmpty' => 'O RG é obrigatório']]],
                ['name' => 'StringLength', 'options' => ['max' => 20, 'messages' => [
                    \Laminas\Validator\StringLength::TOO_LONG => 'O RG não pode ter mais de 20 caracteres.'
                ]]],
            ],
        ]);

        $inputFilter->add([
            'name' => 'cpf',
            'required' => true,
            'validators' => [
                ['name' => 'NotEmpty', 'options' => ['messages' => ['isEmpty' => 'O CPF é obrigatório']]],
                ['name' => 'StringLength', 'options' => ['max' => 14, 'messages' => [
                    \Laminas\Validator\StringLength::TOO_LONG => 'O CPF não pode ter mais de 14 caracteres.'
                ]]],
                ['name' => 'Callback', 'options' => [
                    'callback' => function ($value) {
                        return \Application\Helper\Validator::cpf($value);
                    },
                    'messages' => [
                        'callbackValue' => 'O CPF fornecido não é válido.',
                    ],
                ]],
            ],
        ]);

        $inputFilter->add([
            'name' => 'phone',
            'required' => false,
            'validators' => [
                ['name' => 'StringLength', 'options' => ['max' => 20, 'messages' => [
                    \Laminas\Validator\StringLength::TOO_LONG => 'O telefone não pode ter mais de 20 caracteres.'
                ]]],
            ],
        ]);

        $inputFilter->add([
            'name' => 'vehicle',
            'required' => false,
        ]);

        return $inputFilter;
    }
}
