@extends('dashboard')

@section('cards')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Book Appointment') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('appointments.store') }}">
                        @csrf

                        <!-- Hidden Input for Doctor ID -->
                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">

                        <input type="hidden" name="patient_id" value="{{ Auth::id() }}">

                        <!-- Appointment Date -->
                        <div class="form-group">
                            <label for="appointment_date">{{ __('Appointment Date') }}</label>
                            <input id="appointment_date" type="date" class="form-control @error('appointment_date') is-invalid @enderror" name="appointment_date" required>
                            @error('appointment_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Appointment Time -->
                        <div class="form-group">
                            <label for="appointment_time">{{ __('Appointment Time') }}</label>
                            <input id="appointment_time" type="time" class="form-control @error('appointment_time') is-invalid @enderror" name="appointment_time" required>
                            @error('appointment_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- User Information -->
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">{{ __('Phone') }}</label>
                            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Book Appointment') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
