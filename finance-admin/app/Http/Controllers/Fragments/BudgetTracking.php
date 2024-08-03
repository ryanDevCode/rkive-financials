<?php

namespace App\Http\Controllers\Fragments;

use App\Models\Budget;
use App\Models\Categories;
use App\Models\Department;
use App\Models\Status;
use App\Models\Track;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BudgetTracking extends Controller
{
    public function budgetExpense()
    {
        $departments = Department::all();
        // $quarterPeriod = $quarters->groupBy('quarter');

        $quarters = Budget::selectRaw('budget_department, budget_approvedAmount, budget_amount, QUARTER(budget_approvedDate) as quarter')->get();
        $qrtDept = $quarters->groupBy('quarter');
        $plannedSum = $quarters->sum('budget_approvedAmount');

        $actualSum = Track::sum('track_amount');
        $remainingSum = $plannedSum - $actualSum;
        $quarterDepartment = $quarters->groupBy('budget_department');

        $matchedBudget = [];
        foreach ($quarterDepartment as $deptCode => $quarters) {
            $matchedBudget[$deptCode] = $quarters->sum('budget_approvedAmount');
        }

        $trackDepartment = Track::all()->groupBy('track_department');
        $matchedTrack = [];

        foreach ($trackDepartment as $deptCode => $tracks) {
            $matchedTrack[$deptCode] = $tracks->sum('track_amount');
        }


        $data = [
            'departments' => $departments,
            'quarterDepartment' => $quarterDepartment,
            'quarters' => $quarters,
            'matchedBudget' => $matchedBudget,
            'matchedTrack' => $matchedTrack,
            'qrtDept' => $qrtDept,
            'plannedSum' => $plannedSum,
            'remainingSum' => $remainingSum,
        ];

        return view('board.track.expense.expense', $data);
    }

    public function viewBudgetExpense(string $id)
    {
        $budget = Budget::where('budget_department', $id)->get();
        $categories = Categories::all();
        $departments = Department::all();

        foreach ($departments as $item) {
            if ($item->department_code == $id) {
                $department = $item->department_name;
            }
        }

        $quarters = Budget::selectRaw('budget_category,budget_approvedAmount, budget_amount, QUARTER(budget_approvedDate) as quarter')
            ->where('budget_department', $id)
            ->get()
            ->groupBy('budget_category');


        $trackQuarter = Track::selectRaw('track_category, track_amount, QUARTER(track_date) as quarter')->where('track_department', $id)->get()->unique();
        // $trackDepartment = Track::where('track_department', $id)->get();
        $trackSum = $trackQuarter->sum('track_amount');
        $trackCat = Track::where('track_department', $id)->get()->groupBy('track_category');

        $matchedTrack = [];


        foreach ($trackCat as $catCode => $tracks) {
            $matchedTrack[$catCode] = $tracks->sum('track_amount');
        }

        $data = [
            'budget' => $budget,
            'trackQuarter' => $trackQuarter,
            'categories' => $categories,
            'departments' => $departments,
            'quarters' => $quarters,
            'matchedTrack' => $matchedTrack,
            'trackSum' => $trackSum,
            'trackCat' => $trackCat,
            'department' => $department
        ];


        return view('board.track.expense.viewexpense', $data);
    }

    // public function saveBudgetExpense()
    // {
    //     $departments = Department::all();
    //     return view('board.admin.budget.create', compact('departments'));
    // }

    public function budgetPlan()
    {
        $budgets = Budget::all();
        $status = Status::all();
        $track = Track::all();

        $budgetSum = $budgets->sum('budget_approvedAmount');
        $trackSum = $track->sum('track_amount');

        $spend = $budgetSum - $trackSum;

        $data = [
            'budgets' => $budgets,
            'status' => $status,
            'budgetSum' => $budgetSum,
            'trackSum' => $trackSum,
            'spend' => $spend
        ];

        return view('board.track.budget.budgetplan', $data);
    }

    public function budgetPlanExpenses($id)
    {
        $budget = Budget::where('id', $id)->get();
        $categories = Categories::all();
        $expenses = Track::where('track_id', $id)->get();
        $expenseSum = $expenses->sum('track_amount');

        $data = [
            'budget' => $budget,
            'categories' => $categories,
            'expenses' => $expenses,
            'expenseSum' => $expenseSum
        ];

        return view('board.track.budget.viewBudgets', $data);
    }

    public function saveBudgetExpense(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'track_id' => 'required',
            'track_department' => 'required',
            'track_category' => 'required',
            'track_amount' => 'required',
            'track_date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        Track::create([
            'track_id' => $request->input('track_id'),
            'track_department' => $request->input('track_department'),
            'track_category' => $request->input('track_category'),
            'track_amount' => $request->input('track_amount'),
            'track_date' =>  date('Y-m-d', strtotime($request->input('track_date'))),
        ]);

        return redirect()->back()->with('success', 'Expense added successfully');
    }
}


