@extends('layouts.app')

@section('content')
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="row">
      <div class="col-lg-9 float left">
        <div class="jumbotron">
          <div class="container">
            <a href="/companies" class="btn btn-secondary ">Trở về</a>
            <h1 class="display-3">{{$company->name}}</h1>
            <p>{{$company->description}}</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
          </div>
        </div>
        <div class="container">
          <div class="row">@foreach ($company->project as $project)
            <div class="col-md-4">
              <h2>{{$project->name}}</h2>
              <p>{{$project->description}}</p>
              <p><a class="btn btn-info" href="/projects/{{$project->id}}" role="button">Xem thông tin »</a></p>
            </div>
            @endforeach
          </div>
        </div>
      </div> 

      <div class="col-lg-3 float-right">
        <div class = "card ">
          <div class="card-header card bg-dark text-white"><h4 style="padding-top: 10px">Hoạt động</h4></div>
            <div class="card-body">
              <ol class="list-unstyled">
                <li class="list-group-item"><a href="/companies/{{$company->id}}/edit">Sửa Thông tin</a></li>
                <li class="list-group-item">
                  <a href="#" 
                    onclick="var result =confirm('Bạn có chắc muốn xóa dự án này?');
                      if (result){
                        //Ngăn trình duyệt không xử lý sự kiện click theo như mặc định
                          //event.preventDefault();
                          document.getElementById('delete-form').submit();
                      }
                    ">

                    Xóa dự án
                  </a>
                  <form id="delete-form" action="{{route('companies.destroy', [$company->id])}}" method="post" style="display: none;">
                      <input type="hidden" name="_method" value="delete">
                      {{ csrf_field() }}
                  </form>
                </li>
              </ol>
            </div>
        </div>
      </div>
      </div>
  @endsection