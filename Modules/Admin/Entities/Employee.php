<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\Department;
use Modules\Admin\Entities\Position;


class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
//    protected $guarded = [''];
    protected $fillable = ['id', 'position_id','department_id','name','dob','sex','address','identity_card','email','phone','avatar','date_join','date_entry','date_end','date_out','exp_year'];
    public $timestamps = false;
    protected $status =[
        '1' => 'Nam',
        '2' => 'Nữ'
    ];

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\EmployeeFactory::new();
    }
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
    public function position()
    {
        return $this->belongsTo(Position::class,'position_id');
    }


    public function diary(){
        return $this->hasMany(Diary::class);
    }
    public function test(){
        return true;
    }

}
