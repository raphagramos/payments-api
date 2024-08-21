Objetivo:
Este código permite calcular o parcelamento de um valor total com uma entrada opcional, com suporte para periodicidade mensal ou semanal.

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
Configuração de Variáveis de Ambiente
O sistema utiliza a variável de ambiente APP_ENV para diferenciar o ambiente de desenvolvimento e produção. Dependendo do valor da variável, a URL base do projeto muda automaticamente.

Definição da Variável APP_ENV:

Desenvolvimento:
Defina APP_ENV=development.

Produção:
Defina APP_ENV=production.
