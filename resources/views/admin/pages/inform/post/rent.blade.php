@extends('admin.layout.main')

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
          <div class="card card-preview">
            <div class="card-inner">
              <table class="datatable-init table " data-auto-responsive="false">
                <thead>
                  <tr>
                    <th class="nk-tb-col nk-tb-col-check">
                      #
                    </th>
                    <th class="nk-tb-col">Sewa</th>
                    <th class="nk-tb-col tb-col-mb">Harga</th>
                    <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($collection as $item)
                    <tr class="">
                      <td class="nk-tb-col">
                        {{ $no++ }}
                      </td>
                      <td class="nk-tb-col"><span class="">{{ $item->rent }}</span></td>
                      <td class="nk-tb-col tb-col-mb"><span class="">{{ formatIDR($item->fee) }}</span>
                      </td>
                      <td class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">
                          <li>
                            <div class="dropdown">
                              <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                              <div class="dropdown-menu dropdown-menu-end">
                                <ul class="link-list-opt no-bdr">
                                  <li><a href="javascript:void(0);" data-id={{ $item->id }} class="update"><em
                                        class="icon ni ni-pen"></em><span>Edit</span></a></li>
                                  <li><a href="javascript:void(0);" data-url="inform/rent"
                                      data-identity={{ $item->id }} class="delete"><em
                                        class="icon ni ni-trash"></em><span>Delete</span></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  @endforeach

                </tbody>
              </table>
            </div><!-- .card-preview -->
          </div> <!-- nk-block -->
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" tabindex="-1" id="change-modal">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
          <em class="icon ni ni-cross"></em>
        </a>
        <div class="modal-header">
          <h5 class="modal-title">Ubah Sewa</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="form-group col-md-12">
              <label class="form-label">Sewa <small class="text-danger">*</small></label>
              <input type="text" class="form-control" id="rent" name="rent" placeholder="1 Hari">
              <input type="hidden" name="id">
            </div>
            <div class="form-group col-md-12">
              <label class="form-label">Biaya</label>
              <input type="text" class="form-control" name="fee" placeholder="fee" id="fee">
            </div>

          </div>
        </div>
        <div class="modal-footer bg-light">
          <button class="btn save btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>

  @push('customJs')
    <script>
      let csrfToken = $('meta[name="csrf-token"]').attr("content");
    </script>
    <script src="{{ asset('custom/js/utils/delete.js') }}"></script>
    <script src="{{ asset('custom/js/inform/rent.js') }}"></script>
  @endpush
@endsection
