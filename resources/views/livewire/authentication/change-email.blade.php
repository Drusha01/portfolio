
<div>
    <div class="d-flex vh-100 py-3">
        <div class="container p-4 d-flex  align-self-center justify-content-center" >
            <div class="row border rounded-4 shadow bg-white" style="max-height:500px;max-width:600px;">
                <img class="col-md-6 col-lg-6 p-0 rounded-start-4 d-none d-md-block" src="{{ asset('assets/page/dev.png') }}" alt="" style="object-fit:cover;height:500px;" >
                <div class="col-md-6 col-lg-6 p-3 py-5 align-self-center">
                    <div class="row">
                        <h3>
                            Change Email
                        </h3>
                    </div>
                    <div class="row">
                        @if(!$valid)
                            <form wire:submit.prevent="change_email()">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email"  wire:model="user_details.user_email" class="form-control" placeholder="Enter your email" required>
                                </div>
                              
                                <button type="submit" class="btn btn-primary my-2 " >@if($user_details['user_email_verified']) Change Email @else Verify @endif</button>
                                <br>
                                <a wire:navigate href="{{ route('admin.admin-profile') }}" class="m-0 p-0">Back to Profile</a>
                            </form>
                        @else
                            <form wire:submit.prevent="verify_code()">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="number"  wire:model="user_details.user_code" class="form-control" placeholder="Enter code" required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary my-2  " >@if($valid) Verify @endif</button>
                                <br>
                                <a wire:navigate href="{{ route('admin.admin-profile') }}" class="m-0 p-0">Back to Profile</a>
                            </form>
                        @endif
                    </div>
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
