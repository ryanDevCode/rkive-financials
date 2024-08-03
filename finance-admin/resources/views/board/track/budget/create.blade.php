@php
    $user = auth()
        ->user()
        ->only(['first_name', 'last_name', 'role_code', 'profile']);
    $user['profile'] = asset('storage/' . $user['profile']);
    $user['name'] = $user['first_name'] . ' ' . $user['last_name'];
    $user['role'] = strtolower($user['role_code']);
    // dd($user);
    if ($user['role'] == '102') {
        $role = 'admin';
    } else {
        $role = 'user';
    }
@endphp

@extends('layouts.custom.' . $role . '.master')

@section('title', "'" . $role . "Dashboard'")

@section('profile-nav')
    <div class="media profile-media"><img src="{{ $user['profile'] }}" style="width: 30px; height: 30px;" alt="User Photo" class="rounded-circle">
        <div class="media-body"><span>{{ $user['name'] }}</span>
            <p class="mb-0 font-roboto">{{ strtoupper($role) }} <i class="middle fa fa-angle-down"></i></p>
        </div>
    </div>
@endsection

@section('css')

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
    <style>
        .table tbody tr:nth-child(odd) {
            background-color: #f8f9fa;
        }

        .table tbody tr td:first-child {
            font-weight: bold;
        }
    </style>
@endsection

@section('breadcrumb-title')
    <h3>{{ $role }} Dashboard</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ ucfirst($role) }}</li>
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Create</li>
    <li class="breadcrumb-item active">Expense</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h5>Create budget plan for this year</h5>
                </div>
                <div class="card-body">

                z
                    {{-- <form action="{{ route('budget-plan.store') }}" method="post" class="needs-validation" novalidate>
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="department_id" class="form-label">Department</label>
                                <select class="form-select" id="department_id" name="department_id" required>
                                    <option value="">-- Select Department --</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a department.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="budget_period" class="form-label">Budget Period</label>
                                <select class="form-select" id="budget_period" name="budget_period" required>
                                    <option value="q1">Q1 - First Quarter</option>
                                    <option value="q2">Q2 - Second Quarter</option>
                                    <option value="q3">Q3 - Third Quarter</option>
                                    <option value="q4">Q4 - Fourth Quarter</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a budget period.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <h5 class="mb-3">Budget Items</h5>
                                <div id="budget-plans-container" class="row">

                                </div>

                                <button type="button" class="btn btn-primary mb-3" id="add-budget-plan-item">
                                    <i class="fas fa-plus-circle"></i> Add Budget Item
                                </button>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Create Budget Plan</button>
                    </form> --}}


                    {{-- <form action="{{ route('budget-plan.store') }}" method="post">
                        @csrf
                        <div class="table table-responsive" style="border-none">

                        </div>
                        <table class="table table-responsive" style="border:none;">
                            <thead>
                                <tr>
                                    <th scope="col">Quarter</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Amout</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="q1">
                                    <tr>
                                        <td style="border:none;">
                                            <select class="form-control" id="budget_period" name="budget_periods" required>
                                                <option value="Q1">Q1 - First Quarter</option>
                                                <option value="Q2">Q2 - Second Quarter</option>
                                                <option value="Q3">Q3 - Third Quarter</option>
                                                <option value="Q4">Q4 - Fourth Quarter</option>
                                            </select>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row" style="border:none;"></th>
                                        <td>Admin</td>
                                        <input value="Q1" name="department_id" hidden value="2">
                                        <td class="mx-2"><input class="form-control" id="validationDefault01"
                                                name="amount" placeholder="amount" required="" type="number"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="border:none;"></th>
                                        <td>Logistics</td>
                                        <input value="Q1" name="department_id" hidden value="3">
                                        <td class="mx-2"><input class="form-control" id="validationDefault01"
                                                name="amount" placeholder="amount" required="" type="number"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="border:none;"></th>
                                        <td>Finance</td>
                                        <input value="Q1" name="department_id" hidden value="4">
                                        <td class="mx-2"><input class="form-control" id="validationDefault01"
                                                name="amount" placeholder="amount" required="" type="number"></td>
                                    </tr>
                                </div>
                            </tbody>
                        </table>
                        <button class="btn btn-primary" type="submit">Create</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
        // Function to add a new budget plan item
        // Function to add a new budget plan item
        function addBudgetPlanItem() {
            const container = document.getElementById('budget-plans-container');

            // Create elements for the new item
            const itemRow = document.createElement('div');
            itemRow.classList.add('row', 'mb-3');

            const itemDescription = document.createElement('div');
            itemDescription.classList.add('col-md-6');

            const itemAmount = document.createElement('div');
            itemAmount.classList.add('col-md-5');

            const itemRemove = document.createElement('div');
            itemRemove.classList.add('col-md-1');

            // Create labels and inputs
            const descriptionLabel = document.createElement('label');
            descriptionLabel.classList.add('form-label');
            descriptionLabel.textContent = 'Description';

            const descriptionInput = document.createElement('input');
            descriptionInput.classList.add('form-control');
            descriptionInput.type = 'text';
            descriptionInput.name = 'descriptions[]';
            descriptionInput.required = true;

            const amountLabel = document.createElement('label');
            amountLabel.classList.add('form-label');
            amountLabel.textContent = 'Amount';

            const amountInput = document.createElement('input');
            amountInput.classList.add('form-control');
            amountInput.type = 'number';
            amountInput.name = 'amounts[]';
            amountInput.step = 0.01; // Allows decimal values
            amountInput.required = true;

            const removeButton = document.createElement('button');
            removeButton.classList.add('btn', 'btn-danger');
            removeButton.textContent = 'Remove';

            // Add elements to their respective parents
            itemDescription.appendChild(descriptionLabel);
            itemDescription.appendChild(descriptionInput);

            itemAmount.appendChild(amountLabel);
            itemAmount.appendChild(amountInput);

            itemRemove.appendChild(removeButton);

            itemRow.appendChild(itemDescription);
            itemRow.appendChild(itemAmount);
            itemRow.appendChild(itemRemove);

            // Add event listener to remove button
            removeButton.addEventListener('click', () => {
                itemRow.remove();
            });

            // Add the new item to the container
            container.appendChild(itemRow);
        }

        // Add initial item (optional)
        addBudgetPlanItem();

        // Add event listener to the "Add Budget Item" button
        document.getElementById('add-budget-plan-item').addEventListener('click', addBudgetPlanItem);
    </script>
@endsection

@section('script')
    <!-- Validation JS -->
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    <!-- Datepicker JS -->
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>

@endsection
