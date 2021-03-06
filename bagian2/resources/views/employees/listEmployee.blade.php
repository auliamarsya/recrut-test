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
            <a type="button" data-toggle="modal" data-target="#importModal" class="btn btn-success">Import Employee</a>
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
                            <td class="align-middle">
                                <div class="dropdown">
                                    <a class="text-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="iconify" data-icon="bi:three-dots-vertical" data-inline="false"></span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuEmployee">
                                        <a class="dropdown-item" href="{{url('/edit-employee/'.$employee['id'])}}"><span class="iconify" data-icon="bi:pencil-square" data-inline="false"></span> Edit</a>
                                        <a class="dropdown-item" href="{{url('/delete-employee/'.$employee['id'])}}" onclick="return confirm('Are you sure want to delete this data?')"><span class="iconify" data-icon="bi:trash" data-inline="false"></span> Delete</a>
                                    </div>
                                </div>
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
<!-- Modal -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Employees</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('import.employee') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
                    <a type="button" class="btn btn-warning float-left" href="{{url('storage/file/template.xlsx')}}" download="template">Download Template</a>
                    <a type="button" class="btn btn-warning float-left" href="{{url('storage/file/example.xlsx')}}" download="example">Example</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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