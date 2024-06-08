<div class="client_section layout_padding">
    <div class="container">
        <h1 class="client_taital">Testimonial</h1>
        <div class="client_section_2">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @foreach ($feedbacks as $index => $feedback)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="client_main">
                                <div class="box_left">
                                    <p class="lorem_text">{{ $feedback->feedback }}</p>
                                </div>
                                <div class="box_right">
                                    <div class="client_taital_left">
                                        <div class="client_img"><img src="{{ asset($feedback->user->profile_picture) }}" style="width: 150px;border-radius: 50%;"></div>
                                        <div class="quick_icon"><img src="images/quick-icon.png"></div>
                                    </div>
                                    <div class="client_taital_right">
                                        <h4 class="client_name">{{ $feedback->user->name }}</h4>
                                        <p class="customer_text">Customer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
