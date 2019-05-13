<div class="slider-area">
    <div class="container">
        <div class="slider-active-3 owl-carousel slider-hm8 owl-dot-style">
            @foreach(HOME_SLIDER as $slider)
            
            <div class="slider-height-6 d-flex align-items-center justify-content-center bg-img" style="background-image:url('{{ asset($slider["image"]) }}');">
                <div class="slider-content-5 slider-animated-1 text-center">
                    <h3 class="animated">{{ $slider["title"] }}</h3>
                    <h1 class="animated">{{ $slider["description"] }}</h1>
                    <p class="animated">{{ $slider["subtitle"] }}</p>
                </div>
        
            </div>
            @endforeach
        </div>
    </div>
</div>