<div>
    <div class="d-flex vh-100 py-3">
        <div class="container p-4 d-flex  align-self-center justify-content-center" >
            <div class="row border rounded-4 shadow bg-white" >
                <img class="col-md-6 p-0 rounded-start-4 d-none d-md-block" src="{{ asset('assets/page/dev.png') }}" alt="" style="object-fit:cover;max-height:600px;height:inherit;" >
                <div class="col-md-6 p-3 py-5 align-self-center">
                    <div class="row">
                        <h3>
                            Sign up
                        </h3>
                    </div>
                    <div class="row">
                        @if(!$sign_up)
                            @if($email_send)
                                <form wire:submit.prevent="send_verification_code()" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email"  wire:model="email" class="form-control my-2" placeholder="Enter your email" required>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit"class="btn btn-block btn-primary ">Send Verification Code</button>
                                    </div>
                                </form>
                            @else
                                <form wire:submit.prevent="verify_code()" >
                                    @csrf
                                    <div class="form-group">    
                                        <input type="hidden"wire:model="email" class="form-control my-2" placeholder="Enter your email" required>
                                        <label for="code" class="form-label">Code</label>
                                        <input type="number"  wire:model="code" class="form-control my-2" placeholder="Enter code" min="100000" max="999999" required>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit"class="btn btn-block btn-primary ">Verify</button>
                                    </div>
                                    
                                </form>
                            @endif
                        @else
                            <div class="">
                                <form wire:submit.prevent="sign_up_user()">
                                    <div class="row ">
                                        <div class="col-md-6 ">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" wire:model="firstname" required>
                                        </div>
                                        <div class="col-md-6 ">
                                            <label for="middleName" class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" wire:model="middlename">
                                        </div>
                                        <div class="col-md-12 ">
                                            <label for="lastName" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" wire:model="lastname" required>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" min="8" wire:model="password"  wire:keyup="verify_password()"required>
                                        </div>
                                        <div class="col-md-12 ">
                                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" min="8" wire:model="confirm_password"  wire:keyup="verify_confirm_password()"required>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-6 ">
                                            <label for="firstName" class="form-label">Username</label>
                                            <input type="text" style="{{$style}}"class="form-control"  wire:model="username" wire:keyup="verify_username()" required>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="birthDate" class="form-label">Birthdate</label>
                                            <input type="date" class="form-control" wire:model="birthdate"  wire:change="verify_birthdate()"required>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-block btn-primary ">{{$sign_up_button}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                    @if(!$sign_up)
                    <div class="row">
                        <p class="text-reset mt-4"><a href="//forgot-password" wire:navigate class="text-dark">Forgot password</a></p>
                        <p class="text-reset mt-2">Have an account? <a href="/login" wire:navigate class="text-dark">Login</a></p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

