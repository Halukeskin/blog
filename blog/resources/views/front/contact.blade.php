@extends('front.layouts.master')
@section('content')
@section('title','iletişim')
@section('bg','http://d2vision.com/blog/img/contact-bg.jpg')
<article class="mb-4">
  <main class="mb-4">
      <div class="container px-4 px-lg-5">
          <div class="row gx-4 gx-lg-5 justify-content-center">
              <div class="col-md-10 col-lg-8 col-xl-7">
                @if(session('success'))
                <div class="alert alert-success">
                  {{session('success')}}
                </div>
              @endif
              @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li> {{$error}} </li>
                    @endforeach
                  </ul>
                </div>
              @endif
                  <p>Bizimle iletişime geçebilirsiniz.</p>
                  <div class="my-5">
                      <form method="post" action="{{route('contact.post')}}">
                        @csrf
                          <div class="form-floating">
                              <input class="form-control"  name="name" type="text"  value="{{old('name')}}" placeholder="Adınız Soyadınız" required />
                              <label >Ad Soyad</label>
                          </div>
                          <div class="form-floating">
                              <input class="form-control"  name="email" type="email" value="{{old('email')}}" placeholder="Email Adresiniz" required />
                              <label >Email Adresi</label>
                          </div>
                          <div class="form-floating">
                              <label >Konu</label>

                          </div>
                          <div class="form-floating">
                              <textarea class="form-control"  name="message" value="{{old('message')}}" placeholder="Mesajınız" style="height: 12rem" required></textarea>
                              <label >Mesajınız</label>
                          </div>
                          <br />

                          <div class="d-none" id="submitSuccessMessage">
                              <div class="text-center mb-3">
                                  <div class="fw-bolder">Form submission successful!</div>
                                  To activate this form, sign up at
                                  <br />
                                  <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                              </div>
                          </div>
                          <button class="btn btn-primary text-uppercase enabled" id="submitButton" type="submit">Gönder</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </main>
              @endsection
