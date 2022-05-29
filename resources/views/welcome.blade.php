@extends('layout')

@section('header')
    <!-- header -->
    <header class="header" style=" background-image: url({{asset("images/photography.jpg")}});">
      <div class="header-text">
        <h1>مطاعم قصر الهند</h1>
        <h4>نتشرف بخدمتكم</h4>
      </div>
      <div class="overlay"></div>
    </header>
  
@endsection

@section('main')
    <!-- main -->
    <main class="container">
      <h2 class="header-title">قصر الهند</h2>
      <section class="cards-blog latest-blog">
        @foreach ($posts as $post )
        <div class="card-blog-content">
     
    
        
       </div>
        @endforeach
      </section>
    </main>
@endsection