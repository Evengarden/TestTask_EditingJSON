<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Docs extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'id',
        'payload'
    ];

    public $incrementing = false;

    protected $casts = [
        'payload' => 'array'
    ];

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('id', $value)->firstOrFail();
    }
}
