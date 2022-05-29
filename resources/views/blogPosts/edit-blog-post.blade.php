@extends('layout')
@section('head')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
@endsection
@section('main')
    <main class="container" style="background-color: #fff;">
        <section id="contact-us">
            <h1 style="padding-top: 50px;">{{__('Edit Meal')}}</h1>
            @include('includes.flash-message')
            <!-- Contact Form -->
            <div class="contact-form">
                <form action="{{ route('blog.update', $post) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <!-- Title -->
                    <label for="title"><span>{{__('Title')}}</span></label>
                    <input type="text" id="title" name="title" value="{{ $post->title }}" />
                    @error('title')
                        {{-- The $attributeValue field is/must be $validationRule --}}
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror
                        <!-- Title -->
                        <label for="price"><span>{{__('Price')}}</span></label>
                        <input type="text" id="price" name="price" value="{{ $post->price }}" />
                        @error('price')
                            {{-- The $attributeValue field is/must be $validationRule --}}
                            <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                        @enderror

                        <label for="cal"><span>{{__('cal')}}</span></label>
                        <input type="text" id="cal" name="cal" value="{{ $post->cal }}" />
                        @error('cal')
                            {{-- The $attributeValue field is/must be $validationRule --}}
                            <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                        @enderror

                    <!-- Image -->
                    <label for="image"><span>{{__('Image')}}</span></label>
                    <input type="file" id="image" name="image" value="{{$post->imagePath}}"/>
                    @error('image')
                        {{-- The $attributeValue field is/must be $validationRule --}}
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror
                    <!-- Body-->
                   
                    <!-- Button -->
                    <input type="submit" value="Submit" />
                </form>
            </div>

        </section>
    </main>
@endsection

