@can('accept',$model)
    <a title="Mark this answer as best" class="mt-2"
       onclick="event.preventDefault(); document.getElementById('accept-answer-{{$model->id}}').submit();">
        <i class="fas fa-check fa-2x {{$model->status}}"></i>
    </a>
    <form id="accept-answer-{{$model->id}}" method="POST" action="{{route('answers.accept',$model->id)}}" style="display: none">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
@else
    @if($model->is_best)
        <a title="The question owner accepted this answer as best" class="mt-2">
            <i class="fas fa-check fa-2x {{$model->status}}"></i>
        </a>
    @endif
@endcan