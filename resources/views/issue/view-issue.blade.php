<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.view') . ' ' . __('tran.issue') }}</h4>
                    <div class="mb-1 col-md-2">
                        <select class="form-select" wire:model.live='type'>
                            <option value="0">اسئلة</option>
                            <option value="1">قضايا</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('tran.title') }}</th>
                                <th>{{ __('tran.user') }}</th>
                                <th>{{ __('tran.phone') }}</th>
                                <th>{{ __('tran.reply') }}</th>
                                <th>{{ __('tran.specialist') }}</th>
                                <th>{{ __('tran.statu') }}</th>
                                <th>{{ __('tran.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($issues  as $item)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $item->title ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->user->name ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->user->phone ?? 'N/A' }}</span>

                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->answer_count ?? 'N/A' }}</span>

                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->specialist->name ?? 'N/A' }}</span>
                                    </td>
                                    <td>{!! $item->status->getLabelHtml() !!}</td>
                                    <td>
                                        <a class="btn btn-info waves-effect waves-float waves-light btn-sm"
                                        href="{{ route('detailsissue',['id' => $item->id] ) }}">عرض</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="15" class="alert alert-danger text-center"> No Data Here</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="card-footer  d-flex justify-content-center">
                        {{ $issues->links() }}
                    </div>
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
