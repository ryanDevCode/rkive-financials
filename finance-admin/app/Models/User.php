<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        'password',
        'userpassword',
        'role_code',
        'department_code',
        'profile',
    ];

    protected $hidden = [
        'password',
        'userpassword',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_code', 'role_code');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_code', 'department_code');
    }

    public function budgets()
    {
        return $this->belongsToMany(Budget::class, 'budget_approvedBy', 'username');
    }

    public function addBudgets()
    {
        return $this->belongsToMany(AddBudgets::class, 'request_approvedBy', 'username');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id'); // Specify the foreign key
    }

    public function expenseTracks()
    {
        return $this->hasMany(TravelExpense::class, 'user_id');
    }

}
