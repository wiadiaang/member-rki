@extends('layout.index')
@push('body')
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">kategori - {{ $data['page'] }}
            </h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="#" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">kategori</li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">{{ $data['page'] }}</li>
            </ul>
        </div>
    </div>
</div>
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Products-->
        <div class="card card-flush">
            <div class="card-body pt-0">
                <form action="{{ $data['action'] }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 <input name="_method" type="hidden" value="{{ $data['method'] }}">
                      <div class='mb-10'>
                    <label class='required form-label'>Kategori</label>
                    <input type='text' class='form-control' name='kategori' value='{{old('kategori', $kategori->kategori)}}'  placeholder='Kategori'>
                </div>
                
                    <input type="submit" value="Submit" id="submit" class="btn btn-primary" />
                </form>
            </div>

        </div>
        <!--end::Products-->
    </div>
    <!--end::Content container-->
</div>
@endpush
