@extends('layouts.app')

@section('title')
@if(isset($type)) {{ $subjects[$type] }} @else blogs  @endif
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
              @foreach($blogs as $blog)
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="row">
                      <p class="text-left col-md-4 header text-capitalize">
                      @if(Auth::check())
                        <a href="{{ URL::route('getupdate', ['id'=>$blog->id]) }}" ><span class="glyphicon glyphicon-pencil"></span></a>
                      @endif

                    {{ $blog->title}}</p>
                      <p class="text-center col-md-4 header">{{ $subjects[$blog->subject_id]}}</p>
                      <p class="text-right col-md-4 header">{{ $blog->date}}

                      </p>



                    </div>
                  </div>
                  <div class="panel-body">
                      {!! $blog->Text !!}
                  </div>
                </div>
              @endforeach
              {!! $blogs->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
