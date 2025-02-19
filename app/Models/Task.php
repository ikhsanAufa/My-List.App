<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TaskList;

class Task extends Model
{
    protected $fillable 
    // protected $fillable di Laravel digunakan untuk menentukan kolom mana yang diizinkan untuk diisi secara massal pada model Eloquent.
    = [
        'name',
        'description',
        'is_completed',
        'priority',
        'list_id'
    ];

    protected $guarded 
    // protected $guarded di Laravel adalah properti yang digunakan untuk menentukan kolom yang tidak boleh diisi melalui mass assignment pada model Eloquent.
    = [
        'id',
        'created_at',
        'updated_at'
    ];

    const PRIORITIES = [
        'low',
        'medium',
        'high'
    ];

    public function getPriorityClassAttribute()
    // getPriorityClassAttribute() adalah sebuah Accessor di Laravel yang memungkinkan Anda untuk memodifikasi atau memformat nilai atribut priority_class model secara otomatis saat diakses.
    {
        return match($this->attributes['priority']) {
            'low' => 'success',
            'medium' => 'warning',
            'high' => 'danger',
            default => 'secondary'
        };
    }

    public function list() {
        return $this->belongsTo(TaskList::class, 'list_id');
    }
}

