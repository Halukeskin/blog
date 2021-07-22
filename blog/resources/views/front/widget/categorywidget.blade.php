@isset($categories)
<div class="col-md-3">
  <div class="card">
    <div class="card-header">
      Kategoriler
    </div>
    <div class="list group">
      @foreach($categories as $category)
      <a href="{{route('category',$category->slug)}}" class="list-group-item @if(Request::segment(2)==$category->slug )active @endif list-group-item-action">{{$category->name}}
        <span class="badge badge-primary badge-pill  bg-danger text-white " style="float:right; width:40px; border-radius:20px;">{{$category->articleCount()}}</span> </a>
  @endforeach
    </div>
  </div>
</div>
@endif
