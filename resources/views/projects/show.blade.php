@extends('layouts.app')

@section('content')
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="row">
        <div class ="col-lg-9">
          <div class="jumbotron">
            <a href="/projects" class="pull-right btn btn-secondary ">Trở về</a>
              <h1 class="display-3">{{$project->name}}</h1>
              <p>{{$project->description}}</p>
              <p>{{$project->id}}</p>
              <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> -->
          </div>
          <form method="post" action ="{{route('comments.store')}}">
                  {{ csrf_field() }}

                  <input type="hidden" name="comment_type" value ="Project">
                  <input type="hidden" name="comment_id" value ="{{$project->id}}">

                  <div class="form-group">
                    <label for="company-content">Comment</label>
                    <textarea 
                           placeholder ="Enter Comment"
                           id = "comment-content"
                           style="resize: vertical;" 
                           name="body"
                           row="3"
                           spellcheck="false"
                           class = "form-control autosize-target text-left">
                           
                    </textarea>   
                  </div>
                  <div class="form-group">
                    <label for="company-content">Proof of work done (Url/Photos)</label>
                    <textarea 
                           placeholder ="Enter Url or screenshot"
                           id = "company-content"
                           style="resize: vertical;" 
                           name="url"
                           row="2"
                           spellcheck="false"
                           class = "form-control autosize-target text-left">
                           
                         </textarea>   
                  </div>
                  <div class="form-group">
                    <input type="submit" class ="btn btn-primary" value="Thêm">
                  </div>  
          </form>
        <div class="container">
          <!-- Example row of columns -->
          <div class="col-md-12 col-lg-12 col-sm-12 " style="margin:10px;background-color: white;">
          </div>
        </div>
        <div class="card">
            <div class="card-header" ><h3>Các comment hiện có</h3></div>
            <div class="card-body">
                <ul class="list-group">
                   @foreach ($project->comments as $comment)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="http://www.jquery2dotnet.com/2013/10/google-style-login-page-desing-usign.html">
                                       url: {{$comment->url}}</a>
                                    <div class="mic-info">
                                        By: {{$comment->user['name']}} </a> on {{$comment->created_at}}
                                    </div>
                                </div>
                                <div class="comment-text">
                                    Nội dung: {{$comment->body}}
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                   @endforeach
                </ul>
                <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a>
            </div>
        </div>
      </div> 

        <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
              <div class = "card ">
                <div class="card-header card bg-dark text-white"><h4 style="padding-top: 10px">Hoạt động</h4></div>
                  <div class="card-body">
                    <ol class="list-unstyled">
                      <li class="list-group-item"><a href="/projects/{{$project->id}}/edit">Chỉnh sửa dự án</a></li>
                      <li class="list-group-item"><a href="/projects/create">Thêm dự án</a></li> 

                      @if($project->user_id == Auth::user()->id)
                      <li class="list-group-item">

                        <a href="#" 
                          onclick="var result =confirm('Bạn có chắc muốn xóa dự án này?');
                            if (result){
                                document.getElementById('delete-form').submit();
                            }
                          ">
                          Xóa dự án
                        </a>
                        <form id="delete-form" action="{{route('projects.destroy', [$project->id])}}" method="post" style="display: none;">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}
                          
                        </form>
                      </li>
                      @endif
                    </ol>
                  </div>
              </div>
        </div>
      </div>
  @endsection