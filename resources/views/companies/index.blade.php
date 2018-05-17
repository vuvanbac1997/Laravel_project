@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" > Công Ty <a class="btn btn-primary float-right" href="/companies/create" >Thêm công ty</a></div>
                <div class="card-body">
                  <ul class="list-group">
                    @foreach ($company as $congty)
                      <li class="list-group-item"><a href="/companies/{{$congty->id}}">{{$congty->name}}</li>
                    @endforeach  
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection