<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    public function checks()
    {
        // У каждого пользователя много постов
        // hasMany определяется у модели, имеющей внешние ключи в других таблицах
        return $this->hasMany(UrlCheck::class);
    }
}
