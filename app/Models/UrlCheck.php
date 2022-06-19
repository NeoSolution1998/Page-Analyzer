<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlCheck extends Model
{
    use HasFactory;

    public function url()
    {
        // Принадлежит пользователю
        // belongsTo определяется у модели содержащей внешний ключ
        return $this->belongsTo(Url::class);
    }
}
