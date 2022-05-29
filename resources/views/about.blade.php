@extends('layout')

@section('main')
  
    <!-- main -->
    <main class="container">
      <section class="single-blog-post">
        <h1>{{__('About Me')}}</h1>
        <div class="single-blog-post-ContentImage" data-aos="fade-left">
          <img src="{{asset('images/photography.jpg')}}" alt="" />
        </div>

        <div>
          <p class="about-text">
            {{__('if you re keen about savouring every flavour and taste of your meals then Indian palace is the place to be! With over 14 years of serving the best in food experience to several customers, Indian palace has not relented in its efforts to provide the delicious goodness at all times. Led by a team of culinary experts Indian palace focuses on providing special delight in Indian and Chinese cuisine with matchless flavours Our dishes stand out having been made from the freshest high-quality ingredients in combination with the perfect mix of home ground spices. We focus on giving a difference in essential taste as well as crafting out signature dishes like (to add list of of some of the main dishes) just for you. Each dishes at the restaurant runs with the perfect complement of full desserts and wonderful fresh drinks which runs in diverse shades of awesomeness')}}
            <br /><br />
            {{__('Indian palace also incorporates for comfort finely chiselled and comfortable interiors for relaxation—as it forms a major part of the restaurant experience. With detailed highlights of unique features, each compartment of our restaurants bears our signature mark of excellence and difference, providing each of our guests with the palace sensation Our highly trained staffs are efficient and effective bearing the perfect ambience to serve you for your desired occasion which can be a family gathering business meet-up friendly dinner and contemporary hang out At the Indian place we believe in creating your moment and treating you right. This is why we are very intentional and dedicated to treating you right. We are solely committed to refining and reinventing your dinner experience.')}}
          </p>
        </div>
      </section>
    </main>
@endsection