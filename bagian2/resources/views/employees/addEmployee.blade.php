@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <h3 class="text-center">Add Employee</h3>
        </div>
        <div class="col-sm-12 pt-3">
            <div class="card shadow bg-white">
                <div class="card-body p-4">
                    <form action="{{ route('store.employee') }}" method="post" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group row">
                            <label for="employee_name" class="col-sm-3 col-form-label label-form-s">Employee Name <span style="color: red;">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="employee_name" class="form-control @error('employee_name') is-invalid @enderror" id="employee_name" placeholder="Employee Name" value="{{ old('employee_name') }}" required>

                                @error('employee_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="company" class="col-sm-3 col-form-label label-form-s">Company <span style="color: red;">*</span></label>
                            <div class="col-sm-9">
                                <select id='company' name="company" class="form-control">
                                    <option value='0'>-- Select Company --</option>
                                </select>
                                <!-- <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" id="company" placeholder="Company" value="{{ old('company') }}" required> -->

                                @error('company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label label-form-s">Email <span style="color: red;">*</span></label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}" required>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function() {
        $("#company").select2({
            ajax: {
                url: "{{route('company.getCompany')}}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    });
</script>
@endsection