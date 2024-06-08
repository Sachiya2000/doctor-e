@extends("admin.table.dashboard")

@section("table")
<div class="block margin-bottom-sm">
    <div class="title"><strong>Client Table</strong></div>

    <form method="GET" action="{{ route('doctor.appointments.filter') }}">
        <div class="form-group">
            <label for="month">Month:</label>
            <select name="month" id="month" class="form-control">
                @foreach(range(1, 12) as $month)
                    <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>
                        {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="year">Year:</label>
            <select name="year" id="year" class="form-control">
                @foreach(range(date('Y'), date('Y') - 10) as $year)
                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
        <a href="{{ route('doctor.appointments.filter.pdf', ['month' => request('month'), 'year' => request('year')]) }}" class="btn btn-secondary">Download PDF</a>
    </form>

    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Patient Name</th>
            <th>Email</th>
            <th>Mobile No</th>
            <th>A.Date</th>
            <th>Time</th>
            <th>Doctor Name</th>
            <th>Doctor Id</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $key => $appointment)
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $appointment->name }}</td>
                <td>{{ $appointment->email }}</td>
                <td>{{ $appointment->phone }}</td>
                <td>{{ $appointment->appointment_date }}</td>
                <td>{{ $appointment->appointment_time }}</td>
                <td>{{ $appointment->doctor->name }}</td>
                <td>{{ $appointment->doctor_id }}</td>
                <td>{{ $appointment->created_at }}</td>
                <td>
                    <a href="{{ route('user.edit', $appointment->id) }}">
                        <i class="bi bi-pencil" style="color: green"></i></a>
                    |
                    <a href="{{ route('.delete', $appointment->id) }}" onclick="confirmDelete({{ $appointment->id }})">
                        <i class="bi bi-trash3" style="color: red"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>

<script>
    function confirmDelete(appointmentId) {
        if (confirm('Are you sure you want to delete this appointment? This action cannot be undone.')) {
            document.getElementById('delete-form-' + appointmentId).submit();
        }
    }
</script>
@endsection
