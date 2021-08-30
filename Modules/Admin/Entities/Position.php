<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Position extends Model
{
    use HasFactory;

    //protected $guarded = [''];
    protected $fillable = [
        'id',
        'department_id',
        'name',
        'title',
        'description',

    ];
    protected $table    = 'employee_positions';

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\PositionFactory::new();
    }
    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }
    public function diary(){
        return $this->hasOne(Diary::class,'id');
    }
}
