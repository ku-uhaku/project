<?php

namespace App\Models;

use App\Models\Bill;
use App\Models\Payment;
use App\Models\Session;
use App\Models\Vehicle;
use App\Models\Spending;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'birthdate',
        'password',
        'type',
        'image',
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class)->withTimestamps();
    }



    public function spendings()
    {
        return $this->hasMany(Spending::class);
    }

    public function payments()
    {

        return $this->hasMany(Payment::class, 'student_id');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'bywho');
    }

    public function admin()
    {
        return $this->hasMany(User::class, 'bywho');
    }

    public function vehicle()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function sessions()
    {
        return $this->belongsToMany(Session::class)->withTimestamps();
    }
    public function permissions()
    {
        return $this->belongsToMany(PermissionType::class)->withTimestamps();
    }
}
