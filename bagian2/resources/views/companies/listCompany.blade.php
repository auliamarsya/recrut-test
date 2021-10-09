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
            <a href="{{route('create.company')}}" type="button" class="btn btn-primary">Create Company</a>
        </div>
        <div class="col-sm-12 pt-3">
            <div class="table-responsive">
                <table class="table bg-white shadow rounded">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$companies->isEmpty())
                        @foreach ($companies as $key => $company)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td class="align-middle row">
                                <div class="col-2">
                                    <img src="{{ url('company/'.$company->logo) }}" class="img-row" alt="{{$company->name}}" style="width:30px;height:30px;">
                                </div>
                                <div class="col-10">{{$company->name}}</div>
                            </td>
                            <td>{{$company->email}}</td>
                            <td>{{$company->website}}</td>
                            <td>
                                <a href="{{url('/edit-company/'.$company->id)}}">Edit</a>
                            </td>
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

<script type="text/javascript">
    $(function() {
        setTimeout(function() {
            $("div.alert").remove();
        }, 3000);
    })
</script>

@endsection