<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BudgetPlan extends Model
{
    use HasFactory;
    // use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'department_id',
        'budget_period',
        'creator',
        'user_id',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'budget_plans';

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function expenseReports()
    {
        return $this->hasMany(ExpenseReport::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
