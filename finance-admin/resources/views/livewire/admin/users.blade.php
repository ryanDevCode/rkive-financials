<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-left mt-2">
                        <h5>Rkive Users Record</h5>
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
                        @if ($users->isEmpty())
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset('assets/images/svg/void.svg') }}"
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
                                                <th colspan="7">
                                                    <b>Users</b>
                                                </th>
                                            <tr>
                                                <th class="sortable">Name</th>
                                                <th class="sortable">Email</th>
                                                <th class="sortable">Username</th>
                                                <th class="sortable">Password</th>
                                                <th class="sortable">Department</th>
                                                <th class="sortable">Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @foreach ($users as $item)
                                            <tbody wire:key="{{ $item->id }}">
                                                <tr>
                                                    <td><img src="{{ 'storage/' . $item->profile }}" alt=""
                                                            style="width: 30px; height: 30px" class="rounded-circle">
                                                    </td>
                                                    <td>{{ $item->first_name . ' ' . $item->last_name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->username }}</td>
                                                    <td>{{ $item->userpassword }}</td>
                                                    <td>{{ $item->department->department_name }}</td>
                                                    <td>{{ $item->role->role_name }}</td>
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
                        <form wire:submit.prevent="{{ $userId ? 'update' : 'store' }}">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            @if ($profile)
                                                <div class="text-center">
                                                    <strong>Uploaded File:</strong><br>
                                                    <img src="{{ $profile->temporaryUrl() }}" alt="Uploaded profile"
                                                        style="max-width: 100px;">
                                                </div>
                                            @endif
                                            <x-input-file label="Profile" name="profile" wire:model="profile" />
                                        </div>
                                        <div class="col-md-6">
                                            <x-input-text label="First Name" name="firstname" wire:model="firstname" />
                                        </div>
                                        <div class="col-md-6">
                                            <x-input-text label="Last Name" name="lastname" wire:model="lastname" />
                                        </div>
                                        <div class="col-md-6">
                                            <x-select label="Department" name="department" :options="$departments"
                                                valueId="department_code" valueName="department_name"
                                                wire:model="department" />
                                        </div>
                                        <div class="col-md-6">
                                            <x-select label="Role" name="role" :options="$roles"
                                                valueId="role_code" valueName="role_name" wire:model="role" />
                                        </div>
                                        <div class="col-md-12">
                                            <x-input-email label="Email" name="email" wire:model="email" />
                                        </div>
                                        <div class="col-md-12">
                                            <x-input-text label="Username" name="username" wire:model="username" />
                                        </div>
                                        <div class="col-md-12">
                                            <x-input-password label="Password" name="password" wire:model="password" />
                                        </div>
                                        <div class="col-md-12">
                                            <x-input-password label="Confirm Password" name="password_confirmation"
                                                wire:model="password_confirmation" />
                                        </div>
                                        <div class="col-md-6">
                                            <x-input-checkbox label="Agree to terms and conditions" name="terms"
                                                wire:model="terms" />
                                        </div>
                                        <div class="col-md-12">
                                            <x-button type="submit" class="w-100 btn-outline-primary"
                                                name="Save" />
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
