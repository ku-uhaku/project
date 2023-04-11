<?php

namespace App\Models;

use App\Models\Payment;
use Database\Factories\UsersFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;
    // protected $table = 'users';

    //forieng key whit table Paments
    public function payments()
    {
        return $this->hasMany(Payment::class, 'student_id');
    }

    protected static function newFactory(): UsersFactory
    {
        return UsersFactory::new();
    }
}
