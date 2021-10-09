@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <a class="text-black" type="button" style="text-decoration: none; font-size: 18px;" onclick="goBack()">
                <span id="iconNav">
                    <span class="iconify" data-icon="ic:outline-keyboard-arrow-left" data-inline="false" data-width="25px" data-height="25px"></span>
                </span>
                <span class="ml-2" style="vertical-align:middle">Back</span>
            </a>
        </div>
        <div class="col-sm-12 mt-2">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
            @endif
        </div>
        <div class="col-sm-12 text-right">
            <a type="button" href="{{route('create.employee')}}" class="btn btn-primary">Create Employee</a>
        </div>
        <div class="col-sm-12 pt-3">
            <div class="table-responsive">
                <table class="table bg-white shadow rounded">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Company</th>
                            <th scope="col">Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($employees != null)
                        @foreach ($employees as $key => $employee)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$employee['name']}}</td>
                            <td>{{$employee['company']}}</td>
                            <td>{{$employee['email']}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                        @else
                        <td colspan="5" class="text-center">There's no data.</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection