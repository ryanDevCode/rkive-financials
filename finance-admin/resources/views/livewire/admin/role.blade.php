<div class="container-flurole_code">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-left mt-2">
                        <h5>Rkive Roles Record</h5>
                    </div>
                    <div class="card-header-right mb-2">
                        <x-button name="{{ $isOpen ? 'Create' : 'Close' }}"
                            class="w-100 {{ $isOpen ? 'btn-primary' : 'btn-secondary' }}"
                            wire:click="{{ $isOpen ? 'closeModal' : 'create' }}" />
                    </div>
                </div>
                @if ($isOpen)
                    <div class="card-body text-center" style="display: block;">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <input type="text" class="form-control" placeholder="Search..."
                                    wire:model.live="search">
                            </div>
                        </div>
                        @if ($roles->isEmpty())
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset('assets/images/svg/vorole_code.svg') }}"
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
                                                <th colspan="2">
                                                    <b>Roles</b>
                                                </th>
                                            <tr>
                                                <th class="sortable">Code</th>
                                                <th class="sortable">Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @foreach ($roles as $item)
                                            <tbody wire:key="{{ $item->role_code }}">
                                                <tr>
                                                    <td>{{ $item->role_code }}</td>
                                                    <td>{{ $item->role_name }}</td>
                                                    <td>
                                                        <ul class="action">
                                                            <li class="edit"> <a
                                                                    wire:click="edit({{ $item->id }})"><i
                                                                        class="icon-pencil-alt"></i></a>
                                                            </li>
                                                            <li class="delete"><a
                                                                    wire:click="delete({{ $item->id }})"><i
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
                        <form wire:submit.prevent="{{ $roleId ? 'update' : 'store' }}">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <x-input-text label="Code" name="role_code"
                                                wire:model="role_code" />
                                        </div>
                                        <div class="col-md-6">
                                            <x-input-text label="Name" name="role_name"
                                                wire:model="role_name" />
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
