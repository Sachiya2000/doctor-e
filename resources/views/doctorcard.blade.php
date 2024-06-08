@extends('dashboard')

@section('cards')
<div class="container">
    <!-- Specialization Filter Dropdown -->
    <div class="row mb-4">
        <div class="col-12 col-md-6">
            <select id="specialization-filter" class="form-select">
                <option value="">All Specializations</option>
                @foreach ($specializations as $specialization)
                    <option value="{{ $specialization->specialization }}" {{ request('specialization') == $specialization->specialization ? 'selected' : '' }}>
                        {{ $specialization->specialization }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row justify-content-center align-items-center">
        @foreach ($doctors as $doctor)
        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <div class="animate__animated animate__bounce card" style="width: 100%;">
                <div class="container mt-3">
                    <img src="{{ asset($doctor->profile_picture) }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title ms-1">Name: Dr {{ $doctor->name }}</h5>
                    <h6>Specialization: {{ $doctor->specialization }}</h6>
                    <p class="card-text mb-5 ms-1">{{ $doctor->description }}</p>
                    <a href="{{ route('appointments.create', $doctor->id) }}" target="_blank" class="btn btn-primary mt-1">Channel Now</a>


                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@push('style')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap');

    .card {
        border-radius: 40px;
        overflow: hidden;
        border: 0;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06), 0 2px 4px rgba(0, 0, 0, 0.07);
        transition: all 0.15s ease;
    }

    .card:hover {
        box-shadow: 0 6px 30px rgba(0, 0, 0, 0.1), 0 10px 8px rgba(0, 0, 0, 0.015);
    }

    .card-body .card-title {
        font-family: 'Lato', sans-serif;
        font-weight: 700;
        letter-spacing: 0.3px;
        font-size: 24px;
        color: #121212;
    }

    .card-text {
        font-family: 'Lato', sans-serif;
        font-weight: 400;
        font-size: 15px;
        letter-spacing: 0.3px;
        color: #4E4E4E;
    }
    .card-text h6{
        color: #F0EEF8;
    }

    .card .container {
        width: 88%;
        background: #F0EEF8;
        border-radius: 30px;
        height: 140px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container:hover > img {
        transform: scale(1.2);
    }

    .container img {
        padding: 75px;
        margin-top: -40px;
        margin-bottom: -40px;
        transition: 0.4s ease;
        cursor: pointer;
    }

    .btn {
        background: #EEECF7;
        border: 0;
        color: #5535F0;
        width: 98%;
        font-weight: bold;
        border-radius: 20px;
        height: 40px;
        transition: all 0.2s ease;
    }

    .btn:hover {
        background: #441CFF;
    }

    .btn:focus {
        background: #441CFF;
        outline: 0;
    }
</style>
@endpush

@push('scripts')
<script>
    document.getElementById('specialization-filter').addEventListener('change', function () {
        const specialization = this.value;
        const urlParams = new URLSearchParams(window.location.search);

        if (specialization) {
            urlParams.set('specialization', specialization);
        } else {
            urlParams.delete('specialization');
        }

        window.location.search = urlParams.toString();
    });


    function toggleAppointmentForm(doctorId) {
        const form = document.getElementById('appointmentform_' + doctorId);
        form.classList.toggle('d-none');
    }


</script>
@endpush
