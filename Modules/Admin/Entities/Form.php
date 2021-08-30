<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table    = 'form_employees';
    protected $get_status =[
        '1' => [
            'classname' => 'process',
            'name'  => 'Tiếp nhận'
        ],
        '2' => [
            'classname' => 'success',
            'name'  => 'Đồng ý'
        ],
        '3' => [
            'classname' => 'cancel',
            'name'  => 'Đã hủy'
        ],
    ];
    public function getStatus()
    {
        return Arr::get($this->get_status, $this->status, "[N\A]");
    }

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\FormFactory::new();
    }
    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }
    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }
}
