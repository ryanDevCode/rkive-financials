<div class="modal show" tabindex="-1" role="dialog" style="display: block;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-3">
                <form wire:submit.prevent='block'>
                    <div class="text-center">
                        <i data-feather="lock" class="icon" style="width: 100px; height: 100px"></i>
                        <h2>Access Denied</h2>
                        <p>You don't have permission to access this page.</p>
                        <x-button type="submit" class="w-100 btn-outline-primary" name="Back to Dashboard" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
