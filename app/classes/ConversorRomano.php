<?php

namespace App\classes;

class ConversorRomano
{

    public $number;


    /**
     * Construtor da classe.
     *
     * @param int $number Número arábico a ser convertido para romano.
     */



    public function __construct($number)
    {
        $this->number = $number;
    }

    /**
     *
     * @return array Array associativo com valores arábicos como chaves e numerais romanos como valores.
     */

    public function definition(): array
    {
        return [
            1000 => "M",
            900 => "CM",
            500 => "D",
            400 => "CD",
            100 => "C",
            90 => "XC",
            50 => "L",
            40 => "XL",
            10 => "X",
            9 => "IX",
            5 => "V",
            4 => "IV",
            1 => "I"
        ];
    }

    /**
     * Converte o número arábico armazenado para um numeral romano.
     *
     * @return string O numeral romano resultante da conversão.
     */
    public function convertRoman()
    {
        $roman = $this->definition();
        $output = "";


        // Itera sobre cada valor e numeral romano definido.
        foreach ($roman as $value => $numerals) {
            // Enquanto o número for maior ou igual ao valor, adiciona o numeral correspondente e subtrai o valor correspondente.
            while ($this->number >= $value) {
                $output .= $numerals;
                $this->number -= $value;
            }
        }
        return $output;
    }
}
