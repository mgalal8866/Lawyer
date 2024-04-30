<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.view') . ' ' . __('tran.notifications') }}</h4>
                    {{-- <a class="btn btn-primary"  wire:click="$dispatch('edit')">{{ __('tran.send') . ' ' .__('tran.notification') }}</a> --}}
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('tran.user') }}</th>
                                <th>{{ __('tran.title') }}</th>
                                <th>{{ __('tran.type') }}</th>
                                <th>{{ __('tran.read') }}</th>
                                <th>{{ __('tran.date') }}</th>

                                {{-- <th>{{ __('tran.action') }}</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($notifcations  as $item)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $item->user->name ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->title ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->redirect??'N/A'}}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">@if ($item->is_read == 1 )
                                            <i class="far fa-eye" style="color: #63E6BE;"></i>
                                            @else
                                            <i class="far fa-eye-slash" style="color: #fa0000;"></i>
                                        @endif</span>
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
