@extends('layout')

@section('main')
    <!-- main -->
    <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"
></script>
    <main class="container">
        <h2 class="header-title">{{__('All Meals')}}</h2>
       @include('includes.flash-message')
        <div class="searchbar">
            <form action="">
                <input type="text" placeholder="{{__('Search...')}}" name="search" />

                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>

            </form>
        </div>
        <div class="categories">
            <ul>
                @foreach ($categories as $category)
                    <li><a href="{{route('blog.index', ['category' => $category->name ])}}">{{ $category->name }}</a></li>
                    
                @endforeach
            </ul>
        </div>
        <section class="cards-blog latest-blog">
            
            @forelse($posts as $post)
                <div class="card-blog-content">
                    <img src="{{ asset($post->imagePath) }}" alt="" style=" border-radius: 10px;"  />
                    @auth
                        @if (auth()->user()->id === $post->user->id)
                            <div class="post-buttons">
                                <a href="{{ route('blog.edit', $post) }}">Edit</a>
                                <form action="{{ route('blog.destroy', $post) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value=" Delete">
                                </form>
                            </div>
                        @endif
                    @endauth
                   
                    
                    <h4>
                       {{ $post->title }}
                    </h4>
                    <h4>
                        {{ $post->price }} RS
                     </h4>
                     <h4>
                        {{ $post->cal }} cal
                     </h4>
                     <h4>
                        {{ $post->desription }} 
                     </h4>
                </div>
            @empty
                <p>{{__('Sorry, there are no foods with this name !')}}</p>
            @endforelse

        </section>
        <!-- pagination -->

        {{ $posts->links('pagination::default') }}
        <br>
    @endsection
