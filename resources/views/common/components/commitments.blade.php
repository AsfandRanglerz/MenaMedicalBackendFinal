<div class="py-4 grey-bg comitment-section">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="text-center">
                    @foreach ($LanguageEditingFours as $LanguageEditingFour)
                    @if($LanguageEditingFour->main_image && $LanguageEditingFour->main_title)
                    <img src="{{ $LanguageEditingFour->main_image }}" class="comit-image">
                    
                    <h4 class="text-center mt-3 primary-heading">{{ $LanguageEditingFour->main_title }}</h4>
                    @endif
                    @endforeach
                    <div class="mt-lg-5 mt-3 row gap-3 gap-sm-0 justify-content-between">
                        @foreach ($LanguageEditingFours as $LanguageEditingFour)
                        @if($LanguageEditingFour->colour && $LanguageEditingFour->title && $LanguageEditingFour->image)
                        <div class="col-sm-4 col-lg-3">
                            <div class="p-0 bg-white h-100">
                                <div class="p-0 py-2 commit-box-heading {{ $LanguageEditingFour->colour }}">
                                    <p class="mb-0">{{ $LanguageEditingFour->title }}</p>
                                </div>
                                <div class="text-center p-4">
                                    <img src="{{ $LanguageEditingFour->image }}"
                                        class="commit-card-image">
                                    <p class="mb-0 mt-4">
                                       {{$LanguageEditingFour->description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach  
                    </div>
                </div>
                {{-- @else --}}
                @foreach ($LanguageEditingFours as $LanguageEditingFour)
                @if(empty($LanguageEditingFour->colour && $LanguageEditingFour->description && $LanguageEditingFour->image))
                <p class="mt-3 small primary-heading">{{ $LanguageEditingFour->description }}</p>
                @endif
                @endforeach
                {{-- @endif --}}
                
            </div>
        </div>
    </div>
</div>
