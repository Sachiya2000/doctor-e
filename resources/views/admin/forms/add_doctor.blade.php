@extends('admin.forms.dashboard')

@section("forms")
<!-- Horizontal Form-->
<div class="col-12">
    <div class="block">
        <div class="title"><strong class="d-block">Doctors Add Form</strong><span class="d-block">You can add new doctors</span></div>
        <div class="block-body">
            <form class="form-horizontal" action="doctor/save" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="name">Initial Name</label>
                    <div class="col-sm-9">
                        <input id="name" name="name" type="text" placeholder="eg: S.S. Kumara" class="form-control form-control-success">
                        @error('name')


                        <div id="dateHelp" class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="email">Email</label>
                    <div class="col-sm-9">
                        <input id="email" name="email" type="email" placeholder="Email Address" class="form-control form-control-success">
                        @error('email')


                                    <div id="dateHelp" class="form-text text-danger">{{$message}}</div>
                                    @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="phone">Mobile No</label>
                    <div class="col-sm-9">
                        <input id="phone" name="phone" type="text" placeholder="+94773904455" class="form-control form-control-success">
                        @error('phone')


                        <div id="dateHelp" class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="specialization" class="col-sm-3 form-control-label">Specialization:</label>
                    <div class="col-sm-9">
                        <select class="form-select form-control form-control-success" id="specialization" name="specialization" required>
                            <option value="" disabled selected>Select Specialization</option>
                            <option value="Cardiology">Cardiology</option>
                            <option value="Dermatology">Dermatology</option>
                            <option value="Neurology">Neurology</option>
                            <option value="Pediatrics">Pediatrics</option>
                            <option value="Orthopedic">Orthopedic</option>
                            <option value="Psychiatry">Psychiatry</option>
                            <option value="Ophthalmology">Ophthalmology</option>
                        </select>
                    </div>
                    @error('specialization')


                    <div id="dateHelp" class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="description">Description</label>
                    <div class="col-sm-9">
                        <input id="description" name="description" type="text" placeholder="simple description for you" class="form-control form-control-warning">
                        @error('description')


                        <div id="dateHelp" class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="profile_picture" class="col-sm-3 form-control-label">Profile Picture:</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                    </div>
                    @error('profile_picture')


                    <div id="dateHelp" class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <input type="submit" value="Add Doctor" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
