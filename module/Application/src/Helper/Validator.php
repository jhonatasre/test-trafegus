<?php

namespace Application\Helper;


class Validator
{
    public static function cpf($cpf)
    {
        $cpf = preg_replace('/\D/', '', $cpf);

        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/^(\d)\1{10}$/', $cpf)) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += (int)$cpf[$i] * (10 - $i);
        }

        $firstDigit = ($sum * 10) % 11;
        if ($firstDigit == 10 || $firstDigit == 11) {
            $firstDigit = 0;
        }

        if ($cpf[9] != $firstDigit) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < 10; $i++) {
            $sum += (int)$cpf[$i] * (11 - $i);
        }

        $secondDigit = ($sum * 10) % 11;
        if ($secondDigit == 10 || $secondDigit == 11) {
            $secondDigit = 0;
        }

        if ($cpf[10] != $secondDigit) {
            return false;
        }

        return true;
    }
}
