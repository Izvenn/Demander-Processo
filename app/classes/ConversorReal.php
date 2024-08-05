<?php

namespace App\Classes;

class ConversorReal
{
    public string $value;

    /**
     * Construtor da classe.
     *
     * @param string $value Valor romano a ser convertido.
     */


    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Define o mapeamento dos caracteres romanos para valores reais.
     *
     * @return array Array associativo com os valores romanos e seus respectivos valores reais.
     */
    private function definition(): array
    {
        return [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000
        ];
    }

    /**
     * Converte o valor romano para um número real.
     *
     * @return int Valor real resultante da conversão.
     */
    public function convertReal(): int
    {
        $roman = $this->definition();
        $value = strtoupper($this->value); //Conversão de valores para maiusculas
        $length = strlen($value); // Obtém o comprimento da string do valor romano.
        $total = 0; // Inicializa o total da conversão.

        // Percorre sobre cada caractere da string.
        for ($i = 0; $i < $length; $i++) {
            $currentChar = $value[$i]; // Caractere atual.
            $currentValue = $roman[$currentChar]; // Valor arábico do caractere atual.

            // Verifica se há um próximo caractere na string.
            if ($i + 1 < $length) {
                $nextChar = $value[$i + 1];
                $nextValue = $roman[$nextChar];

                // Se o valor atual for menor que o próximo, ele subtrai; caso contrário, ele soma.
                if ($currentValue < $nextValue) {
                    $total -= $currentValue;
                } else {
                    $total += $currentValue;
                }
            } else {
                // Para o último caractere da string, sempre adiciona seu valor.
                $total += $currentValue;
            }
        }

        return $total;
    }
}
