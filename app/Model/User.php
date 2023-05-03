<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Src\Auth\IdentityInterface;

class User extends Model implements IdentityInterface
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'login',
        'password',
        'role',
        'token',
        'img'
    ];

    protected static function booted()
    {
        static::created(function ($user) {
            $user->password = md5($user->password);
            $user->save();
        });
    }

    //Выборка пользователя по первичному ключу
    public function findIdentity(int $id)
    {
        return self::where('id', $id)->first();
    }

    //Возврат первичного ключа
    public function getId(): int
    {
        return $this->id;
    }

    //Возврат аутентифицированного пользователя
    public function attemptIdentity(array $credentials)
    {
        return self::where(['login' => $credentials['login'],
            'password' => md5($credentials['password'])])->first();
    }

    //Связь с моделью роль
    public function getRole(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role', 'id');
    }

    //Есть ли роль текущего пользователя в массиве ролей
    public function hasRole($roles): bool
    {
        return in_array($this->getRole->title, $roles);
    }
    public function getImg()
    {
        $img = explode('/', app()->auth::user()->img);
        return $img[4];
    }
    public function getToken()
    {
        $token = app()->auth::user()->token;
        return $token;
    }
}

