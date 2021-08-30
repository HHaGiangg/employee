<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;
use Modules\Admin\Entities\Employee;

class Department extends Model
{
    use HasFactory;

//    protected $fillable = ['name', 'description', 'position_id', 'action','employee_id'];
    protected $table = 'departments';
    protected $guarded = [''];
    protected $status =[
        '1' => 'Active',
        '0' => 'Cancel'
    ];

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\DepartmentFactory::new();
    }
    public function position()
    {
        return $this->belongsTo(Position::class,'position_id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }
}
