@extends('front.layouts.master')
@section('content')
@section('title',$page->title)
@section('bg',$page->image)
          <div class="col-md-10 col-lg-8 col-xl-7">
            {!! $page->content !!}  
          </div>

              @endsection
