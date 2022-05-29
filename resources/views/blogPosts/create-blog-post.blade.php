@extends('layout')
@section('head')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
@endsection
@section('main')
    <main class="container" style="background-color: #fff;">
        <section id="contact-us">
            <h1 style="padding-top: 50px;">{{__('Create New Meal')}}</h1>
            @include('includes.flash-message')
            <!-- Contact Form -->
            <div class="contact-form">
                <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Title -->
                    <label for="title"><span>{{__('Title')}}</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" />
                    @error('title')
                        {{-- The $attributeValue field is/must be $validationRule --}}
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror
                    <!-- Image -->
                    <label for="image"><span>{{__('Image')}}</span></label>
                    <input type="file" id="image" name="image" />
                    @error('image')
                        {{-- The $attributeValue field is/must be $validationRule --}}
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror
                    <!-- -->

                <label for="price"><span>{{__('Price')}}</span></label>
                <input type="text" id="price" name="price" value="{{ old('price') }}" />
                @error('price')
                    {{-- The $attributeValue field is/must be $validationRule --}}
                    <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                @enderror

                <label for="cal"><span>{{__('cal')}}</span></label>
                <input type="text" id="cal" name="cal" value="{{ old('cal') }}" />
                @error('cal')
                    {{-- The $attributeValue field is/must be $validationRule --}}
                    <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                @enderror

                    <!-- Drop down -->
                    <label for="categories"><span>{{__('Choose a category:')}}</span></label>
                    <select name="category_id" id="categories">
                        <option selected disabled>{{__('Select option')}}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        {{-- The $attributeValue field is/must be $validationRule --}}
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror

                    <!-- Body-->
                    <label for="desription"><span>desription</span></label>
                    <textarea id="desription" name="desription">{{ old('desription') }}</textarea>
                    @error('desription')
                        {{-- The $attributeValue field is/must be $validationRule --}}
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror
                    <!-- Button -->
                    <input type="submit" value="Submit" />
                </form>
            </div>

        </section>
    </main>
@endsection

