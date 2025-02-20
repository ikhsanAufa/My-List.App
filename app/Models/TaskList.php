<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $fillable = 
    // protected $fillable di Laravel digunakan untuk menentukan kolom mana yang diizinkan untuk diisi secara massal pada model Eloquent.
    ['name'];
    protected $guarded =
    // protected $guarded di Laravel adalah properti yang digunakan untuk menentukan kolom yang tidak boleh diisi melalui mass assignment pada model Eloquent.
    [
        'id',
        'created_at',
        'updated_at'
    ];

    public function tasks() {
        return $this->hasMany(Task::class, 'list_id');
    }
}
