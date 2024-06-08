@extends('admin.forms.dashboard')

@section("forms")
<!-- Horizontal Form-->
<div class="col-12">
    <div class="block">
        <div class="title">
            <strong class="d-block">Admin update Form</strong>
            <span class="d-block">You can update user details  </span>
        </div>
        <div class="block-body">
            <form class="form-horizontal" action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf


                <!-- Name Input -->
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="name"> Name</label>
                    <div class="col-sm-9">
                        <input id="name" name="name" value="{{ $user->name }}" type="text" placeholder="e.g., S.S. Kumara" class="form-control form-control-success">
                        @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Email Input -->
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="email">Email</label>
                    <div class="col-sm-9">
                        <input id="email" name="email" value="{{ $user->email }}" type="email" placeholder="Email Address" class="form-control form-control-success">
                        @error('email')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Phone Input -->
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="phone">Mobile No</label>
                    <div class="col-sm-9">
                        <input id="phone" name="phone" value="{{ $user->phone }}" type="text" placeholder="+94773904455" class="form-control form-control-success">
                        @error('phone')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>




                <!-- Profile Picture Upload -->
                <div class="form-group row">
                    <label for="profile_picture" class="col-sm-3 form-control-label">Profile Picture</label>
                    <div class="col-sm-9">
                        <img src="{{ asset($user->profile_picture) }}" class="img-fluid" style="width: 60px; height: 60px; border-radius: 50%;" alt="Profile Picture">
                        <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                        @error('profile_picture')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <input type="submit" value="Update Doctor" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
