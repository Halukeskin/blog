@extends('front.layouts.master')
@section('content')
@section('title',$article->title)
@section('bg',$article->image)
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
          @include('front.widget.categorywidget')

            <div class="col-md-7 mx-auto">
            {!!$article->content!!}
            </div>
            <span class="text-danger "> Okunma Sayısı : <b>{{$article->hit}} </b> </span>
              @endsection
