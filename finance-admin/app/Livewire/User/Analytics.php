<?php

namespace App\Livewire\User;

use App\Models\AddBudgets;
use App\Models\Balance;
use App\Models\Budget;
use App\Models\Cashflow;
use App\Models\Income;
use App\Models\Payable;
use App\Models\Recievable;
use App\Models\Sales;
use App\Models\Turnover;
use Livewire\Component;

class Analytics extends Component

{
    public function render()
    {
        $budgets = Budget::all();
        $addbudgets = AddBudgets::all();
        $cashflow = Cashflow::all();
        $balance = Balance::all();
        $income = Income::all();
        $payable = Payable::all();
        $recievable = Recievable::all();
        $sales = Sales::all();
        $turnover = Turnover::all();

        $data = [
            'budgetData' => $budgets,
            'addBudgetData' => $addbudgets,
            'cashflowData' => $cashflow,
            'balanceData' => $balance,
            'incomeData' => $income,
            'payableData' => $payable,
            'recievableData' => $recievable,
            'salesData' => $sales,
            'turnoverData' => $turnover
        ];

        return view('livewire.user.analytics', $data);
    }
}
