<?php

namespace Controller\Admin;

use Model\Role;
use Model\User;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class Update
{
    public function update(Request $request): string
    {
        $roles = Role::all();
        if ($request->method === 'GET') {
            $users = User::where('id', $request->id)->first();
        }
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'login' => ['required', 'latin'],
                'role' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'latin' => 'Поле :field должго состоять из латиници',
            ]);
            if ($validator->fails()) {
                return new View('site.update',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'roles' => $roles]);
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
            if (User::where('id', $request->id)->update([
                'id' => $request->id,
                'csrf_token' => $request->csrf_token,
                'login' => $request->login,
                'role' => $request->role,
                'img' => $path . $file_name
            ])) {
                app()->route->redirect('/');
                return false;
            }
        }
        return (new View())->render('site.update', ['users' => $users, 'roles' => $roles]);
    }
}