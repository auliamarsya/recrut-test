@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4 text-center">
            <div class="card shadow rounded">
                <div class="card-body">
                    <span class="iconify text-secondary" data-icon="fa-regular:building" data-inline="false" data-width="30%" data-height="30%"></span>
                    <h5 class="card-title mt-4">Companies</h5>
                    <a href="{{route('list.company')}}" class="btn btn-block btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 text-center">
            <div class="card shadow rounded">
                <div class="card-body">
                    <span class="iconify text-secondary" data-icon="fa-regular:user" data-inline="false" data-width="30%" data-height="30%"></span>
                    <h5 class="card-title mt-4">Employees</h5>
                    <a href="{{route('employee')}}" class="btn btn-block btn-primary">Manage</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection