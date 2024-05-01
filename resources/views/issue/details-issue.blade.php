@push('csslive')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-invoice.min.css') }}">
@endpush
<div>
    <section class="invoice-preview-wrapper">
        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12">
                <div class="card invoice-preview-card">
                    <div class="card-body invoice-padding pb-0">
                        <!-- Header starts -->
                        <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                            <div>
                                <div class="logo-wrapper">
                                    <img src="{{ asset('asset/images/logo.png') }}" width="50" />
                                </div>
                            </div>
                            <div class="mt-md-0 mt-2">
                                <h4 class="invoice-title">
                                    {{ __('tran.invoicenumber') }}
                                    <span class="invoice-number"># {{ $issue->id ?? '' }}</span>
                                </h4>
                                <div class="invoice-date-wrapper">
                                    <p class="invoice-date-title">{{ __('tran.invodate') }}:</p>
                                    <p class="invoice-date">
                                        {{ \Carbon\Carbon::parse($issue->created_at)->translatedFormat('l j F Y -  h:i a') ?? '' }}
                                    </p>
                                </div>

                                <div class="invoice-date-wrapper">
                                    {{-- <p class="invoice-date-title">{{ __('tran.username') }}:</p> --}}
                                </div>
                            </div>
                        </div>
                        <!-- Header ends -->
                    </div>

                    <hr class="invoice-spacing" />

                    <!-- Address and Contact starts -->
                    <div class="card-body invoice-padding pt-0">
                        <div class="row invoice-spacing">
                            <div class="col-xl-8 p-0">
                                <h6 class="mb-2"> {{ __('tran.customerdata') }} :</h6>
                                <h6 class="mb-25">{{ $issue->user->name ?? '' }}</h6>
                                <h6 class="mb-25">{{ $issue->user->phone ?? '' }}</h6>
                                <h6 class="mb-25">
                                    {{ ($issue->user->city->name ?? '') . '-' . $issue->user->area->name }}</h6>

                            </div>
                            <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                <h6 class="mb-2">{{ __('tran.issue') }} :</h6>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="pe-1">{{ __('tran.specialist') }} : </td>
                                            <td><span class="fw-bold">{{ $issue->specialist->name ?? '' }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <hr class="invoice-spacing" />
                    <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="row  m-1">
                                    <h2>

                                        {{ $issue->title }}
                                    </h2>
                                    <h4>

                                        {{ $issue->body }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 invoice-actions mt-md-0 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="row  m-1">
                                    <div class="accordion accordion-margin" id="accordionMargin">
                                        @foreach ($issue->answer as $item)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading-{{ $item->id }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#accordionMarginOne-{{ $item->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="accordionMarginOne-{{ $item->id }}">
                                                        {!! $item->status->getLabelHtml() !!}
                                                        {{ $item->user->name }}

                                                        {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l j F Y -  h:i a') ?? '' }}
                                                    </button>
                                                </h2>
                                                <div id="accordionMarginOne-{{ $item->id }}"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="heading-{{ $item->id }}"
                                                    data-bs-parent="#accordionMargin">
                                                    <div class="accordion-body">
                                                        {{ $item->reply }}
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
            </div>

        </div>
        <div class="row invoice-preview">

        </div>

    </section>

</div>

@push('jslive')
    <script>
        window.addEventListener('swal', event => {

            Swal.fire({
                title: event.detail.message,
                icon: 'info',
                customClass: {
                    confirmButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
        })
    </script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-invoice.min.js') }}"></script>
@endpush
