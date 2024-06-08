@extends('admin.forms.dashboard')

@section("forms")
<!-- Horizontal Form-->
<div class="col-12">
    <div class="block">
        <div class="title"><strong class="d-block">Add New Services</strong><span class="d-block">You can add new doctors</span></div>
        <div class="block-body">
            <form class="form-horizontal" action="{{route('update.service',$service->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="title">Service Name</label>
                    <div class="col-sm-9">
                        <input id="title" name="title" type="text" value="{{$service->title}}" placeholder="Service Name" class="form-control form-control-success">
                        @error('title')


                        <div id="dateHelp" class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="description">Description</label>
                    <div class="col-sm-9">
                        <input id="description" name="description" value="{{$service->description}}" type="text" placeholder="Description" class="form-control form-control-success">
                        @error('description')


                                    <div id="dateHelp" class="form-text text-danger">{{$message}}</div>
                                    @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <img src="{{asset($service->image)}}" width="70px" alt="">
                    <label for="image" class="col-sm-3 form-control-label">Services Picture:</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    @error('image')


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


  <script>
    function confirmDelete(userId) {
        if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
            document.getElementById('delete-form-' + userId).submit();
        }
    }
</script>
@endsection
