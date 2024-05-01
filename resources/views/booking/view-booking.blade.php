<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.view') . ' ' . __('tran.lawyers') }}</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('tran.image') }}</th>
                                <th>{{ __('tran.user') }}</th>
                                <th>{{ __('tran.lawyer') }}</th>
                                <th>{{ __('tran.answer') }}</th>
                                <th>{{ __('tran.city') }}</th>
                                <th>{{ __('tran.statu') }}</th>
                                <th>{{ __('tran.date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($booking  as $item)
                                <tr>
                                    <td>
                                        @if( $item->lawyer->image)
                                        <img src="{{ $item->lawyer->imageurl ?? 'N/A' }}" class="me-75" height="50" width="50" alt="Noimage" />
                                        @else
                                        Noimage
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="fw-bold">{{ ($item->user->name ?? 'N/A')  }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="fw-bold">{{ ($item->lawyer->name ?? 'N/A')  }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->answer ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->lawyer->city->name ?? 'N/A' }}</span> -
                                        <span class="fw-bold">{{ $item->lawyer->area->name ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{!! $item->status->getLabelHtml() !!}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l j F Y -  H:i a')}}</span>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="15" class="alert alert-danger text-center"> No Data Here</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


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
    @endpush
