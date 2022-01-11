@extends('layouts.header')
@section('content')
    <div class="container-fluid pt-5"  style="min-height: calc(100vw * (9/16));">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @auth
                        <a href="{{ url('articles/new') }}" class="btn btn-primary">Make a New Article</a>
                    
                    @endauth
                    <div class="row pt-5">
                       
                            <span class="border  shadow-lg">
                                <div class="d-flex bd-highlight ">
                                    <div class="p-2 w-100 bd-highlight"><h2>#{{$last->id.'-'.$last->title}}</h2>
                                        {!!$last->content!!}</div>
                                    <div class="p-2 bd-highlight"><img src="{!! asset('/img-articles/').'/'.$last->image!!}" alt="" class="float-right"></div>
                                  </div>
                            </span>
                    </div>

                    <div class="row pt-5 pb-5">
                        @foreach($posts as $r)
                        
                            <div class="col-lg-6 col-sm-12 pt-3">
                                <h2>#{{$r->id.'-'.$r->title}}</h2>
                                    {!!$r->content!!}
                                @auth
                                <br>
                                <a href="{{ url('articles/edit/'.$r->id)}}">Edit</a>
                                <a href="{{ url('articles/delete/'.$r->id)}}">Delete</a>
                                @endauth
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop