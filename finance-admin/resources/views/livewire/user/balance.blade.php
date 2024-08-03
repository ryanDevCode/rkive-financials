<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-left mt-2">
                        <h5>Rkive Balance Record</h5>
                    </div>
                    <div class="card-header-right mb-2">
                        <x-button name="{{ $isOpen ? 'Create' : 'Close' }}"
                            class="w-100 {{ $isOpen ? 'btn-primary' : 'btn-secondary' }}"
                            wire:click="{{ $isOpen ? 'closeModal' : 'create' }}" />
                    </div>
                </div>
                @if ($isOpen)
                    <div class="card-body text-center" style="display: block;">

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-3">
                                <input type="text" class="form-control" placeholder="Search..."
                                    wire:model.live="search">
                            </div>
                        </div>
                        @if ($balance->isEmpty())
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset('assets/images/void.svg') }}"
                                        style="min-height:200px; max-height:200px" alt=""><br> <br>
                                    <span>No Record Found</span>
                                </div>
                            </div>
                        @else
                            <div class="table-responsive">
                                <div class="table-container">
                                    <table class="table">
                                        <thead class="text-center">
                                            <tr>
                                                <th colspan="6">
                                                    <b>Balance</b>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="sortable">Info</th>
                                                <th class="sortable">Product</th>
                                                <th class="sortable">Revenue</th>
                                                <th class="sortable">Department</th>
                                                <th class="sortable">Category</th>
                                                <th class="sortable">Date</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @foreach ($balance as $item)
                                            <tbody wire:key="{{ $item->balance_code }}">
                                                <tr>
                                                    <td>{{ $item->balance_info }}</td>
                                                    <td>{{ $item->balance_name }}</td>
                                                    <td>{{ $item->balance_amount }}</td>
                                                    <td>
                                                        @foreach ($departments as $department)
                                                            @if ($department->department_code == $item->balance_department)
                                                                {{ $department->department_name }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($categories as $category)
                                                            @if ($category->plan_category_code == $item->balance_category)
                                                                {{ $category->plan_category_name }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $item->balance_date }}</td>
                                                    <td>
                                                        <ul class="action">
                                                            <li class="edit"> <a
                                                                    wire:click="edit({{ $item->balance_code }})"><i
                                                                        class="icon-pencil-alt"></i></a>
                                                            </li>
                                                            <li class="delete"><a
                                                                    wire:click="delete({{ $item->balance_code }})"><i
                                                                        class="icon-trash"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="card-body">
                        <form wire:submit.prevent="{{ $balanceId ? 'update' : 'store' }}">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <x-input-text label="Info" name="balance_info" wire:model="balance_info" />
                                        </div>
                                        <div class="col-md-4">
                                            <x-input-text label="Name" name="balance_name" wire:model="balance_name" />
                                        </div>
                                        <div class="col-md-4">
                                            <x-select label="Department" name="balance_department" :options="$departments"
                                                valueId="department_code" valueName="department_name"
                                                wire:model="balance_department" />
                                        </div>
                                        <div class="col-md-4">
                                            <x-select label="Category" name="balance_category" :options="$categories"
                                                valueId="plan_category_code" valueName="plan_category_name" optvalue="category_code"
                                                wire:model="balance_category" />
                                        </div>
                                        <div class="col-md-4">
                                            <x-input-number label="Amount" name="balance_amount" wire:model="balance_amount" />
                                        </div>
                                        <div class="col-md-4">
                                            <x-date label="Date" name="balance_date" wire:model="balance_date" />
                                        </div>

                                        <div class="col-md-6">
                                            <x-input-checkbox label="Agree to terms and conditions" name="terms"
                                                wire:model="terms" />
                                        </div>
                                        <div class="col-md-12">
                                            <x-button type="submit" class="w-100 btn-outline-primary" name="Save" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
