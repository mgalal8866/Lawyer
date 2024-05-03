<div>
    <section id="statistics-card">

        <div class="row">
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-info p-50 mb-1">
                            <div class="avatar-content">
                                <i class="  font-medium-5 fas fa-id-card   font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="fw-bolder">{{ $data['users'] }}</h2>
                        <p class="card-text">أجمالى المواطنين</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-warning p-50 mb-1">
                            <div class="avatar-content">
                                <i class="  font-medium-5 fas fa-user-graduate font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="fw-bolder">{{ $data['lawyer'] }}</h2>
                        <p class="card-text">اجمالى المحامين</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-danger p-50 mb-1">
                            <div class="avatar-content">
                                <i data-feather="alert-octagon" class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="fw-bolder">{{ $data['issue'] }}</h2>
                        <p class="card-text">اجمالى القضايا</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-primary p-50 mb-1">
                            <div class="avatar-content">
                                <i class="  font-medium-5 fas fa-question-circle fa-lg"></i>
                            </div>
                        </div>
                        <h2 class="fw-bolder">{{ $data['question'] }}</h2>
                        <p class="card-text">اجمالى الاسئلة</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h2 class="fw-bolder mb-0">{{ $data['question'] }}</h2>
                            <p class="card-text">اجمالى الاسئلة</p>
                        </div>
                        <div class="avatar bg-light-warning p-50 m-0">
                            <div class="avatar-content">
                                <i class="  font-medium-5 fas fa-question-circle fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h2 class="fw-bolder mb-0">{{ $data['question_has_answer'] }}</h2>
                            <p class="card-text">الاسئلة المجابة</p>
                        </div>
                        <div class="avatar bg-light-success p-50 m-0">
                            <div class="avatar-content">
                                <i class="  font-medium-5 fas fa-question-circle fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h2 class="fw-bolder mb-0">{{ $data['question_dont_have'] }}</h2>
                            <p class="card-text">الاسئله لم يتم الاجابة عليها</p>
                        </div>
                        <div class="avatar bg-light-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="  font-medium-5 fas fa-question-circle fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h2 class="fw-bolder mb-0">{{ $data['issue'] }}</h2>
                            <p class="card-text">اجمالى القضايا</p>
                        </div>
                        <div class="avatar bg-light-warning p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather="alert-octagon" class="font-medium-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h2 class="fw-bolder mb-0">{{ $data['issue_has_offers'] }}</h2>
                            <p class="card-text">القضايا بها عروض</p>
                        </div>
                        <div class="avatar bg-light-success p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather="alert-octagon" class="font-medium-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h2 class="fw-bolder mb-0">{{ $data['issue_dont_have_offers'] }}</h2>
                            <p class="card-text">القضايا لم يتم تقديم عروض عليها</p>
                        </div>
                        <div class="avatar bg-light-danger p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather="alert-octagon" class="font-medium-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row match-height">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-employee-task">
                    <div class="card-header">
                        <h4 class="card-title">المحامين الاعلى ترتيب فى الرد على القضايا والاسئلة</h4>
                        <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
                    </div>
                    <div class="card-body">
                        @foreach ($data['lawyer_has_max_offers'] as $items)
                            <div class="employee-task d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-row">
                                    <div class="avatar me-75">
                                        <img src="{{  $items->imageurl }}"  class="rounded" width="42" height="42" alt="{{  $items->name }}" />
                                    </div>
                                    <div class="my-auto">
                                        <h6 class="mb-0">{{  $items->name }}</h6>
                                        <small>{{  $items->city->name  . ' , ' .  $items->area->name}}</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="text-muted me-75">{{ $items->offers_count }}</small>
                                    {{-- <div class="employee-task-chart-primary-1"></div> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
