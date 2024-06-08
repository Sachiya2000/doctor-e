<!DOCTYPE html>
<html>
<head>
    <title>Appointments PDF</title>

    <style>
        table {

            width: 100%;
            border-collapse: collapse;

        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Appointments</h2>
    <table>
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
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

</body>
</html>
