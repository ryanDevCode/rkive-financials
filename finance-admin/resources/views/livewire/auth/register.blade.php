<div>
    <div class="modal show" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register an account</h5>
                </div>
                <div class="modal-body p-3">
                    <form wire:submit.prevent='store'>
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                {{-- @php

                                    if ($user) {
                                        $profilePictureUrl = Storage::url($user->profile);

                                        // Display the image in your view
                                        echo '<img src="' . $profilePictureUrl . '" alt="Profile Picture">';
                                    }
                                @endphp --}}
                            </div>
                            <div class="col-md-12">
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
                                    valueId="department_code" valueName="department_name" wire:model="department" />
                            </div>
                            <div class="col-md-6">
                                <x-select label="Role" name="role" :options="$roles" valueId="role_code"
                                    valueName="role_name" wire:model="role" />
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

                        </div>
                        <div class="mt-3 mb-3">
                            <x-input-checkbox label="Agree to terms
                                and conditions"
                                name="terms" wire:model="terms" />
                        </div>
                        <x-button type="submit" class="w-100 btn-outline-primary" name="Register" />
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
