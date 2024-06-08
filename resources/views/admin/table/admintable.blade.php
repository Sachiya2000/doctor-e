@extends("admin.table.dashboard")

@section("table")
<div class="block margin-bottom-sm">
    <div class="title"><strong>Client Table</strong></div>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile No</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $key =>$user )


          <tr>
            <th scope="row">{{++$key}}</th>
            <td><img src="{{asset($user->profile_picture)}}" style="width: 50px; height: 50px; border-radius: 50%" alt=""></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->created_at}}</td>
            <td>
                <td>
                    <a href="{{route('user.edit',$user->id)}}">


                        <i class="bi bi-pencil" style="color: green"></i></a>
                    |
                    <a href="{{route('user.delete',$user->id)}}"  onclick="confirmDelete({{ $user->id }})"><i class="bi bi-trash3" style="color: red"></i></a>
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
