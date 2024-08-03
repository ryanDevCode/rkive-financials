<?php

namespace App\Livewire\Admin;

use App\Models\AddBudgets;
use App\Models\Balance;
use App\Models\Budget;
use App\Models\Cashflow;
use App\Models\Categories;
use App\Models\Department;
use App\Models\Income;
use App\Models\Payable;
use App\Models\PlanCategories;
use App\Models\Recievable;
use App\Models\Sales;
use App\Models\Status;
use App\Models\Turnover;
use App\Models\Types;
use App\Models\User;
use Livewire\Component;

class Reporting extends Component
{
    public $reportType;

    public $reportDepartment;
    public $reportCategory;
    public $reportStatus;

    public $reportName;
    public $reportAmount;
    public $reportDescription;

    public $search = '';


    public function render()
    {
        $budgets = Budget::all();
        $addBudgets = AddBudgets::all();
        $payables = Payable::all();
        $recievables = Recievable::all();
        $balances = Balance::all();
        $cashflows = Cashflow::all();
        $incomes = Income::all();
        $turnovers = Turnover::all();
        $sales = Sales::all();


        $departments = Department::all();
        $types = Types::all();
        $categories = Categories::all();
        $status = Status::all();
        $users = User::all();
        $planCategories = PlanCategories::all();


        $results = [];
        $idField = '';
        $nameField = '';
        $planNames = [];
        $info = [];
        $view = view('components.logo');

        if ($this->reportType == 'T1') {
            $results = $this->filterBudgets();
            $idField = 'id';
            $nameField = 'budget_name';
            $planNames = $budgets;
            if ($this->reportName) {
                $info = Budget::findOrFail($this->reportName);
                $view = view('components.print.budgets', [
                    'budget' => $info,
                    'departments' => $departments,
                    'status' => $status,
                    'categories' => $categories,
                    'users' => $users,
                    'fileName' => 'Budgets Report - ' . $info->report_name,
                ])->render();
            }
        } elseif ($this->reportType == 'T2') {
            $results = $this->filterAddBudgets();
            $idField = 'request_code';
            $nameField = 'request_name';
            $planNames = $addBudgets;
            if ($this->reportName) {
                $info = AddBudgets::findOrFail($this->reportName);
                $budget = Budget::find($info->request_budget_code);
                $view = view('components.print.addbudgets', [
                    'addbudget' => $info,
                    'budget' => $budget,
                    'departments' => $departments,
                    'status' => $status,
                    'categories' => $categories,
                    'users' => $users,
                    'fileName' => 'Add Budgets Report - ' . $info->report_name,
                ])->render();
            }
        } elseif ($this->reportType == 'T3') {
            $results = $this->filterCashflow();
            $idField = 'cashflow_info';
            $nameField = 'cashflow_info';
            $planNames = collect($cashflows)->unique('cashflow_info')->values()->all();
            if ($this->reportName) {
                $info = Cashflow::where('cashflow_info', 'like', '%' . $this->reportName . '%')->get();
                $view = view('components.print.cashflow', [
                    'cashflows' => $info,
                    'departments' => $departments,
                    'categories' => $planCategories,
                    'fileName' => 'Cashflow Report - ' . $this->reportName,
                ])->render();
            }
        } elseif ($this->reportType == 'T4') {
            $results = $this->filterIncome();
            $idField = 'income_info';
            $nameField = 'income_info';
            $planNames = collect($incomes)->unique('income_info')->values()->all();
            if ($this->reportName) {
                $info = Income::where('income_info', 'like', '%' . $this->reportName . '%')->get();
                $view = view('components.print.income', [
                    'incomes' => $info,
                    'departments' => $departments,
                    'categories' => $planCategories,
                    'fileName' => 'Income Report - ' . $this->reportName,
                ])->render();
            }
        } elseif ($this->reportType == 'T5') {
            $results = $this->filterBalance();
            $idField = 'balance_info';
            $nameField = 'balance_info';
            $planNames = collect($balances)->unique('balance_info')->values()->all();
            if ($this->reportName) {
                $info = Balance::where('balance_info', 'like', '%' . $this->reportName . '%')->get();
                $view = view('components.print.balance', [
                    'balances' => $info,
                    'departments' => $departments,
                    'categories' => $planCategories,
                    'fileName' => 'Balance Report - ' . $this->reportName,
                ])->render();
            }
        } elseif ($this->reportType == 'T6') {
            $results = $this->filterPayable();
            $idField = 'payable_info';
            $nameField = 'payable_info';
            $planNames = collect($payables)->unique('payable_info')->values()->all();
            if ($this->reportName) {
                $info = Payable::where('payable_info', 'like', '%' . $this->reportName . '%')->get();
                $view = view('components.print.payable', [
                    'payables' => $info,
                    'departments' => $departments,
                    'categories' => $planCategories,
                    'fileName' => 'Payable Report - ' . $this->reportName,
                ])->render();
            }
        } elseif ($this->reportType == 'T7') {
            $results = $this->filterReceivable();
            $idField = 'recievable_info';
            $nameField = 'recievable_info';
            $planNames = collect($recievables)->unique('recievable_info')->values()->all();
            if ($this->reportName) {
                $info = Recievable::where('recievable_info', 'like', '%' . $this->reportName . '%')->get();
                $view = view('components.print.recievable', [
                    'recievables' => $info,
                    'departments' => $departments,
                    'categories' => $planCategories,
                    'fileName' => 'Receivable Report - ' . $this->reportName,
                ])->render();
            }
        } elseif ($this->reportType == 'T8') {
            $results = $this->filterTurnover();
            $idField = 'turnover_info';
            $nameField = 'turnover_info';
            $planNames = collect($turnovers)->unique('turnover_info')->values()->all();
            if ($this->reportName) {
                $info = Turnover::where('turnover_info', 'like', '%' . $this->reportName . '%')->get();
                $view = view('components.print.turnover', [
                    'turnovers' => $info,
                    'departments' => $departments,
                    'categories' => $planCategories,
                    'fileName' => 'Turnover Report - ' . $this->reportName,
                ])->render();
            }
        } elseif ($this->reportType == 'T9') {
            $results = $this->filterSales();
            $idField = 'sales_code';
            $nameField = 'sales_info';
            $planNames = collect($sales)->unique('sales_info')->values()->all();
            if ($this->reportName) {
                $info = Sales::where('sales_info', 'like', '%' . $this->reportName . '%')->get();
                $view = view('components.print.sales', [
                    'sales' => $info,
                    'departments' => $departments,
                    'categories' => $planCategories,
                    'fileName' => 'Sales Report - ' . $this->reportName,
                ])->render();
            }
        }

        $data = [
            'budgets' => $budgets,
            'addbudgets' => $addBudgets,
            'departments' => $departments,
            'types' => $types,
            'categories' => $categories,
            'status' => $status,
            'users' => $users,
            'results' => $results,
            'planCategories' => $planCategories,
            'id' => $idField,
            'name' => $nameField,
            'planName' => $planNames,
            'view' => $view,
            // 'sales' => $salesGrouped,
        ];

        return view('livewire.admin.reporting', $data);
    }
    public function resetSearch()
    {
        $this->reportDepartment = null;
        $this->reportStatus = null;
        $this->reportCategory = null;
        $this->reportName = null;
    }

    public function resetReport()
    {
        $this->reportName = null;
    }

    private function filterBudgets()
    {
        $query = Budget::query();

        if ($this->reportDepartment) {
            $query->where('budget_department', $this->reportDepartment);
        }
        if ($this->reportStatus) {
            $query->where('budget_status', $this->reportStatus);
        }
        if ($this->reportCategory) {
            $query->where('budget_category', $this->reportCategory);
        }
        if ($this->reportName) {
            $query->where('id', 'like', '%' . $this->reportName . '%');
        }

        return $query->get();
    }

    private function filterAddBudgets()
    {
        $query = AddBudgets::query();

        if ($this->reportDepartment) {
            $query->where('request_department', $this->reportDepartment);
        }
        if ($this->reportStatus) {
            $query->where('request_status', $this->reportStatus);
        }
        if ($this->reportCategory) {
            $query->where('request_category', $this->reportCategory);
        }
        if ($this->reportName) {
            $query->where('request_code', 'like', '%' . $this->reportName . '%');
        }

        return $query->get();
    }

    private function filterCashflow()
    {
        $query = Cashflow::query();

        if ($this->reportDepartment) {
            $query->where('cashflow_department', $this->reportDepartment);
        }

        if ($this->reportCategory) {
            $query->where('cashflow_category', $this->reportCategory);
        }

        if ($this->reportName) {
            $query->where('cashflow_info', 'like', '%' . $this->reportName . '%');
        }

        return $query->get()->groupBy('cashflow_info');

    }

    private function filterIncome()
    {
        $query = Income::query();

        if ($this->reportDepartment) {
            $query->where('income_department', $this->reportDepartment);
        }

        if ($this->reportCategory) {
            $query->where('income_category', $this->reportCategory);
        }

        if ($this->reportName) {
            $query->where('income_info', 'like', '%' . $this->reportName . '%');
        }

        return $query->get()->groupBy('income_info');

    }

    private function filterBalance()
    {
        $query = Balance::query();

        if ($this->reportDepartment) {
            $query->where('balance_department', $this->reportDepartment);
        }

        if ($this->reportCategory) {
            $query->where('balance_category', $this->reportCategory);
        }

        if ($this->reportName) {
            $query->where('balance_info', 'like', '%' . $this->reportName . '%');
        }

        return $query->get()->groupBy('balance_info');

    }

    private function filterPayable()
    {
        $query = Payable::query();

        if ($this->reportDepartment) {
            $query->where('payable_department', $this->reportDepartment);
        }
        if ($this->reportCategory) {
            $query->where('payable_category', $this->reportCategory);
        }
        if ($this->reportName) {
            $query->where('payable_info', 'like', '%' . $this->reportName . '%');
        }

        return $query->get()->groupBy('payable_info');
    }

    private function filterReceivable()
    {
        $query = Recievable::query();

        if ($this->reportDepartment) {
            $query->where('recievable_department', $this->reportDepartment);
        }

        if ($this->reportCategory) {
            $query->where('recievable_category', $this->reportCategory);
        }

        if ($this->reportName) {
            $query->where('recievable_info', 'like', '%' . $this->reportName . '%');
        }

        return $query->get()->groupBy('recievable_info');
    }

    private function filterTurnover()
    {
        $query = Turnover::query();

        if ($this->reportDepartment) {
            $query->where('turnover_department', $this->reportDepartment);
        }

        if ($this->reportCategory) {
            $query->where('turnover_category', $this->reportCategory);
        }

        if ($this->reportName) {
            $query->where('turnover_info', 'like', '%' . $this->reportName . '%');
        }

        return $query->get()->groupBy('turnover_info');
    }

    private function filterSales()
    {
        $query = Sales::query();

        if ($this->reportDepartment) {
            $query->where('sales_department', $this->reportDepartment);
        }
        if ($this->reportCategory) {
            $query->where('sales_category', $this->reportCategory);
        }
        if ($this->reportName) {
            $query->where('sales_info', 'like', '%' . $this->reportName . '%');
        }

        return $query->get()->groupBy('sales_info');
    }

}
