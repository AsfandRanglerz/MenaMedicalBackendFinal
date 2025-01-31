<div class="container-fluid text-center grey-bg trusted-by">
    <div class="py-4 container-fluid">
        @foreach ($HomeSectionSixs as $HomeSectionSix) 
        <h4 class="heading">{{ $HomeSectionSix->title }}</h4>
        <small>{{ $HomeSectionSix->description }}</small>
        @endforeach
        
        <section class="mt-4 slider">
            @foreach ($HomeSectionThrees as $HomeSectionThree)
            @if(!empty(($HomeSectionThree->image )))
            <div class="slide"><img src="{{ $HomeSectionThree->image }}" /></div>
            @endif
            @endforeach 
            {{-- <div class="slide"><img src="{{ asset('public/assets/images/Frontiers.png') }}" /></div>
            <div class="slide"><img src="{{ asset('public/assets/images/bmj.png') }}" /></div>
            <div class="slide"><img src="{{ asset('public/assets/images/Plos.png') }}" /></div>
            <div class="slide"><img src="{{ asset('public/assets/images/wiley.png') }}" /></div>
            <div class="slide"><img src="{{ asset('public/assets/images/jama.png') }}" /></div>
            <div class="slide"><img src="{{ asset('public/assets/images/emj.png') }}" /></div>
            <div class="slide"><img src="{{ asset('public/assets/images/wolters.png') }}" /></div>
            <div class="slide"><img src="{{ asset('public/assets/images/blood.png') }}" /></div> --}}
        </section>
       
    </div>
</div>
