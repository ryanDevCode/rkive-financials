<div>
    <div class="modal show" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reset an account</h5>
                </div>
                <div class="modal-body p-3">
                    <form wire:submit.prevent='store'>
                        @csrf
                        <div class="row g-3">
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
                        <x-button type="submit" class="w-100 btn-outline-primary" name="Reset" />
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
