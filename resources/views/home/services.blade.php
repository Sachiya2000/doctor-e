<div class="services_section layout_padding" id="service">
    <div class="container">
       <h1 class="services_taital">Services </h1>
       <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
       <div class="services_section_2">
          <div class="row justify-content-center align-items-center">

            @foreach ( $service as $service )


             <div class="col-12 col-md-6 col-lg-4 mb-3">
                <div><img src="{{asset($service->image)}}" class="services_img"></div>
                <div class="card-body ">

                    {{-- <p class="">
                       {{$service->description}}
                    </p> --}}



                </div>
                <div class="btn_main"><a href="#">{{$service->title}}</a></div>
             </div>
             @endforeach

          </div>
       </div>
    </div>
 </div>


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
