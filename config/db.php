<?php

// param for mysql
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
];

// param for sqlite3
/*
$_fn=realpath(__DIR__)."/yii2basic.db";

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'sqlite:'.$_fn,
];
*/