@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" > Công Ty <a class="btn btn-primary float-right" href="/projects/create" >Thêm dự án</a></div>
                <div class="card-body">
                  <ul class="list-group">
                    @foreach ($project as $project)
                      <li class="list-group-item"><a href="/projects/{{$project->id}}">{{$project->name}}.
                      <span class="badge badge-primary float-right">{{$project->company['name']}}</span></li>
                    @endforeach  
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection