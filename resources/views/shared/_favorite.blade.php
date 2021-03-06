<a title="Click to mark a favorite question (Click again to undo)"
   class="favorite mt-2 {{Auth::guest()?'off':($model->is_favorited ?'favorited':'')}}"
   onclick="event.preventDefault(); document.getElementById('favorite-question-{{$model->id}}').submit();">
    <i class="fas fa-star fa-2x"></i>
    <span class="favorites-count">{{$model->favorites_count}}</span>
</a>
<form id="favorite-question-{{$model->id}}" method="POST" action="/questions/{{$model->id}}/favorites" style="display: none">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    @if($model->is_favorited)
        {{method_field('DELETE')}}
    @endif
</form>