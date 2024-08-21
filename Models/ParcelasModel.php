<?php

class ParcelasModel {
    public function validarData($data) {
        $d = DateTime::createFromFormat('d/m/Y', $data);
        return $d && $d->format('d/m/Y') === $data;
    }

    public function calcularParcelas($valor_total, $qtd_parcelas, $data_primeiro_vencimento, $periodicidade, $valor_entrada) {
        $parcelas = [];
        $valor_parcela = ($valor_total - $valor_entrada) / $qtd_parcelas;
        $data_vencimento = new DateTime($data_primeiro_vencimento);

        for ($i = 1; $i <= $qtd_parcelas; $i++) {
            $parcelas[] = [
                'numero' => $i,
                'valor' => $valor_parcela,
                'data_vencimento' => $data_vencimento->format('d/m/Y'),
                'entrada' => $i === 1 && $valor_entrada > 0
            ];

            if ($periodicidade === 'mensal') {
                $data_vencimento->modify('+1 month');
            } elseif ($periodicidade === 'semanal') {
                $data_vencimento->modify('+1 week');
            }
        }

        return $parcelas;
    }
}
