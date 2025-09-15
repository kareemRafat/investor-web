<!-- FAQ Section -->
<div class="container px-sm-0">
    <div class="row g-3 mb-3">
        <div class="col-12">
            <div class="bg-light text-primary rounded-8 shadow-sm mb-3">
                <h5 class="mb-0 p-3 fw-bold text-center">
                    {{ __('header.fullfaq') }}
                </h5>
            </div>
            <div class="card border-0 shadow-sm rounded-8">
                <div class="card-body p-4">
                    <div class="accordion" id="faqAccordion">
                        @foreach (range(1, 7) as $i)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $i }}">
                                    <button class="accordion-button text-right {{ $i > 1 ? 'collapsed' : '' }}"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $i }}"
                                        aria-expanded="{{ $i === 1 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $i }}">
                                        {{ __('pages.faq.q' . $i) }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $i }}"
                                    class="accordion-collapse collapse {{ $i === 1 ? 'show' : '' }}"
                                    aria-labelledby="heading{{ $i }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body text-secondary">
                                        {{ __('pages.faq.a' . $i) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
