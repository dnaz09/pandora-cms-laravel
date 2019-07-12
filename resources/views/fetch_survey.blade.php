@extends('theme.default')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/index') }}">Back To Customers</a>
    </li>
    <li class="breadcrumb-item active">Survey Results</li>
</ol>

<div class="card">
    <div class="card-header">Survey Results</div>
    <div class="card-body">
        @foreach($finalQuery as $row)
        <pre> {{ $row->category }}</pre>
        @endforeach
    </div>
</div>


@endsection
