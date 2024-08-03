<?php

namespace App\Http\Controllers\Fragments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        return view('board.dashboard');
    }

    public function policy()
    {
        return view('board.terms.policy');
    }

    public function responsibility()
    {
        return view('board.terms.responsibility');
    }

    public function punishment()
    {
        return view('board.terms.punishment');
    }

    public function budget()
    {
        return view('board.budget');
    }

    public function addbudget()
    {
        return view('board.addbudget');
    }

    public function cashflow()
    {
        return view('board.cashflow');
    }

    public function balance()
    {
        return view('board.balance');
    }

    public function income()
    {
        return view('board.income');
    }

    public function recievable()
    {
        return view('board.recievable');
    }
    public function payable()
    {
        return view('board.payable');
    }

    public function turnover()
    {
        return view('board.turnover');
    }

    public function sales()
    {
        return view('board.sales');
    }

    public function department()
    {
        return view('board.department');
    }

    public function role()
    {
        return view('board.role');
    }

    public function users()
    {
        return view('board.users');
    }

    public function analytics()
    {
        return view('board.analytics');
    }

    public function report()
    {
        return view('board.reporting');
    }
}
