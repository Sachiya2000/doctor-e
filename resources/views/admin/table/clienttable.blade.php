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
                    <th>User Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td><img src="{{ asset($user->profile_picture) }}" style="width: 50px; height: 50px; border-radius: 50%;" alt="Profile Picture"></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <form action="{{ route('user.updateType', $user->id) }}" method="POST">
                            @csrf
                            <select name="usertype" class="form-control">
                                <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Change</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}">
                            <i class="bi bi-pencil" style="color: green"></i>
                        </a>
                        |
                        <a href="#" onclick="event.preventDefault(); confirmDelete({{ $user->id }});">
                            <i class="bi bi-trash3" style="color: red"></i>
                        </a>
                        <form id="delete-form-{{ $user->id }}" action="{{ route('user.delete', $user->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
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
