Objetivo:
Este código permite calcular o parcelamento de um valor total com uma entrada opcional, e suporte para periodicidade mensal ou semanal.

Requisitos:

PHP 7.4 ou superior
Estrutura básica de diretórios:
Controllers/ParcelasController.php
Models/ParcelasModel.php
Views/success.php
Views/error.php
Requisição GET Esperada:

valor_total: (float) O valor total a ser parcelado.
qtd_parcelas: (int) A quantidade de parcelas.
data_primeiro_vencimento: (string) Data do primeiro vencimento (formato dd/mm/yyyy).
periodicidade: (string) mensal ou semanal.
valor_entrada: (opcional) (float) Valor de entrada (padrão: 0).
