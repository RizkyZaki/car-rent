@csrf

<div class="row">
  <div class="col-md-6">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Judul</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $data['title'] ?? '' }}"
        onkeyup="createTextSlug()" id="title" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
      @error('title')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror

    </div>
  </div>
  <div class="col-md-6">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Slug <small class="text-danger">Slug Bisa
          Disesuaikan</small></label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug"
        value="{{ $data['slug'] ?? '' }}" id="exampleInputEmail1" aria-describedby="emailHelp">
      @error('slug')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>
  <div class="col-md-6">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Upload Foto</label>
      <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"
        value="{{ $data['photo'] ?? '' }}" id="photo" aria-describedby="emailHelp" accept="image/*">
      @error('photo')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>
  <div class="col-md-6">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Kategori</label>
      <select class="form-select js-select2" name="id_category" data-search="on">
        @foreach ($category as $item)
          <option value="{{ $item->id }}"
            {{ isset($post['id_category']) && $post['id_category'] == $item->id ? 'selected' : '' }}>{{ $item->name }}
          </option>
        @endforeach
      </select>
    </div>
  </div>
</div>


<div class="mb-3">
  <label for="inputText">Deskripsi</label>
  <textarea class="form-control summernote @error('description') is-invalid @enderror" name="description" id="description"
    value="{{ $data['description'] ?? '' }}">{{ $data['description'] ?? '' }}</textarea>
  @error('description')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<button class="btn btn-primary">Simpan</button>
@push('customJs')
  <script>
    $(document).ready(function() {
      $("textarea.summernote").summernote({
        placeholder: "Description",
        tabsize: 2,
        height: 150,
        toolbar: [
          ["style", ["style"]],
          ["font", ["bold", "italic", "underline", "clear"]],
          ["font", ["strikethrough", "superscript", "subscript"]],
          ["fontname", ["fontname"]],
          ["fontsize", ["fontsize"]],
          ["color", ["color"]],
          ["para", ["ul", "ol", "paragraph"]],
          ["height", ["height"]],
        ],
      });
    });

    function createTextSlug() {
      var title = $('#title').val();
      $('#slug').val(generateSlug(title));
    }

    function generateSlug(text) {
      return text.toString().toLowerCase()
        .replace(/^-+/, '')
        .replace(/-+$/, '')
        .replace(/\s+/g, '-')
        .replace(/\-\-+/g, '-')
        .replace(/[^\w\-]+/g, '');
    }
  </script>
@endpush
