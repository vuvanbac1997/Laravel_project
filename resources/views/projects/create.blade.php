@extends('layouts.app')
@section('content')
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="row">
      <div class ="col-md-9 col-lg-9 col-sm-3 pull-left">
        <div class="col-md-12 col-lg-12 col-sm-12" style="background: white, margin:10px;">
          <a href="/projects/" class="pull-right btn btn-secondary ">Trở về</a>
          <hr>
          <form method="post" action ="{{route('projects.store')}}">
              {{ csrf_field() }}
              
              <div class="form-group">
                <label for="project-name">Tên dự án<span class="required">*</span></label>
                <input placeholder ="Nhập tên"
                       id = "project-name"
                       required
                       name="name"
                       spellcheck="false"
                       class = "form-control"
                       
                       />
              </div>

              <div class="form-group">
                <label for="project-content">Mô tả  dự án</label>
                <textarea 
                       placeholder ="Nhập mô tả"
                       id = "project-content"
                       style="resize: vertical;" 
                       name="description"
                       row="S"
                       spellcheck="false"
                       class = "form-control autosize-target text-left">
                       
                     </textarea>   
              </div>
              <div class="form-group">
                <label for="project-days">Số ngày</span></label>
                <input placeholder ="Nhập số ngày"
                       id = "project-days"
                       required
                       name="days"
                       spellcheck="false"
                       class = "form-control"
                       />
              </div>
              <div class="form-group">
                <label for="status">Công ty</label>
                    <select class="form-control" name="company_id" id="company_id" required="">
                        @foreach ($company as $company)
                          <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach 
                    </select>
              </div>
              <div class="form-group">
                <input type="submit" class ="btn btn-primary" value="Thêm">
              </div>
            
          </form>
            
        </div>

      </div> <!-- /container -->

      <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
            <div class = "card" >
              <div class="card-header"><h4 style="padding-top: 10px">Hoạt động</h4></div>
                <div class="card-body">
                  <ol class="list-unstyled">
                    <li class="list-group-item"><a href="/projects/">Công ty của tôi</a></li>
                    
                  </ol>
                </div>
            </div>
           
      </div>
      </div>
  @endsection