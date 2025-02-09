@extends('admin.forms.dashboard')

@section("forms")
<!-- Horizontal Form-->
<div class="col-12">
    <div class="block">
        <div class="title"><strong class="d-block">Add New Services</strong><span class="d-block">You can add new doctors</span></div>
        <div class="block-body">
            <form class="form-horizontal" action="{{route('save.service')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="title">Service Name</label>
                    <div class="col-sm-9">
                        <input id="title" name="title" type="text" placeholder="Service Name" class="form-control form-control-success">
                        @error('title')


                        <div id="dateHelp" class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="description">Description</label>
                    <div class="col-sm-9">
                        <input id="description" name="description" type="text" placeholder="Description" class="form-control form-control-success">
                        @error('description')


                                    <div id="dateHelp" class="form-text text-danger">{{$message}}</div>
                                    @enderror
                    </div>
                </div>



                <div class="form-group row">
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
                        <input type="submit" value="Add Services" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="title"><strong>Services Table</strong></div>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Services Name</th>
            <th>Description</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($services as $key =>$service )


            <tr>
              <th scope="row">{{++$key}}</th>
              <td><img src="{{asset($service->image)}}" style="width: 70px; height: 70px; " alt=""></td>
              <td>{{$service->title}}</td>
              <td>{{$service->description}}</td>

              <td>{{$service->created_at}}</td>
              <td>
                  <td>
                      <a href="{{route('edit.service',$service->id)}}">


                          <i class="bi bi-pencil" style="color: green"></i></a>
                      |
                      <a href="{{route('delete.service',$service->id)}}"  onclick="confirmDelete({{ $service->id }})"><i class="bi bi-trash3" style="color: red"></i></a>
                  </td>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
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
