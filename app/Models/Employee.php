<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [''];
    protected $table   = 'employees';
    public $sex = [
        '1' => 'Male',
        '2' => 'Female',
    ];
    public function department (){
        return $this->belongsTo(Department::class,'emp_department_id');
    }

}
