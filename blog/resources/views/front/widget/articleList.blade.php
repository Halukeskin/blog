@if(count($articles)>0)
  @foreach($articles as $article)
    <div class="post-preview">
        <a href="{{route('single', $article->slug)}}">
            <h2 class="post-title">
              {{$article->title}}
            </h2>
            <img src="{{$article->image}}"
            <h3 class="post-subtitle">
              {{\Illuminate\Support\str::limit($article->content,75)}}
            </h3>
        </a>
        <p class="post-meta">Kategori :
            <a href="#!">{{$article->getCategory->name}}</a>
            <span class="float-right">{{$article->created_at->diffForHumans()}}
        </p>
    </div>
    @if(!$loop->last)
    <hr>
  @endif
  @endforeach

  {{$articles->links("pagination::bootstrap-4")}}
@else
  <div class="alert alert-danger">
    <h1> Bu kategoriye ait yazı yok</h1>
  </div>
@endif
