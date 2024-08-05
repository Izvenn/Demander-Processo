<?php

namespace App\Handlers;

use App\Classes\ConversorReal;
use App\Classes\ConversorRomano;

class ConversionHandler
{
    /**
     * Manipula a conversão baseada nos dados recebidos.
     *
     * @param array $postData Dados recebidos via POST com números que serão convertidos.
     * @return array Resultado da conversão ou mensagens de erro.
     */
    public function handleConversion(array $postData): array
    {
        // Inicializa um array para armazenar os resultados ou mensagens de erro.
        $resultados = [];

        // Verifica se o método de requisição não é POST e retorna resultados vazios se for o caso.
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
           
            return $resultados;
        }

        try {
            // Verifica se foi fornecido um número arábico para conversão.
            if (!empty($postData['numero'])) {
                $numero = intval($postData['numero']); // Converte o valor para um inteiro.
                $conversor = new ConversorRomano($numero); // Cria uma instância do conversor de números romanos.
                $resultados['roman'] = "O número $numero em romano é: " . $conversor->convertRoman();
            }

            // Verifica se foi fornecido um número romano para conversão.
            if (!empty($postData['romano'])) {
                $romano = $postData['romano']; // Obtém o valor do número romano.
                $conversor = new ConversorReal($romano); // Cria uma instância do conversor de números arábicos.
                $resultados['arabic'] = "O número romano $romano em arábico é: " . $conversor->convertReal();
            }

            // caso nenhum dado seja fornecido para conversão, adiciona uma mensagem de erro.
            if (empty($postData['numero']) && empty($postData['romano'])) {
                $resultados['error'] = "Por favor, forneça um número arábico ou um número romano.";
            }
        } catch (\InvalidArgumentException $e) {
            $resultados['error'] = "Erro: " . $e->getMessage();
        } catch (\Exception $e) {
            $resultados['error'] = "Erro: " . $e->getMessage();
        }

        return $resultados;
    }
}
