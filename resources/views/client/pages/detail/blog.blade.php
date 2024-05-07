@extends('client.layout.main')
@section('content-client')
  <!-- SINGLE POST
                                 ============================================= -->
  <section id="single-post" class="pb-90 inner-page-hero blog-page-section">
    <div class="container">
      <div class="row justify-content-center">


        <!-- SINGLE POST CONTENT -->
        <div class="col-xl-10">
          <div class="post-content">


            <!--  SINGLE POST TITLE -->
            <div class="single-post-title text-center">

              <!-- Post Tag -->
              <span class="post-tag color--green-400">{{ $blog->category->name ?? 'Blog' }}</span>

              <!-- Title -->
              <h2 class="s-46 w-700">{{ $blog->title }}</h2>
            </div> <!-- END SINGLE POST TITLE -->

            <!-- SINGLE POST IMAGE -->
            <div class="blog-post-img py-50">
              <img class="img-fluid r-16" src="{{ asset('storage/assets/image/' . $blog->photo) }}" alt="blog-post-image">
            </div>
            <!-- SINGLE POST TEXT -->
            <div class="single-post-txt">

              {!! $blog->description !!}
            </div> <!-- END SINGLE POST TEXT -->
          </div>
        </div> <!-- END  SINGLE POST CONTENT -->


      </div> <!-- End row -->
    </div> <!-- End container -->
  </section> <!-- END SINGLE POST -->
@endsection
