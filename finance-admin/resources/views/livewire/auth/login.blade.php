<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="page-body-wrapper">
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-6 left d-none d-md-block d-sm-none text-white">
                    <div>
                        <img src="{{ asset('assets/images/logo/logo1.png') }}" alt="" id="logo">
                        <h1>Rkive</h1>
                        <h4 class="d-lg-none">Administrative Solutions</h4>
                        <p>Your administrative needs in one place</p>
                    </div>
                </div>


                <div class="col p-0 right">
                    <div class="login-card">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="text-center mb-4">Login</h2>
                                <hr>
                                <x-alert />
                                <form wire:submit.prevent='store'>
                                    @csrf
                                    <div class="row g-2">
                                        <div class="col-md-12">
                                            <x-input-text label="Username" name="username or email"
                                                wire:model="usernameOrEmail" />
                                        </div>
                                        <div class="col-md-12">
                                            <x-input-password label="Password" name="password" wire:model="password" />
                                        </div>
                                    </div>
                                    <div class="mb-2 d-flex justify-content-between align-items-center">
                                        <x-input-checkbox label="Remember me" name="remember" wire:model="remember" />

                                    </div>
                                    <x-button type="submit" class="w-100 btn-outline-primary" name="Login" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
