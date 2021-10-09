@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <h3 class="text-center">Edit Company</h3>
        </div>
        <div class="col-sm-12 pt-3">
            <div class="card shadow bg-white">
                <div class="card-body p-4">
                    <form action="{{ route('update.company') }}" method="post" enctype='multipart/form-data' id="detailProductForm">
                        @csrf
                        <input type="hidden" value="{{$company['id']}}" name="id">
                        <div class="form-group row">
                            <label for="company_name" class="col-sm-3 col-form-label label-form-s">Company Name <span style="color: red;">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" id="company_name" placeholder="Company Name" value="{{ $company['name'] }}" required>

                                @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label label-form-s">Email <span style="color: red;">*</span></label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ $company['email'] }}" required>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label label-form-s">Logo <span style="color: red;">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" name="logo" class="form-control-file @error('logo') is-invalid @enderror" id="logo" placeholder="Logo" value="{{ old('logo') }}" accept="image/png" required>

                                @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-sm-3 col-form-label label-form-s">Website <span style="color: red;">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" id="website" placeholder="Website" value="{{ $company['website'] }}" required>

                                @error('website')
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
@endsection