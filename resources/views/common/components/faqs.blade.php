<div class="container faq-section">
    <h4 class="mb-lg-4 mb-3 text-center primary-heading">Frequently Asked Questions</h4>
    <div class="accordion" id="accordionFAQs">
        @foreach ($Faqs as $Faq)
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne{{ $loop->index }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapseOne {{ $loop->index }}">
                    {{ $Faq->questions }}
                </button>
            </h2>
            <div id="collapseOne{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#accordionFAQs">
                <div class="accordion-body">
                    {!! $Faq->answers !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
