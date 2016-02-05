@extends('layouts.app')

@section('title')
create
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                  {!!(isset($old)? 'update blog' :'nieuw blog stuk')!!}

                </div>
                <div class="panel-body">

              {{ Form::open(array('url' => URL::route($route), 'method' => 'post','files' => true)) }}

              <div class="form-group">
                {{ Form::label('title', 'Titel',['class' => 'text-capitalize']) }}<br>
                {{ Form::text('title',(isset($old)? $old->title : null),['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('subject', 'subject',['class' => 'text-capitalize']) }}<br>
                {{ Form::select('subject', $subjects,(isset($old)? $old->subject_id : 2),['class' => 'form-control']) }}
              </div>

              <div class="form-group">
                {{ Form::label('date', 'datum',['class' => 'text-capitalize']) }}<br>
                {{ Form::date('date',(isset($old)? $old->date : \Carbon\Carbon::now()),null,['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                {{ Form::label('text', 'text',['class' => 'text-capitalize']) }}
                {{ Form::textarea('text',(isset($old)? $old->Text : null),['class' => 'form-control']) }}
              </div>
              @if(isset($old))
                {{Form::hidden('blog_id',$old->id )}}
              @endif


                {{ Form::submit() }}
                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection
