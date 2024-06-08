@extends("admin.table.dashboard")


@section("table")
<div class="block margin-bottom-sm">
    <div class="title"><strong>Doctor Table</strong></div>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Profile Pic </th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>specialization</th>
            <th>descriptione</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($doctors as $key => $doctor)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td><img src="{{ asset($doctor->profile_picture) }}" class="img-fluid" style="width: 40px; height: 40px; border-radius: 50%;" alt="Profile Picture">
            </td>
            <td>{{$doctor->name}}</td>
            <td>{{$doctor->email}}</td>
            <td>{{$doctor->phone}}</td>
            <td>{{$doctor->specialization}}</td>
            <td>{{$doctor->description}}</td>
            <td>
                <a href="{{route('doctor.edit',$doctor->id)}}"><i class="bi bi-pencil" style="color: green"></i></a>
                |
                <a href="{{route('doctor.delete',$doctor->id)}}" onclick="confirmDelete({{ $doctor->id }})"><i class="bi bi-trash3" style="color: red"></i></a>
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
