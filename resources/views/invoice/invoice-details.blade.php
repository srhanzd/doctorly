@extends('layouts.master-layouts')
@section('title') {{ __('Create New Service') }} @endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css') }}">
@endsection
@section('body')

    <body data-topbar="dark" data-layout="horizontal">
    @endsection
    @section('content')
        <!-- start page title -->
        @component('components.breadcrumb')
            @slot('title') Create Service @endslot
            @slot('li_1') Dashboard @endslot
            @slot('li_2') Service @endslot
            @slot('li_3') Create Service @endslot
        @endcomponent
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <a href="{{ url('invoice') }}">
                    <button type="button" class="btn btn-primary waves-effect waves-light mb-4">
                        <i class="bx bx-arrow-back font-size-16 align-middle mr-2"></i>{{ __('Back to Service List') }}
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <blockquote>{{ __('Service Create') }}</blockquote>
                        <form class="outer-repeater" action="{{ route('invoice.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="control-label">{{ __('description') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('description') is-invalid @enderror"
                                           name="description" id="description" tabindex="1"
                                           value=""
                                           placeholder="{{ __('Enter description') }}">
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror

                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="control-label">{{ __('price') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text"
                                               class="form-control @error('price') is-invalid @enderror"
                                               name="price" id="price" tabindex="1"
                                               value=""
                                               placeholder="{{ __('Enter price') }}">
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div></div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">clinic</label>
                                            <select class="form-control" name="clinic" id="exampleFormControlSelect1">
                                                <option>Dental_Clinic</option>
                                                <option>Dermatology_Clinic</option>
                                                <option>Beauty_Clinic</option>
                                                <option>Nutrition_Clinic</option>
                                                <option>Laser_Clinic</option>
                                            </select>
                                        </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create New Service') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    @endsection
    @section('script')
        <script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
        <!-- form mask -->
        <script src="{{ URL::asset('assets/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>
        <!-- form init -->
        <script src="{{ URL::asset('assets/js/pages/form-repeater.int.js') }}"></script>
        <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>
        <script src="{{ URL::asset('assets/js/pages/notification.init.js') }}"></script>
        <script>
            // Patient by appointment select
            $('.sel_patient').on('change', function(e) {
                e.preventDefault();
                var patientId = $(this).val();
                var token = $("input[name='_token']").val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('patient_by_appointment') }}",
                    data: {
                        patient_id: patientId,
                        _token: token,
                    },
                    success: function(res) {
                        $('.sel_appointment').html('');
                        $('.sel_appointment').html(res.options);
                    },
                    error: function(res) {
                        console.log(res);
                    }
                });
            });
            // appointment by doctor select
            $('.sel_appointment').change(function(e) {
                e.preventDefault();
                var appointmentID = $(this).val();
                var token = $("input[name='_token']").val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('appointment_by_doctor') }}",
                    data: {
                        appointment_id: appointmentID,
                        _token: token,
                    },
                    success: function(res) {
                        var rd = res.data[0];
                        $('.sel_doctor').val(rd.first_name + ' ' + rd.last_name);
                        $('.sel_doctor_id').val(rd.id);
                    },
                    error: function(res) {
                        console.log(res);
                    }
                });
            });
        </script>
    @endsection
