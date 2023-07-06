<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'component_id',
        'role_id',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
