<div>
    <div class="d-flex vh-100 py-3">
        <div class="container p-4 d-flex  align-self-center justify-content-center" >
            <div class="row border rounded-4 shadow bg-white" style="max-height:500px;max-width:600px;">
                <img class="col-md-6 col-lg-6 p-0 rounded-start-4 d-none d-md-block" src="{{ asset('assets/page/dev.png') }}" alt="" style="object-fit:cover;height:500px;" >
                <div class="col-md-6 col-lg-6 p-3 py-5 align-self-center">
                    <div class="row">
                        <h3>
                            Sign in
                        </h3>
                    </div>
                    <div class="row">
                        <form wire:submit.prevent="login()">
                            <input class="form-control my-2" type="text" wire:model.defer="username" placeholder="Username / Email address">
                            <input class="form-control" type="password" wire:model.defer="password" placeholder="Enter Password">
                            <div class="d-grid gap-2 mt-2">
                                <button type="submit"class="btn btn-block btn-primary ">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <p class="text-reset mt-4"><a href="/forgot-password" wire:navigate class="text-dark">Forgot password</a></p>
                        <p class="text-reset mt-2">Don't have an account? <a href="/register-email" wire:navigate class="text-dark">Register using Email</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>