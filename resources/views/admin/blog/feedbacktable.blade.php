@extends('admin.forms.dashboard')

@section("forms")

<div class="title"><strong>Feedback Table</strong></div>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Client_id</th>
            <th>Image</th>
            <th>Client Name</th>
            <th>Feedback</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $key =>$feedback )


            <tr>
              <th scope="row">{{++$key}}</th>
              <td><img src="{{asset($feedback->user->profile_picture)}}" style="width: 70px; height: 70px; " alt=""></td>
              <td>{{$feedback->user->id}}</td>
              <td>{{$feedback->user->name}}</td>

              <td>{{$feedback->feedback}}</td>
              <td>
                  <td>
                    <a href="{{ route('edit.feedback', $feedback->id) }}">
                        <i class="bi bi-pencil" style="color: green"></i></a>
                    |
                    <a href="#" onclick="confirmDelete({{ $feedback->id }})">
                        <i class="bi bi-trash3" style="color: red"></i></a>
                    <form id="delete-form-{{ $feedback->id }}" action="{{ route('delete.feedback', $feedback->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
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
