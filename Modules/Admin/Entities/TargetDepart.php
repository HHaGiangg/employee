<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TargetDepart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'department_id','name','description', 'point','status'
    ];
    protected $guarded = [];
    protected $table    = 'target_departments';
    protected $status =[
        '0' => 'Đạt',
        '1' => 'Đang xử lý'
    ];


    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\TargetDepartFactory::new();
    }
    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }
//    public function target_employee(){
//        return $this->hasOne(TargetEmployee::class, 'id');
//    }

}
