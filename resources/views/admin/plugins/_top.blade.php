<meta charset="utf-8">
<meta name="author" content="ZCH">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="{{ appSetting()->description }}">
<!-- Fav Icon  -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="shortcut icon" href="{{ asset('storage/assets/logo/' . appSetting()->logo) }}">
<!-- Page Title  -->
<title>{{ $title ?? '' }} - {{ appSetting()->name }}</title>
<link rel="stylesheet" href="{{ asset('admin/assets/css/dashlite.css?ver=3.0.3') }}">
<link id="skin-default" rel="stylesheet" href="{{ asset('admin/assets/css/theme.css?ver=3.0.3') }}">
{{-- <link id="skin-default" rel="stylesheet" href="{{ asset('admin/custom/spinner.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('admin/trix/trix.css') }}">
<link href="{{ asset('admin/filepond/filepond.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('custom/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('custom/css/spanner.css') }}">
<link id="skin-default" rel="stylesheet" href="{{ asset('admin/assets/css/editors/summernote.css') }}"
