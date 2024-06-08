@extends('admin.forms.dashboard')

@section("forms")
<!-- Horizontal Form-->
<div class="col-12">
    <div class="block">
        <div class="title">
            <strong class="d-block">Doctors Add Form</strong>
            <span class="d-block">You can add new doctors</span>
        </div>
        <div class="block-body">
            <form class="form-horizontal" action="{{ route('doctor.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf


                <!-- Name Input -->
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="name">Initial Name</label>
                    <div class="col-sm-9">
                        <input id="name" name="name" value="{{ old('name', $doctor->name) }}" type="text" placeholder="e.g., S.S. Kumara" class="form-control form-control-success">
                        @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Email Input -->
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="email">Email</label>
                    <div class="col-sm-9">
                        <input id="email" name="email" value="{{ old('email', $doctor->email) }}" type="email" placeholder="Email Address" class="form-control form-control-success">
                        @error('email')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Phone Input -->
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="phone">Mobile No</label>
                    <div class="col-sm-9">
                        <input id="phone" name="phone" value="{{ old('phone', $doctor->phone) }}" type="text" placeholder="+94773904455" class="form-control form-control-success">
                        @error('phone')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Specialization Dropdown -->
                <div class="form-group row">
                    <label for="specialization" class="col-sm-3 form-control-label">Specialization</label>
                    <div class="col-sm-9">
                        <select class="form-select form-control form-control-success" id="specialization" name="specialization" required>
                            <option value="" disabled>Select Specialization</option>
                            @foreach(['Cardiology', 'Dermatology', 'Neurology', 'Pediatrics', 'Orthopedic', 'Psychiatry', 'Ophthalmology'] as $specialization)
                                <option value="{{ $specialization }}" {{ old('specialization', $doctor->specialization) == $specialization ? 'selected' : '' }}>{{ $specialization }}</option>
                            @endforeach
                        </select>
                        @error('specialization')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Description Input -->
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="description">Description</label>
                    <div class="col-sm-9">
                        <input id="description" name="description" value="{{ old('description', $doctor->description) }}" type="text" placeholder="Simple description for you" class="form-control form-control-warning">
                        @error('description')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Profile Picture Upload -->
                <div class="form-group row">
                    <label for="profile_picture" class="col-sm-3 form-control-label">Profile Picture</label>
                    <div class="col-sm-9">
                        <img src="{{ asset($doctor->profile_picture) }}" class="img-fluid" style="width: 60px; height: 60px; border-radius: 50%;" alt="Profile Picture">
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
