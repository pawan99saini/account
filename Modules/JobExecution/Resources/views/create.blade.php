@extends('layout.master-layout')
@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">

    <!--begin::Content wrapper-->

    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->

        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">

            <!--begin::Toolbar container-->

            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">

                <!--begin::Page name-->

                <div class="page-name d-flex flex-column justify-content-center flex-wrap me-3">

                    <!--begin::Title-->

                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">

                   Job Execution

                    </h1>

                    <!--end::Title-->

                    <!--begin::Breadcrumb-->

                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">

                        <!--begin::Item-->

                        <li class="breadcrumb-item text-muted">

                            <a href="{{url('dashboard')}}" class="text-muted text-hover-primary">Home</a>

                        </li>

                        <!--end::Item-->

                        <!--begin::Item-->

                        <li class="breadcrumb-item">

                            <span class="bullet bg-gray-400 w-5px h-2px"></span>

                        </li>

                        <!--end::Item-->

                        <!--begin::Item-->

                        <!--end::Item-->

                        <!--end::Item-->

                    </ul>

                    <!--end::Breadcrumb-->

                </div>

                <!--end::Page title-->



            </div>

            <!--end::Toolbar container-->

        </div>

        <!--end::Toolbar-->

        <!--begin::Content-->

        <div id="kt_app_content" class="app-content flex-column-fluid">

            <!--begin::Content container-->

            <div id="kt_app_content_container" class="app-container container-xxl">



                <div class="card">

                    <!--begin::Body-->

                    <div class="card-body p-lg-17">



                        <!--begin::Layout-->

                        <div class="d-flex flex-column flex-lg-row mb-17">

                            <!--begin::Content-->

                            <div class="flex-lg-row-fluid me-0 me-lg-20">

                                <!--begin::Form-->

                                <form class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" method="POST"

                                    id="kt_careers_form" action="{{ route('jobexecution.store') }}"

                                    enctype='multipart/form-data'>

                                    <!--begin::Input group-->

                                    @csrf

                                    <div class="row mb-5">

                                        <!--begin::Col-->

                                        

                                        <!--end::Col-->

                                        <!--begin::Col-->

                                      

                                        <div class="col-md-12 fv-row fv-plugins-icon-container">

                                            <!--begin::Label-->

                                            <label class="required fs-5 fw-semibold mb-2">Name</label>

                                            <!--end::Label-->

                                            <!--begin::Input-->

                                            <input type="text" class="form-control form-control-solid" placeholder=""

                                                name="name" value="{{ old('name') }}">

                                            @if($errors->has('name'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('name') }}</div>

                                            @endif



                                            <!--end::Input-->

                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                        </div>


                
                                       

                                        
  <div class="col-md-6 fv-row fv-plugins-icon-container">

<!--begin::Label-->

<label class="required fs-5 fw-semibold mb-2">Status</label>

<!--end::Label-->

<!--begin::Input-->

<div class="col-3">
<span class="switch switch-outline switch-icon switch-success">
<label>
<input type="checkbox"  {{ old('status') ? 'checked' : '' }} name="status">
<span></span>
</label>
</span>
</div>
@if($errors->has('status'))

<div class="text-danger fs-7 fw-bold">

    {{ $errors->first('status') }}</div>

@endif

<!--end::Input-->

<div class="fv-plugins-message-container invalid-feedback"></div>

</div>
                                    </div>

                                    <!--end::Input group-->

                                    <!--begin::Separator-->

                                    <div class="separator mb-8"></div>

                                    <!--end::Separator-->

                                    <!--begin::Submit-->

                                    <button type="submit" class="btn btn-primary" id="kt_careers_submit_button">

                                        <!--begin::Indicator label-->

                                        <span class="indicator-label">Submit</span>

                                        <!--end::Indicator label-->

                                        <!--begin::Indicator progress-->

                                        <span class="indicator-progress">Please wait...

                                            <span

                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>

                                        <!--end::Indicator progress-->

                                    </button>

                                    <!--end::Submit-->

                                </form>

                                <!--end::Form-->



                            </div>

                            <!--end::Content-->



                        </div>

                        <!--end::Layout-->



                    </div>

                    <!--end::Body-->

                </div>

            </div>

            <!--end::Content container-->

        </div>

        <!--end::Content-->

    </div>

    <!--end::Content wrapper-->





</div>

@endsection

