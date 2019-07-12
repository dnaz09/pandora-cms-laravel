@extends('theme.default')

@section('content')
<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
        Customers
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Branch Registered</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Birthday</th>
                        <th></th>
                </thead>
                <tbody>
                    @foreach($customers as $row)
                    <tr>
                        <td>{{$row->branch.' '.$row->branch_code}}</td>
                        <td>{{$row->title.' '.$row->firstname.' '.$row->lastname}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->mobile}}</td>
                        <td>{{$row->birthday}}</td>
                        <td class="text-center"><a href="{{ url('/view', ['id' => $row->id]) }}" class="btn btn-dark">View Details</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
