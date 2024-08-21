<?php
$environment = getenv('APP_ENV') ?: 'development';

if ($environment === 'production') {
    define('BASE_URL', 'https://seusite.com');
} else {
    define('BASE_URL', 'http://localhost/seuprojeto');
}

?>
