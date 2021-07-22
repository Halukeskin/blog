@extends('front.layouts.master')
@section('content')
@section('title','Anasayfa')
@include('front.widget.categorywidget')

                <div class="col-md-7 mx-auto">
                  @include('front.widget.articleList')
                </div>

              @endsection
