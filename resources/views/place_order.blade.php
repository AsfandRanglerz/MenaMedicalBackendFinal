@extends('layout.master')

@section('title', 'Place Order')
<style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
    }

    .table-container {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 400px;
    }

    th,
    td {
        padding: 12px 16px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #006b99;
        color: white;
        text-align: center;
        font-size: 18px;
    }

    td:last-child {
        text-align: center;
    }

    .select-button {
        background-color: #28a745;
        color: white;
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
    }

    .select-link {
        color: #006b99;
        text-decoration: none;
    }

    .select-link:hover {
        text-decoration: underline;
    }

    @media screen and (max-width: 600px) {

        .table-container,
        .table-responsive,
        .w-100[style*="max-width"] {
            padding: 0;
            max-width: 100% !important;
        }

        table.table {
            min-width: unset !important;
            width: 100% !important;
            font-size: 14px;
        }

        .select-button,
        .select-link {
            width: 100% !important;
            display: block !important;
            text-align: center;
            margin: 0 auto;
        }

        th,
        td {
            padding: 10px 6px !important;
            font-size: 14px !important;
        }
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container-fluid">
                @foreach ($PlaceOrderOnes as $PlaceOrderOne)
                    <div class="section-devision">
                        <h4 class="mb-lg-4 mb-3 text-center primary-heading">{{ $PlaceOrderOne->title }}</h4>
                        <p>{!! nl2br(e($PlaceOrderOne->description)) !!}</p>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    <div class="w-100" style="max-width: 700px; margin: 0 auto;">
                        <table class="table table-bordered align-middle mb-0" style="width:100%; min-width:unset;">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center"
                                        style="background-color: #006b99; color: #fff; font-size: 20px;">
                                        <span style="color: #fff;">Select a Service for Payment</span>
                                    </th>
                                </tr>
                            </thead>
                                    <tbody>
                                        <tr>
                                            <td>Language Editing Service – Basic Level</td>
                                            <td>
                                                <form action="{{route('get.order')}}" method="POST">
                                                    @csrf
                                                <input type="hidden" name='title' value="Basic Editing Service">
                                                <input type="hidden" name='service' value="Language Editing">
                                                <input type="hidden" name='package' value="Basic">
                                                <button type="submit"
                                                    class="select-link w-100 d-inline-block text-center border-0 bg-transparent p-0"
                                                    style="color: #006b99; text-decoration: underline; font-weight: normal;">Select</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Language Editing Service – Advanced Level</td>
                                            <td>
                                                <form action="{{route('get.order')}}" method="POST">
                                                    @csrf
                                                <input type="hidden" name='title' value="Advance Editing Service">
                                                <input type="hidden" name='service' value="Language Editing">
                                                <input type="hidden" name='package' value="Advance">
                                                <button type="submit"
                                                    
                                                    class="select-link w-100 d-inline-block text-center border-0 bg-transparent p-0"
                                                    style="color: #006b99; text-decoration: underline; font-weight: normal;">Select</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Language Editing Service – Premium Level</td>
                                            <td>
                                                <form action="{{route('get.order')}}" method="POST">
                                                    @csrf
                                                <input type="hidden" name='title' value="Premium Editing Service">
                                                <input type="hidden" name='service' value="Language Editing">
                                                <input type="hidden" name='package' value="Premium">
                                                <button type="submit"
                                                  
                                                    class="select-link w-100 d-inline-block text-center border-0 bg-transparent p-0"
                                                    style="color: #006b99; text-decoration: underline; font-weight: normal;">Select</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Scientific Editing Service</td>
                                            <td>
                                                <form action="{{route('get.order')}}" method="POST">
                                                    @csrf
                                                <input type="hidden" name='title' value="Scientific Editing Service">
                                                <input type="hidden" name='service' value="Scientific Editing">
                                                {{-- <input type="hidden" name='package' value="Premium"> --}}
                                                <button type="submit" 
                                                    class="select-link w-100 d-inline-block text-center border-0 bg-transparent p-0"
                                                    style="color: #006b99; text-decoration: underline; font-weight: normal;">Select</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Accidental Plagiarism Check</td>
                                            <td>
                                                <form action="{{route('get.order')}}" method="POST">
                                                    @csrf
                                                <input type="hidden" name='title' value="Similarity Review Report">
                                                <input type="hidden" name='service' value="Accidental Plagirisam">
                                                <button type="submit" 
                                                    class="select-link w-100 d-inline-block text-center border-0 bg-transparent p-0"
                                                    style="color: #006b99; text-decoration: underline; font-weight: normal;">Select</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Formatting Service</td>
                                            <td>
                                                <form action="{{route('get.order')}}" method="POST">
                                                    @csrf
                                                <input type="hidden" name='title' value="Manuscript Formatting Service">
                                                <input type="hidden" name='service' value="Manuscript Formatting Service">
                                                <button type="submit" 
                                                    class="select-link w-100 d-inline-block text-center border-0 bg-transparent p-0"
                                                    style="color: #006b99; text-decoration: underline; font-weight: normal;">Select</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Assignment Editing</td>
                                            <td>
                                                <form action="{{route('get.order')}}" method="POST">
                                                    @csrf
                                                <input type="hidden" name='title' value="Assignment Editing Service">
                                                <input type="hidden" name='service' value="Assignment Editing Service">
                                                <button type="submit"
                                                    class="select-link w-100 d-inline-block text-center border-0 bg-transparent p-0"
                                                    style="color: #006b99; text-decoration: underline; font-weight: normal;">Select</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Thesis Editing – Advance Level</td>
                                            <td>
                                                <form action="{{route('get.order')}}" method="POST">
                                                    @csrf
                                                <input type="hidden" name='title' value="Thesis Editing Service">
                                                <input type="hidden" name='service' value="Thesis Editing Service">
                                                <input type="hidden" name='package' value="Advance">
                                                <button type="submit" 
                                                    class="select-link w-100 d-inline-block text-center border-0 bg-transparent p-0"
                                                    style="color: #006b99; text-decoration: underline; font-weight: normal;">Select</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Thesis Editing – Premium Level</td>
                                            <td>
                                                <form action="{{route('get.order')}}" method="POST">
                                                    @csrf
                                                <input type="hidden" name='title' value="Thesis Editing Service">
                                                <input type="hidden" name='service' value="Thesis Editing Service">
                                                <input type="hidden" name='package' value="Premium">
                                                <button type="submit" 
                                                    class="select-link w-100 d-inline-block text-center border-0 bg-transparent p-0"
                                                    style="color: #006b99; text-decoration: underline; font-weight: normal;">Select</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PowerPoint Presentation Development</td>
                                            <td>
                                                <form action="{{route('get.order')}}" method="POST">
                                                    @csrf
                                                <input type="hidden" name='title' value="Poster / PowerPoint Presentation Service">
                                                <input type="hidden" name='form_head' value="PowerPoint Presentation Service">
                                                <input type="hidden" name='service' value="Power Point Presentations">
                                                <button type="submit"
                                                    
                                                    class="select-link w-100 d-inline-block text-center border-0 bg-transparent p-0"
                                                    style="color: #006b99; text-decoration: underline; font-weight: normal;">Select</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Poster Creation</td>
                                            <td>
                                                <form action="{{route('get.order')}}" method="POST">
                                                    @csrf
                                                <input type="hidden" name='title' value="Poster / PowerPoint Presentation Service">
                                                <input type="hidden" name='form_head' value="Posters Service">
                                                <input type="hidden" name='service' value="Power Point Poster">
                                                <button type="submit" 
                                                    class="select-link w-100 d-inline-block text-center border-0 bg-transparent p-0"
                                                    style="color: #006b99; text-decoration: underline; font-weight: normal;">Select</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Data Analysis – Advance Level</td>
                                            <td>
                                                <form action="{{route('get.order')}}" method="POST">
                                                    @csrf
                                                <input type="hidden" name='title' value="Advance Data Analysis Service">                                                
                                                <input type="hidden" name='service' value="Data Analysis">
                                                <input type="hidden" name='package' value="Advance">
                                                <button type="submit" 
                                                    class="select-link w-100 d-inline-block text-center border-0 bg-transparent p-0"
                                                    style="color: #006b99; text-decoration: underline; font-weight: normal;">Select</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Data Analysis – Premium Level</td>
                                            <td>
                                                <form action="{{route('get.order')}}" method="POST">
                                                    @csrf
                                                <input type="hidden" name='title' value="Premium Data Analysis Service">                                                
                                                <input type="hidden" name='service' value="Data Analysis">
                                                <input type="hidden" name='package' value="Premium">
                                                <button type="submit" 
                                                    class="select-link w-100 d-inline-block text-center border-0 bg-transparent p-0"
                                                    style="color: #006b99; text-decoration: underline; font-weight: normal;">Select</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                            </form>
                        </table>
                    </div>
                </div>
                <div class="section-devision place-order">
                    @foreach ($PlaceOrderTwos as $PlaceOrderTwo)
                        <h4 class="text-center mb-lg-5 mb-3 primary-heading">{{ $PlaceOrderTwo->main_title }}</h4>
                    @endforeach
                    <div class="container-fluid">
                        <div
                            class="d-flex justify-content-lg-between justify-content-center gap-3 gap-md-0 flex-wrap work-section">
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
                                    <div class="d-sm-block d-none">
                                        <img src="{{ asset('public/assets/images/arrow.png') }}" alt=""
                                            class="arrow">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @foreach ($PlaceOrderThrees as $PlaceOrderThree)
                    <p>{!! nl2br(e($PlaceOrderThree->description)) !!}</p>
                @endforeach
                <div class="section-devision">
                    @foreach ($PlaceOrderFours as $PlaceOrderFour)
                        @if (empty(
                                $PlaceOrderFour->title &&
                                    $PlaceOrderFour->description &&
                                    $PlaceOrderFour->link &&
                                    $PlaceOrderFour->link_text &&
                                    $PlaceOrderFour->colour
                            ))
                            <h4 class="mb-4 primary-heading">{{ $PlaceOrderFour->main_title }}</h4>
                        @endif
                    @endforeach
                    <div class="row gy-5">
                        @foreach ($PlaceOrderFours as $PlaceOrderFour)
                            @if (empty($PlaceOrderFour->main_title))
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="border h-100 position-relative order-card">
                                        <div class="py-md-3 py-2 {{ $PlaceOrderFour->colour }}">
                                            <p class="mb-0 text-white text-center font-500">{{ $PlaceOrderFour->title }}</p>
                                        </div>
                                        <div class="py-3 px-2 text-center">
                                            <p class="m-0 mb-5 py-3">{{ $PlaceOrderFour->description }}</p>
                                            <a href="{{ $PlaceOrderFour->link }}"
                                                class="mt-4 py-2 px-5 border-0 text-white position-absolute text-decoration-none {{ $PlaceOrderFour->colour }} order-btn">Select</a>
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
