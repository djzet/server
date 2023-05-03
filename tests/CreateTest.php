<?php

use Model\User;
use PHPUnit\Framework\TestCase;


class CreateTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     * @runInSeparateProcess
     */
    public function testCreate(string $httpMethod, array $userData, string $message): void
    {

        //Выбираем занятый логин из базы данных
        if ($userData['login'] === 'root') {
            $userData['login'] = User::get()->first()->login;
        }

        // Создаем заглушку для класса Request.
        $request = $this->createMock(\Src\Request::class);
        // Переопределяем метод all() и свойство method
        $request->expects($this->any())
            ->method('all')
            ->willReturn($userData);
        $request->method = $httpMethod;

        //Сохраняем результат работы метода в переменную
        $result = (new \Controller\Admin\Create())->create($request);

        if (!empty($result)) {
            //Проверяем варианты с ошибками валидации
            $message = '/' . preg_quote($message, '/') . '/';
            $this->expectOutputRegex($message);
            return;
        }

        //Проверяем добавился ли пользователь в базу данных
        $this->assertTrue((bool)User::where('login', $userData['login'])->count());
        //Удаляем созданного пользователя из базы данных
        User::where('login', $userData['login'])->delete();

        $this->assertContains($message, xdebug_get_headers());

    }

    //Метод, возвращающий набор тестовых данных
    static public function additionProvider(): array
    {
        return [
            ['GET', ['login' => '', 'password' => ''],
                '<h3></h3>'
            ],
            ['POST', ['login' => '', 'password' => ''],
                '<h3>{"login":["Поле login пусто","Поле login должго состоять из латиници"],"password":["Поле password пусто"]}</h3>',
            ],
            ['POST', ['login' => '123', 'password' => '123'],
                '<h3>{"login":["Поле login должго состоять из латиници"]}</h3>',
            ],
            ['POST', ['login' => '123', 'password' => ''],
                '<h3>{"login":["Поле login должго состоять из латиници"],"password":["Поле password пусто"]}</h3>',
            ],
            ['POST', ['login' => 'qwe', 'password' => ''],
                '<h3>{"password":["Поле password пусто"]}</h3>',
            ],
            ['POST', ['login' => '', 'password' => '123'],
                '<h3>{"login":["Поле login пусто","Поле login должго состоять из латиници"]}</h3>',
            ],
            ['POST', ['login' => 'root', 'password' => md5('root')],
                '<h3>{"login":["Поле login должно быть уникально"]}</h3>',
            ],
            ['POST', ['login' => 'admin', 'password' => 'admin'],
                'Location: /server/',
            ],
        ];
    }

    //Настройка конфигурации окружения
    protected function setUp(): void
    {

        //Установка переменых среды
        $_SERVER['DOCUMENT_ROOT'] = '/var/www/html';


        //Создаем экземпляр приложения
        $settings = include $_SERVER['DOCUMENT_ROOT'] . '/server/config/app.php';

        $GLOBALS['app'] = new Src\Application((array) $settings);

        //Глобальная функция для доступа к объекту приложения
        if (!function_exists('app')) {
            function app()
            {
                return $GLOBALS['app'];
            }
        }
    }
}