@extends('admin.layout.main')
@php
  $benefits = json_decode(appSetting()->benefit, true);
@endphp
@section('content-admin')
  <div class="container-fluid">
    <div class="nk-content-inner">
      <div class="nk-content-body">

        <div class="nk-block nk-block-lg">
          <div class="nk-block-head">
            <div class="nk-block-head nk-block-head-sm">
              <div class="nk-block-between">
                <div class="nk-block-head-content">
                  <h4 class="nk-block-title">{{ $title }}</h4>
                  <p>{{ $heading }}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-inner">

              <div class="gy-3">
                <div class="row g-3 align-center">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label class="form-label">Site Name</label>
                      <span class="form-note">Specify the name of your website.</span>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="form-group">
                      <div class="form-control-wrap">
                        <input type="text" class="form-control" name="name" value="{{ appSetting()->name }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row g-3 align-center">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label class="form-label">Header Title</label>
                      <span class="form-note">Specify the Header Title</span>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="form-group">
                      <div class="form-control-wrap">
                        <input type="text" class="form-control" name="header" value="{{ appSetting()->header }}">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row g-3 align-center">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label class="form-label">Site Keyword</label>
                      <span class="form-note">Specify the Keyword of your website.</span>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="form-group">
                      <div class="form-control-wrap">
                        <input type="text" class="form-control" name="keyword" value="{{ appSetting()->keyword }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row g-3 align-center">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label class="form-label">Site Description</label>
                      <span class="form-note">Specify the description of your website.</span>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="form-group">
                      <div class="form-control-wrap">
                        <input type="text" class="form-control" name="description"
                          value="{{ appSetting()->description }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row g-3 align-center">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label class="form-label">Site Over Rage Text</label>
                      <span class="form-note">Specify the Over Rage Text of your website.</span>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="form-group">
                      <div class="form-control-wrap">
                        <input type="text" class="form-control" name="overrage_text"
                          value="{{ appSetting()->overrage_text }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row g-3 align-center">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label class="form-label">Site Phone</label>
                      <span class="form-note">Specify the Phone of your website.</span>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="form-group">
                      <div class="form-control-wrap">
                        <input type="text" class="form-control" name="phone" value="{{ appSetting()->phone }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row g-3 align-center">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label class="form-label">Redirect Phone</label>
                      <span class="form-note">Specify the Phone of your website.</span>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="form-group">
                      <div class="form-control-wrap">
                        <input type="text" class="form-control" name="contact_phone"
                          value="{{ appSetting()->contact_phone }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row g-3 align-center">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label class="form-label">Site Email</label>
                      <span class="form-note">Specify the Email of your website.</span>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="form-group">
                      <div class="form-control-wrap">
                        <input type="text" class="form-control" name="email" value="{{ appSetting()->email }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row g-3 align-center">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label class="form-label">Site Copyright</label>
                      <span class="form-note">Specify the Copyright of your website.</span>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="form-group">
                      <div class="form-control-wrap">
                        <input type="text" class="form-control" name="text_copyright"
                          value="{{ appSetting()->text_copyright }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row g-3 align-center">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label class="form-label">Benefit</label>
                      <span class="form-note">Specify the Benefit of your website.</span>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="form-group">
                      <div class="form-control-wrap">
                        <select class="form-select tags-select2" data-placeholder="Benefit" name="benefit[]"
                          multiple="multiple" required>
                          @foreach ($benefits as $benefit)
                            <option value="{{ $benefit }}" selected>{{ $benefit }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row g-3 align-center">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label class="form-label">Site Logo</label>
                      <span class="form-note">Logo of your website.</span>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="form-group">
                      <div class="form-control-wrap">
                        <input type="file" class="form-control" name="logo" value="{{ appSetting()->logo }}">
                      </div>
                    </div>
                  </div>
                </div>


              </div>

              <div class="row g-3">
                <div class="col-lg-7 offset-lg-5">
                  <div class="form-group mt-2">
                    <button class="btn save btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Modal Content Code -->

  @push('customJs')
    <script>
      let csrfToken = $('meta[name="csrf-token"]').attr("content");
    </script>
    <script src="{{ asset('custom/js/settings/index.js') }}"></script>
  @endpush
@endsection
