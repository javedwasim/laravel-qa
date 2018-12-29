@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">All Questions</div>
                    <div class="panel-body">
                        @foreach($questions as $question)
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mt-0">{{$question->title}}</h3>
                                    {{str_limit($question->body,250)}}
                                </div>
                                <hr>
                            </div>
                        @endforeach
                        <div class="mx-auto">
                            {{$questions->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
