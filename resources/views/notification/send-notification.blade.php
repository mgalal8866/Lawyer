<div>

    <div wire:ignore.self class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1">ارسال اشعار</h1>
                    </div>
                    <form id="editUserForm" class="row gy-1 pt-75"  wire:submit.prevent="save">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="modalEditUserFirstName">{{__('tran.title')}}</label>
                            <input type="text"  class="form-control"  wire:model="title" required/>
                          @error('title') <span class="error" style="color: red" >{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="modalEditUserFirstName">{{__('tran.body')}}</label>
                            <input type="text"  class="form-control"  wire:model="body" required/>
                          @error('body') <span class="error" style="color: red" >{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label"
                                for="modalEditUserFirstName">{{ __('tran.issue') }}</label>
                            <select class="form-select" wire:model='issue_id' >
                                <option value=""> اختيار التحويل الى </option>
                                @foreach ($issuess as $c)
                                    <option value="{{ $c->id }}">{{ $c->title }}</option>
                                @endforeach
                            </select>
                            @error('issue_id')
                                <span class="error" style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 text-center mt-2 pt-50">
                            <button type="submit" class="btn btn-primary me-1" >{{__('tran.save')}}</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                {{__('tran.cancel')}}
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
                    title: event.detail.message,
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
