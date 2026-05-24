<?php

declare(strict_types=1);

function clean(string $value): string
{
    return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
}

function getPostValue(string $key, string $default = ''): string
{
    return isset($_POST[$key]) ? clean((string)$_POST[$key]) : $default;
}

function respondJson(array $data, int $statusCode = 200): void
{
    http_response_code($statusCode);
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}
