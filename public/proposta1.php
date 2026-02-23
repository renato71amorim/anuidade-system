<?php
if (php_sapi_name() !== 'cli' && empty($_SERVER['HTTP_REFERER'])) {
    header("HTTP/1.0 403 Forbidden");
    exit("Acesso direto não permitido.");
}
