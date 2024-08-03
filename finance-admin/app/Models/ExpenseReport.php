<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExpenseReport extends Model
{
    use HasFactory;
    // use Searchable;

    protected $fillable = [
        'amount',
        'category',
        'budget_plan_id',
        'department_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'expense_reports';

    public function budgetPlan()
    {
        return $this->belongsTo(BudgetPlan::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
