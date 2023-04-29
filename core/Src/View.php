<?php

namespace Src;

use Exception;

class View
{
    private string $view = '';
    private array $data = [];
    private string $root = '';
    private string $layout = '/layouts/main.php';

    public function __construct(string $view = '', array $data = [])
    {
        $this->root = $this->getRoot();
        $this->view = $view;
        $this->data = $data;
    }

    //Полный путь до директории с представлениями
    private function getRoot(): string
    {
        global $app;
        $root = $app->settings->getRootPath();
        $path = $app->settings->getViewsPath();

        return $_SERVER['DOCUMENT_ROOT'] . $root . $path;
    }

    //Путь до основного файла с шаблоном сайта

    /**
     * @throws Exception
     */
    public function __toString(): string
    {
        return $this->render($this->view, $this->data);
    }

    //Путь до текущего шаблона

    /**
     * @throws Exception
     */
    public function render(string $view = '', array $data = []): string
    {
        $path = $this->getPathToView($view);

        if (file_exists($this->getPathToMain()) && file_exists($path)) {

            //Импортирует переменные из массива в текущую таблицу символов
            extract($data, EXTR_PREFIX_SAME, '');

            //Включение буферизации вывода
            ob_start();
            require $path;
            //Помещаем буфер в переменную и очищаем его
            $content = ob_get_clean();

            //Возвращаем собранную страницу
            return require($this->getPathToMain());
        }
        throw new Exception('Error render ViewUser');
    }

    private function getPathToView(string $view = ''): string
    {
        $view = str_replace('.', '/', $view);
        return $this->getRoot() . "/$view.php";
    }

    private function getPathToMain(): string
    {
        return $this->root . $this->layout;
    }

}
