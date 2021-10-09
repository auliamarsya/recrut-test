<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Employees</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 pt-3">
                <h4>{{$company->name}}</h4>
                <p>{{$company->email}} | {{$company->website}}</p>
                <div class="table-responsive">
                    <table class="table bg-white">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Employee Name</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$employees->isEmpty())
                            @foreach ($employees as $key => $employee)
                            <tr>
                                <td scope="row">{{$key+1}}</th>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->email}}</td>
                            </tr>
                            @endforeach
                            @else
                            <td colspan="3" class="text-center">There's no data.</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>