<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{__('tran.point')}}</h4>
        </div>
        <div class="card-body">
            <form class="row" wire:submit.prevent="save()">

                <div class=" col-md-6">
                    <label class="form-label" for="price_point">{{ __('tran.pointd') }}</label>
                    <input type="text" class="form-control"
                        wire:model="price_point" required />
                    @error('price_point')
                        <span class="error" style="color: red">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-12 text-center mt-2 pt-50">
                    <button type="submit"
                        class="btn btn-primary me-1">{{ __('tran.save') }}</button>

                </div>
            </form>
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

