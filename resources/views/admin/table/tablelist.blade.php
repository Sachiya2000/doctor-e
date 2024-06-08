@extends("admin.table.dashboard")

@section("table")

<div class="row">
    <div class="col-12 col-lg-4 mb-4">
        <div class="card h-100 text-white bg-warning">
            <div class="card-body text-center">
                <h3 class="card-title">Client Table</h3>
                <p class="card-text">View Now</p>
                <a href="/user/view" class="btn btn-light">Go</a>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 mb-4">
        <div class="card h-100 text-white bg-primary">
            <div class="card-body text-center">
                <h3 class="card-title">Admin Table</h3>
                <p class="card-text">View Now</p>
                <a href="user/admin/view" class="btn btn-light">Go</a>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 mb-4">
        <div class="card h-100 text-white bg-success">
            <div class="card-body text-center">
                <h3 class="card-title">Doctor Table</h3>
                <p class="card-text">View Now</p>
                <a href="/doctor/view" class="btn btn-light">Go</a>
            </div>
        </div>
    </div>
</div>


@endsection
