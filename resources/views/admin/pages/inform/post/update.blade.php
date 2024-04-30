@extends('admin.layout.main')

@section('content-admin')
  <div class="container-fluid">
    <div class="nk-content-inner">
      <div class="nk-content-body">
        <div class="nk-block nk-block-lg">
          <div class="nk-block-head">
            <div class="nk-block-head-content">
              <h4 class="nk-block-title">{{ $heading }}</h4>
            </div>
          </div>
          <div class="card ">
            <div class="card-inner">
              <form action="{{ url('dashboard/inform/post-car/' . $post->slug) }}" method="post"
                enctype="multipart/form-data">
                @method('PUT')
                @include('admin.pages.inform.post._form', ['data' => $post])
              </form>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
