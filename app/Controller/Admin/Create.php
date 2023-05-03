<?php

namespace Controller\Admin;

use Model\User;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class Create
{
    public function create(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'login' => ['required', 'unique:users,login', 'latin'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'latin' => 'Поле :field должго состоять из латиници',
            ]);
            if ($validator->fails()) {
                return new View('site.create',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            $path = '../public/assets/img/';
            $storage = new \Upload\Storage\FileSystem($path);
            $file = new \Upload\File('img', $storage);

            $new_filename = uniqid();
            $file->setName($new_filename);

            $file_name = $file->getNameWithExtension($new_filename);

            $data = array(
                'name'       => $file->getNameWithExtension(),
                'extension'  => $file->getExtension(),
                'mime'       => $file->getMimetype(),
                'size'       => $file->getSize(),
                'md5'        => $file->getMd5(),
                'dimensions' => $file->getDimensions()
            );
            try {
                $file->upload();
            } catch (\Exception $e) {
                $errors = $file->getErrors();
            }

            if (User::create([
                'csrf_token' => $request->csrf_token,
                'login' => $request->login,
                'password' => $request->password,
                'role' => $request->role,
                'img' => $path . $file_name
            ])) {
                app()->route->redirect('/');
                return false;
            }
        }
        return new View('site.create');
    }
}