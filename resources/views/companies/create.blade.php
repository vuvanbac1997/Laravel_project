@extends('layouts.app')

@section('content')
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="row">
      <div class ="col-md-9 col-lg-9 col-sm-3 pull-left">
        <div class="col-md-12 col-lg-12 col-sm-12" style="background: white, margin:10px;">
          <form method="post" action ="{{route('companies.store')}}">
              {{ csrf_field() }}
              
              <div class="form-group">
                <label for="company-name">Tên công ty<span class="required">*</span></label>
                <input placeholder ="Enter name"
                       id = "company-name"
                       required
                       name="name"
                       spellcheck="false"
                       class = "form-control"
                       
                       />
              </div>

              <div class="form-group">
                <label for="company-content">Mô tả</label>
                <textarea 
                       placeholder ="Enter Description"
                       id = "company-content"
                       style="resize: vertical;" 
                       name="description"
                       row="S"
                       spellcheck="false"
                       class = "form-control autosize-target text-left">
                       
                     </textarea>
                       
              </div>
              <div class="form-group">
                <input type="submit" class ="btn btn-primary" value="Thêm">
              </div>
            
          </form>
            
        </div>

      </div> <!-- /container -->

      <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
          <!-- <div class="bg-light rounded">
            <h4 class="font-italic" Style="margin-top: 10px">About</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
            <div class = "card" >
              <div class="card-header"><h4 style="padding-top: 10px">Hoạt động</h4></div>
                <div class="card-body">
                  <ol class="list-unstyled">
                    <li class="list-group-item"><a href="/companies/">Công ty của tôi</a></li>
                    
                  </ol>
                </div>
            </div>
            <div class = "card" >
              <div class="card-header"><h4 style="padding-top: 10px">Danh sách công ty</h4></div>
                <div class="card-body">
                  <ol class="list-unstyled">
                    @foreach($company as $company)
                    <li class="list-group-item"><a href="/companies/{{$company->id}}">{{$company->name}}</a></li>
                    @endforeach
                  </ol>
                </div>
            </div>
           
      </div>
      </div>
  @endsection