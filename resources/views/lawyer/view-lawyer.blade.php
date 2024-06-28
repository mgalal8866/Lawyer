<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.view') . ' ' . __('tran.lawyers') }}</h4>
                    <a class="btn btn-primary"  wire:click="$dispatch('edit',{type:1})">{{ __('tran.add') . ' ' .  __('tran.lawyer') }}</a>
                    <div class="mb-1 col-md-2">
                        <input type="text"  class="form-control" wire:model.live='search'  placeholder="بحث بالاسم او رقم التليفون"/>
                    </div>
            </div>
            @livewire('users.edit-user')
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('tran.image') }}</th>
                                <th>{{ __('tran.name') }}</th>
                                <th>{{ __('tran.phone') }}</th>
                                <th>{{ __('tran.city') }}</th>
                                <th>{{ __('tran.gender') }}</th>
                                <th>{{ __('tran.point') }}</th>
                                <th>{{ __('tran.specialist') }}</th>
                                <th>{{ __('tran.statu') }}</th>
                                <th>{{ __('tran.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users  as $item)
                                <tr>
                                    <td>
                                        @if( $item->image)
                                        <img src="{{ $item->imageurl ?? 'N/A' }}" class="me-75" height="50" width="50" alt="Noimage" />
                                        @else
                                        Noimage
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="fw-bold">{{ ($item->name ?? 'N/A')  }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->phone ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->city->name ?? 'N/A' }}</span> -
                                        <span class="fw-bold">{{ $item->area->name ?? 'N/A' }}</span>
                                    </td>

                                    <td>
                                        <span class="badge  bg-secondary">
                                            @switch($item->gender)
                                                @case(0)
                                                    <i class="fas fa-mars" style="color: #1ac1f4;"></i>
                                                    {{ __('tran.male') }}
                                                @break

                                                @case(1)
                                                    <i class="fas fa-venus" style="color: #fb04f3;"></i>
                                                    {{ __('tran.female') }}
                                                @break
                                            @endswitch
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->point ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->specialist->name ?? 'N/A' }}</span>
                                    </td>

                                    <td>
                                        <span
                                            class="badge  bg-@switch($item->active)
                                            @case(0)danger
                                            @break

                                            @case(1)success
                                            @break
                                            @endswitch">
                                            @switch($item->active)
                                                @case(0)
                                                    غير مفعل
                                                @break

                                                @case(1)
                                                    مفعل
                                                @break
                                            @endswitch
                                        </span>
                                    </td>
                                    <td>
                                        <a wire:click="$dispatch('edit',{id:'{{ $item->id }}',type:'{{ $item->type }}'})"><i
                                            class="fas fa-edit fa-lg" style="color: #c2881e;"></i></a>
                                        {{-- <a wire:click="$dispatch('edit',{id:'{{ $item->id }}'})"><i
                                                class="fas fa-edit fa-lg" style="color: #c2881e;"></i></a>
                                        <a wire:click="delete('{{ $item->id }}')"><i
                                                class="fas fa-trash-alt fa-lg " style="color: #ff0000;"></i></a> --}}
                                        <a wire:click="activetoggle('{{ $item->id }}')"> <i
                                                class="fas {{ $item->active == 1 ? 'fas fa-eye' : 'fa-eye-slash' }} fa-lg "
                                                style="{{ $item->active == 1 ? 'color: #1caa0f;' : '' }}"></i></a>
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
