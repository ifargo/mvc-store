<?php
if (php_uname('a')=='Linux fargoDev 4.4.0-150-generic #176-Ubuntu SMP Wed May 29 18:56:05 UTC 2019 i686') {
    return array(
        'host' => 'localhost',
        'dbname' => 'mvc_shop',
        'user' => 'debian-sys-maint',
        //'password' => 'Tf9qRUUefMwwYzy3', Локальная машина
        'password' => 'IPG4bZenIIAOJmAS', // Сервер
    );
} else {
    return array(
        'host' => 'localhost',
        'dbname' => 'mvc_shop',
        'user' => 'debian-sys-maint',
        'password' => 'Tf9qRUUefMwwYzy3', // Локальная машина
        //'password' => 'IPG4bZenIIAOJmAS', // Сервер
    );
}
