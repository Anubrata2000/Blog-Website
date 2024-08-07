<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory,HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         if (empty($model->id)) {
    //             $model->id = Uuid::uuid4()->toString();
    //         }
    //     });
    // }

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image',
        'category',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}