<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TargetEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'employee_id',
        'position_id',
        'target_department_id',
        'name',
        'point',
        'status'
    ];
    protected $guarded  = [];
    protected $table    = 'target_employees';

    protected $status =[
        '1' => 'Đang xử lý',
        '2' => 'Đạt'
    ];

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\TargetEmployeeFactory::new();
    }
    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }
    public function position(){
        return $this->belongsTo(Position::class,'position_id');
    }
    public function target_department(){
        return $this->belongsTo(TargetDepart::class,'target_department_id');
    }
    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }
}
