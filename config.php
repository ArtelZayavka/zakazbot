<?php
/*
 * ZAKAZ BOTI — MAXSUS LITSENZIYA
 * Muallif: Mister Murod Primov xmpa (c) 2026
 * Muallif nomini o‘chirish yoki o‘zgartirish QAT'IYAN TAQIQLANADI
 * To‘liq shartlar: LICENSE faylini ko‘ring
 */
define("murod_xm", "TELEGRAM_BOT_TOKEN");
define("API_URL", "https://api.telegram.org/bot" . murod_xm . "/");

define("GROUP_ID", -100); //=== Bu yerga guruh chatid yoziladi, bot guruhga habarlarini yuborishi uchun 

define("USERS_FILE",    __DIR__ . "/users.json");
define("PRODUCTS_FILE", __DIR__ . "/products.json");
define("ADMINS_FILE",   __DIR__ . "/admins.json");

function tg($method, $params = []) {
    $ch = curl_init(API_URL . $method);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $params
    ]);
    $res = curl_exec($ch);
    curl_close($ch);
    return json_decode($res, true);
}

function readJson($file) {
    if (!file_exists($file)) return [];
    $data = json_decode(file_get_contents($file), true);
    return is_array($data) ? $data : [];
}

function writeJson($file, $data) {
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
