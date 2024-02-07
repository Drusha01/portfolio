<div>
    @if($mode == 0)
        <style>
        
            input::placeholder {
                color: white !important;
            }
        </style>
      @endif
    <div class="row" style="margin:0px 0px 0px 0px; padding:0px;">
        <div class="col p-0 border-end @if($mode) border-dark @else @endif" id="sidebar" style="@if($mode == 1)background-color:white;color:black; @else background-color:#232323;color:white; @endif height:calc(100vh - 70px);max-width:280px;">
            @livewire('components.sidebar.admin-sidebar.admin-sidebar')
        </div>
        <div class="col" style="@if($mode == 1) background-color:white;color:black; @else background-color:#242424;color:white; @endif">
            <div class="d-flex justify-content-between">
                <div class=" lead pt-4 px-4">
                    Profile 
                </div>
            </div>
            <div class="row px-3 pt-2">
                <div class="col-6">
                    <div class="row p-2">
                        <ul class="list-group" id="applicantDetailsList">
                            <li class="list-group-item @if($mode == 0) text-light bg-dark @else text-dark bg-light @endif"><strong>First name: </strong>{{$user_details['user_firstname']}}</li>
                            <li class="list-group-item @if($mode == 0) text-light bg-dark @else text-dark bg-light @endif"><strong>Middle name: </strong> {{$user_details['user_middlename']}}</li>
                            <li class="list-group-item @if($mode == 0) text-light bg-dark @else text-dark bg-light @endif"><strong>Last name: </strong> {{$user_details['user_lastname']}}</li>
                            <li class="list-group-item @if($mode == 0) text-light bg-dark @else text-dark bg-light @endif"><strong>Suffix: </strong> {{$user_details['user_suffix']}}</li>
                            <li class="list-group-item @if($mode == 0) text-light bg-dark @else text-dark bg-light @endif"><strong>Gender: </strong> {{$user_details['user_gender_details']}}</li>
                            <li class="list-group-item @if($mode == 0) text-light bg-dark @else text-dark bg-light @endif"><strong>Age: </strong> {{floor((time() - strtotime($user_details['user_birthdate'])) / 31556926);}}</li>
                            <li class="list-group-item @if($mode == 0) text-light bg-dark @else text-dark bg-light @endif"><strong>Phone number: </strong> {{$user_details['user_phone']}}</li>
                            <li class="list-group-item @if($mode == 0) text-light bg-dark @else text-dark bg-light @endif"><strong>Email: </strong> {{$user_details['user_email']}} @if($user_details['user_email_verified']==1)<a href="../change-email">change</a>@else<a href="../change-email">verify</a>@endif</li>
                            <li class="list-group-item @if($mode == 0) text-light bg-dark @else text-dark bg-light @endif"><strong>Birthdate: </strong> {{date_format(date_create($user_details['user_birthdate']),"F d, Y ")}}</li>
                            <li class="list-group-item @if($mode == 0) text-light bg-dark @else text-dark bg-light @endif"><strong>Account Created: </strong> {{date_format(date_create( $user_details['date_created']),"F d, Y ")}}</li>
                        </ul>
                    </div>
                    <button class="btn btn-primary btn-block m-0"  data-bs-toggle="modal" data-bs-target="#modifyModalDetails">
                        Modify
                    </button>
                </div>
                <div class="col-6 ">
                    <div class="row text-center">
                        <a target="blank"href="{{asset('storage/images/original/'.$user_details['user_profile_picture'])}}">
                            <div class="img">
                                <img src="{{asset('storage/images/original/'.$user_details['user_profile_picture'])}}" alt="Hanrickson E. Dumapit , Drusha Corp " class="object-fit-cover" width="400px" height="400px">
                            </div>
                        </a>
                    </div>
                    <div class="d-flex justify-content-center p-3">
                        <button class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#modifyModal">
                            Modify
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modifyModalDetails" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabelDetails" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog " role="document">
                    <div class="modal-content @if($mode == 0 ) bg-dark @endif">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modifyModalLabelDetails">Modify Profile Details</h5>
                            <div type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </div>
                        </div>
                        <div class="modal-body">
                            <fieldset>
                                <!-- Full Name -->
                                <form wire:submit.prevent="save_profile_info()" class="">
                                    <div class="form-group row mb-2">
                                        <label  class="col-sm-4 col-form-label">First name<span style="color:red;">*</span> :</label>
                                        <div class="col-sm-8">
                                        <input type="text"  wire:model="user_details.user_firstname" class="form-control" placeholder="Enter firstname" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-sm-4 col-form-label">Middle name<span style="color:red;"></span> :</label>
                                        <div class="col-sm-8">
                                        <input type="text"  wire:model="user_details.user_middlename" class="form-control" placeholder="Enter middlename" >
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-sm-4 col-form-label">Last name<span style="color:red;">*</span> :</label>
                                        <div class="col-sm-8">
                                        <input type="text"  wire:model="user_details.user_lastname" class="form-control" placeholder="Enter lastname" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-sm-4 col-form-label">Suffix<span style="color:red;"></span> :</label>
                                        <div class="col-sm-8">
                                            <select wire:model="user_details.user_suffix" class="form-control">
                                            @if(isset($user_details->user_suffix) && strlen($user_details->user_suffix>0))
                                                    <option value="$user_details->user_suffix">
                                                @else
                                                <option value="">Select suffix</option>
                                                @endif
                                                
                                                <option value="Jr.">Jr.</option>
                                                <option value="Sr.">Sr.</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <!-- Add more suffix options as needed -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">
                                        <label class="col-sm-4 col-form-label">Gender<span style="color:red;">*</span>:</label>
                                        <div class="col-sm-8">
                                            <select wire:model="user_details.user_gender_details" class="form-control">
                                                @if(isset($user_details->user_gender_details) && strlen($user_details->user_gender_details>0))
                                                    <option value="$user_details->user_gender_details">
                                                @else
                                                    <option value="">Select gender</option>
                                                @endif
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-sm-4 col-form-label">Phone number<span style="color:red;"></span> :</label>
                                        <div class="col-sm-8">
                                        <input type="text"  required wire:model="user_details.user_phone" class="form-control" placeholder="Enter phone number"  oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11);">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-sm-4 col-form-label">Birthdate<span style="color:red;">*</span> :</label>
                                        <div class="col-sm-8">
                                        <input type="date"  wire:model="user_details.user_birthdate" class="form-control" placeholder="Enter birthdate" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modifyModalLabel">Account Settings</h5>
                            <div type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </div>
                        </div>
                        <div class="modal-body">
                            <!-- Tab navigation for different settings -->
                            <ul class="nav nav-tabs" id="accountSettingsTabs" role="tablist">
                                <li class="nav-item">
                                    <a wire:ignore.self class="nav-link active"  role="tab" aria-controls="modify" data-bs-toggle="tab" data-bs-target="#modify" aria-selected="true" >Modify Info</a>
                                </li>
                                <li class="nav-item">
                                    <a wire:ignore.self class="nav-link " role="tab" aria-controls="changePassword" data-bs-toggle="tab" data-bs-target="#changePassword" aria-selected="false" >Change Password</a>
                                </li>
                            </ul>


                            <!-- Tab content -->
                            <div class="tab-content" id="accountSettingsTabContent">
                                <!-- Modify Info Tab -->
                                <div class="tab-pane fade show active" wire:ignore.self id="modify" role="tabpanel" aria-labelledby="modify" >
                                    <!-- Form to modify username and profile image -->
                                    <form wire:submit.prevent="save_photo()">
                                        <div class="form-group mt-4">
                                            <label class="fas" for="newProfileImage ">Change profile picture:</label>
                                            <input type="file" class="form-control" wire:model.defer="photo" required  accept="image/png, image/jpeg">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                        <!-- Add more fields to modify user details as needed -->
                                    </form>
                                </div>

                                <!-- Change Password Tab -->
                                <div class="tab-pane fade" wire:ignore.self id="changePassword" role="tabpanel" aria-labelledby="changePassword-tab">
                                    <!-- Form to change password -->
                                    <form wire:submit.prevent="change_password()">
                                        <div class="form-group row mt-2">
                                            <label for="newFullName" class="col-sm-4 col-form-label">Current Password<span style="color:red;">*</span> :</label>
                                            <div class="col-sm-8">
                                                <input type="password"  wire:model.defer="current_password"  class="form-control" placeholder="Current Password" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label for="newFullName" class="col-sm-4 col-form-label">New Password<span style="color:red;">*</span> :</label>
                                            <div class="col-sm-8">
                                                <input type="password"  wire:model.defer="new_password"  class="form-control" placeholder="New Password" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label for="newFullName" class="col-sm-4 col-form-label">Confirm Password<span style="color:red;">*</span> :</label>
                                            <div class="col-sm-8">
                                                <input type="password"  wire:model.defer="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                            </div>
                                        </div>
                                        <div>
                                        @if(isset($password_error)) <span class="error" style="color:red;">{{ $password_error }}</span> @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @persist('back-to-top')
        <button type="button" class="btn btn-floating btn-md" id="btn-back-to-top" style="background-color:#0174BE;color:white;position: fixed;bottom: 20px;right: 20px;display: none;"><strong><i class="bi bi-chevron-up fs-5"></i></strong></button>
        <script>
            let mybutton = document.getElementById("btn-back-to-top");
            window.onscroll = function () {
            scrollFunction();
            };

            function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
            }
            mybutton.addEventListener("click", backToTop);

            function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            }
        </script>
    @endpersist
</div>
