@extends("admin.forms.dashboard")

@section("forms")
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-lg-3 mb-4">
            <div class="card h-100 text-white bg-warning">
                <div class="card-body text-center">
                    <h3 class="card-title">Client Table</h3>
                    <p class="card-text">View Now</p>
                    <a href="#" class="btn btn-light">Go</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 mb-4">
            <div class="card h-100 text-white bg-primary">
                <div class="card-body text-center">
                    <h3 class="card-title">Admin Table</h3>
                    <p class="card-text">View Now</p>
                    <a href="#" class="btn btn-light">Go</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 mb-4">
            <div class="card h-100 text-white bg-success">
                <div class="card-body text-center">
                    <h3 class="card-title">Doctor Table</h3>
                    <p class="card-text">View Now</p>
                    <a href="/add_doctor" class="btn btn-light">Go</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 mb-4">
            <div class="card h-100 text-white bg-danger">
                <div class="card-body text-center">
                    <h3 class="card-title">Nurse Table</h3>
                    <p class="card-text">View Now</p>
                    <a href="#" class="btn btn-light">Go</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 mb-4">
            <div class="card h-100 text-white bg-info">
                <div class="card-body text-center">
                    <h3 class="card-title">Patient Table</h3>
                    <p class="card-text">View Now</p>
                    <a href="#" class="btn btn-light">Go</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 mb-4">
            <div class="card h-100 text-white bg-secondary">
                <div class="card-body text-center">
                    <h3 class="card-title">Appointment Table</h3>
                    <p class="card-text">View Now</p>
                    <a href="#" class="btn btn-light">Go</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 mb-4">
            <div class="card h-100 text-white bg-dark">
                <div class="card-body text-center">
                    <h3 class="card-title">Billing Table</h3>
                    <p class="card-text">View Now</p>
                    <a href="#" class="btn btn-light">Go</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 mb-4">
            <div class="card h-100 text-white bg-light">
                <div class="card-body text-center">
                    <h3 class="card-title text-dark">Reports Table</h3>
                    <p class="card-text text-dark">View Now</p>
                    <a href="#" class="btn btn-dark">Go</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .card {
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }
</style>
@endpush
