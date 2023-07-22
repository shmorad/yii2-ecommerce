<?php

return [
    'components' => [
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=yii2_ecommerce',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'emulatePrepare'=>true,
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@common/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
            // You have to set
            //
            // 'useFileTransport' => false,
            //
            // and configure a transport for the mailer to send real emails.
            //
            // SMTP server example:
            //    'transport' => [
            //         'class' => 'Swift_SmtpTransport',
            //         'host' => 'sandbox.smtp.mailtrap.io',
            //        'scheme' => 'smtps',
            //        'username' => '9dc95543c6c0b4',
            //        'password' => '1a635e8d81578a',
            //        'port' => 2525 ,
            //        'dsn' => 'native://default',
            //    ],
            
            // DSN example:
            //    'transport' => [
            //        'dsn' => 'smtp://user:pass@smtp.example.com:25',
            //    ],
            
            // See: https://symfony.com/doc/current/mailer.html#using-built-in-transports
            // Or if you use a 3rd party service, see:
            // https://symfony.com/doc/current/mailer.html#using-a-3rd-party-transport
        ],
    ],
];
