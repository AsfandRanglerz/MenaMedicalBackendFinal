@extends('layout.master')

@section('title', 'Place Order')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="container-fluid">
            @foreach($PlaceOrderOnes as $PlaceOrderOne)
            <div class="section-devision">
                <h4 class="mb-lg-4 mb-3 text-center primary-heading">{{ $PlaceOrderOne->title }}</h4>
                <p>{!! nl2br(e($PlaceOrderOne->description)) !!}</p>
            </div>
            @endforeach
            <div class="section-devision place-order">
                @foreach ($PlaceOrderTwos as $PlaceOrderTwo)
                <h4 class="text-center mb-lg-5 mb-3 primary-heading">{{ $PlaceOrderTwo->main_title }}</h4>
                @endforeach
                <div class="container-fluid">
                    <div class="d-flex justify-content-lg-between justify-content-start overflow-auto work-section">
                        @php
                            // Filter only valid items (with title, image, and description)
                            $filteredItems = $PlaceOrderTwos->filter(function ($item) {
                                return !empty($item->title) && !empty($item->image) && !empty($item->description);
                            });
                            $filteredItems = $filteredItems->values(); // Reindex array for accurate loop indexing
                        @endphp
                        
                       @foreach ($filteredItems as $index => $item)
                       <div class="d-flex flex-column align-items-center gap-3 work-section-item">
                           <img src="{{ $item->image }}" alt="">
                           <div class="text-center content">
                               <h6>{{ $item->title }}</h6>
                               <p class="m-0 mt-3">{{ $item->description }}</p>
                           </div>
                       </div>
                       <!-- Only show the arrow if it's not the last item -->
                       @if ($index < $filteredItems->count() - 1)
                           <div>
                               <img src="{{ asset('public/assets/images/arrow.png') }}" alt="" class="arrow">
                           </div>
                       @endif
                   @endforeach
                    </div>
                </div>
            </div>
            @foreach($PlaceOrderThrees as $PlaceOrderThree)
            <p>{!! nl2br(e($PlaceOrderThree->description)) !!}</p>
            @endforeach
            <div class="section-devision">
                @foreach ($PlaceOrderFours as $PlaceOrderFour)
                @if(empty($PlaceOrderFour->title && $PlaceOrderFour->description && $PlaceOrderFour->link && $PlaceOrderFour->link_text && $PlaceOrderFour->colour))
                <h4 class="mb-4 primary-heading">{{ $PlaceOrderFour->main_title }}</h4>
               @endif
                @endforeach
                <div class="row gy-5">
                    @foreach ($PlaceOrderFours as $PlaceOrderFour)
                    @if(empty($PlaceOrderFour->main_title))
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="border h-100 position-relative order-card">
                            <div class="py-md-3 py-2 {{ $PlaceOrderFour->colour }}">
                                <p class="mb-0 text-white text-center font-500">{{ $PlaceOrderFour->title }}</p>
                            </div>
                            <div class="py-3 px-2 text-center">
                                <p class="m-0 mb-5 py-3">{{ $PlaceOrderFour->description }}</p>
                                <a href="{{ $PlaceOrderFour->link }}" class="mt-4 py-2 px-5 border-0 text-white position-absolute text-decoration-none {{ $PlaceOrderFour->colour }} order-btn">Select</a>
                            </div>
                        </div>
                        
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script></script>
@endsection
