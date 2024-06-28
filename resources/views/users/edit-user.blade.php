<div>
    <div wire:ignore.self class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1">{{ $header }}</h1>
                    </div>
                    <form id="editUserForm" class="row gy-1 pt-75" wire:submit.prevent="save">

                        <div class=" col-md-6">
                            <label class="form-label" for="modalEditUserFirstname">{{ __('tran.name') }}</label>
                            <input type="text" class="form-control" wire:model="name" required />
                            @error('name')
                                <span class="error" style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-md-6">
                            <label class="form-label" for="modalEditUserFirstphone">{{ __('tran.phone') }}</label>
                            <input type="number" class="form-control" wire:model="phone"  @if (!$edit) required @else  readonly @endif />
                            @error('phone')
                                <span class="error" style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-md-4">
                            <label class="form-label" for="modalEditUserFirstpoint">{{ __('tran.point') }}</label>
                            <input type="number" class="form-control" wire:model="point" required />
                            @error('point')
                                <span class="error" style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-md-4">
                            <label class="form-label" for="modalEditUserFirstName">{{ __('tran.gender') }}</label>
                            <select class="form-select" wire:model="gender" required>
                                <option value=""> {{ __('tran.select') }}</option>
                                <option value="0"> {{ __('tran.male') }}</option>
                                <option value="1"> {{ __('tran.female') }}</option>

                            </select>
                            @error('city_id')
                                <span class="error" style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-md-4">
                            <label class="form-label" for="modalEditUserFirstName">{{ __('tran.city') }}</label>
                            <select class="form-select" wire:model.live='city_id' required>
                                <option value=""> {{ __('tran.select') . ' ' . __('tran.city') }}</option>
                                @foreach ($countrylist as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                                <span class="error" style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class=" col-md-4">
                            <label class="form-label" for="modalEditUserFirstName">{{ __('tran.area') }}</label>
                            <select class="form-select" wire:model="area_id" required>
                                <option value=""> {{ __('tran.select') . ' ' . __('tran.area') }}</option>
                                {{-- @if (!empty($area_id)) --}}
                                    @foreach ($area as $item)
                                        <option  @if  (!empty($area_id)) {{$area_id == $item->id ?'selected':'' }}   @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                    {{-- @endif --}}
                                </select>
                                @error('area_id')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                        </div>
                        @if ($type == 1)
                            <div class=" col-md-12">
                                <label class="form-label"
                                    for="modalEditUserFirstdescription">{{ __('tran.description') }}</label>
                                <input type="text" class="form-control" wire:model="description" required />
                                @error('description')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class=" col-md-4">
                                <label class="form-label"
                                    for="modalEditUserFirstName">{{ __('tran.specialist') }}</label>
                                <select class="form-select" wire:model.live='specialist_id' required>
                                    <option value=""> {{ __('tran.select') . ' ' . __('tran.specialist') }}
                                    </option>
                                    @foreach ($specialist as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('specialist_id')
                                    <span class="error" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif

                        <div class="col-12 text-center mt-2 pt-50">
                            <button type="submit" class="btn btn-primary me-1">{{ __('tran.save') }}</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                {{ __('tran.cancel') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('jslive')
    <script>
        window.addEventListener('swal', event => {
            Swal.fire({
                title: event.message,
                icon: 'info',
                customClass: {
                    confirmButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
        })
        window.addEventListener('openmodel', event => {
            // console.log('www');
            $('#editUser').modal("show");

        });
        window.addEventListener('closemodel', event => {
            // console.log('www');
            $('#editUser').modal("hide");

        });
    </script>
@endpush


