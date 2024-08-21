<?php

require_once __DIR__ . '/../models/ParcelasModel.php'; 

class ParcelasController {
    private $model;

    public function __construct() {
        $this->model = new ParcelasModel();
    }

    public function handleRequest() {
        if (isset($_GET['valor_total'], $_GET['qtd_parcelas'], $_GET['data_primeiro_vencimento'], $_GET['periodicidade'])) {
            $valor_total = filter_var($_GET['valor_total'], FILTER_VALIDATE_FLOAT);
            $qtd_parcelas = filter_var($_GET['qtd_parcelas'], FILTER_VALIDATE_INT);
            $data_primeiro_vencimento = $_GET['data_primeiro_vencimento'];
            $periodicidade = $_GET['periodicidade'];
            $valor_entrada = isset($_GET['valor_entrada']) ? filter_var($_GET['valor_entrada'], FILTER_VALIDATE_FLOAT) : 0;

            $erros = [];
            if ($valor_total === false || $valor_total <= 0) $erros[] = 'valor_total deve ser um número positivo.';
            if ($qtd_parcelas === false || $qtd_parcelas <= 0) $erros[] = 'qtd_parcelas deve ser um número inteiro positivo.';
            if (!$this->model->validarData($data_primeiro_vencimento)) $erros[] = 'data_primeiro_vencimento deve estar no formato YYYY-MM-DD.';
            if (!in_array($periodicidade, ['mensal', 'semanal'])) $erros[] = 'periodicidade deve ser "mensal" ou "semanal".';
            if ($valor_entrada < 0 || $valor_entrada > $valor_total) $erros[] = 'valor_entrada deve ser um valor não negativo e menor ou igual a valor_total.';

            if (empty($erros)) {
                $parcelas = $this->model->calcularParcelas($valor_total, $qtd_parcelas, $data_primeiro_vencimento, $periodicidade, $valor_entrada);
                $data = [
                    'valor_total' => $valor_total,
                    'qtd_parcelas' => $qtd_parcelas,
                    'valor_entrada' => $valor_entrada,
                    'parcelas' => $parcelas
                ];
                require __DIR__ . '/../Views/success.php'; 
            } else {
                $message = implode(', ', $erros);
                require __DIR__ . '/../Views/error.php'; 
            }
        } else {
            $message = 'Parâmetros necessários não fornecidos.';
            require __DIR__ . '/../Views/error.php'; 
        }
    }
}
