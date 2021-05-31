<?php

//Для регистрации бота в телеге
//https://api.telegram.org/bot*TOKEN*/setwebhook?url=*URL*
//https://api.telegram.org/bot1890176882:AAHOxChA95OIsZSeDF29uRgNvKQesz0cuLk/setwebhook?url=https://.../winteh/index.php




# Принимаем запрос
const TOKEN='1890176882:AAHOxChA95OIsZSeDF29uRgNvKQesz0cuLk';

const API_URL='https://api.telegram.org/bot';

$data = json_decode(file_get_contents('php://input'), TRUE);
file_put_contents('file.txt', '$data: '.print_r($data, 1)."\n", FILE_APPEND);




# Обрабатываем команды
$message = $data['message']['text'];

# Формируем массив для отправления в телеграм
$params = [
    'chat_id' => $data['message']['chat']['id'],
    'text'    => $message.' - Мой Великий Белый Господин!!!'
];

# Отправляем запрос в телеграм
file_get_contents('https://api.telegram.org/bot'.TOKEN.'/sendMessage?'.http_build_query($params));
//echo 'Приветствую Тебя,Мой Великий Белый Господин!!!';