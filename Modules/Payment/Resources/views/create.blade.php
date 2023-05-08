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

                   Payment

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

                                    id="kt_careers_form" action="{{ route('payment.store') }}"

                                    enctype='multipart/form-data'>

                                    <!--begin::Input group-->

                                    @csrf

                                    <div class="row mb-5">

                                        <!--begin::Col-->

                                        

                                        <!--end::Col-->

                                        <!--begin::Col-->

                                      

                                        <div class="col-md-6 fv-row fv-plugins-icon-container">

                                            <!--begin::Label-->

                                            <label class="required fs-5 fw-semibold mb-2">Searial Name</label>

                                            <!--end::Label-->

                                            <!--begin::Input-->

                                            <input type="text" class="form-control form-control-solid" placeholder=""

                                                name="searial_number" value="{{ old('searial_number') }}">

                                            @if($errors->has('searial_number'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('searial_number') }}</div>

                                            @endif



                                            <!--end::Input-->

                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                        </div>
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">

                                            <!--begin::Label-->

                                            <label class="required fs-5 fw-semibold mb-2">Date</label>

                                            <!--end::Label-->

                                            <!--begin::Input-->

                                            <input type="text" class="form-control form-control-solid date" placeholder=""

                                                name="payment_date" value="{{ old('payment_date') }}" readonly>

                                            @if($errors->has('payment_date'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('payment_date') }}</div>

                                            @endif



                                            <!--end::Input-->

                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                        </div>
                                        
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">

                                            <!--begin::Label-->

                                            <label class="required fs-5 fw-semibold mb-2">Narration</label>

                                            <!--end::Label-->

                                            <!--begin::Input-->

                                            <input type="text" class="form-control form-control-solid" placeholder=""

                                                name="narration" value="{{ old('narration') }}" >

                                            @if($errors->has('narration'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('narration') }}</div>

                                            @endif



                                            <!--end::Input-->

                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                        </div>
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">

                                            <!--begin::Label-->

                                            <label class="required fs-5 fw-semibold mb-2">Party</label>

                                            <!--end::Label-->

                                            <!--begin::Input-->
                                    <select class="form-control form-control-solid" name="party_id">
                                        <option>Select Party</option>
                                        @foreach($parties as $party)
                                        <option value="{{$party->id}}">{{$party->name}}</option>
                                        @endforeach
                                    </select>

                                            @if($errors->has('party_id'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('party_id') }}</div>

                                            @endif



                                            <!--end::Input-->

                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                        </div>
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">

                                            <!--begin::Label-->

                                            <label class="required fs-5 fw-semibold mb-2">Bank</label>

                                            <!--end::Label-->

                                            <!--begin::Input-->
                                    <select class="form-control form-control-solid" name="bank_id">
                                        <option>Select Bank</option>
                                        @foreach($banks as $bank)
                                        <option value="{{$bank->id}}">{{$bank->name}}</option>
                                        @endforeach
                                    </select>

                                            @if($errors->has('bank_id'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('bank_id') }}</div>

                                            @endif



                                            <!--end::Input-->

                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                        </div>

<div class="col-md-6 fv-row fv-plugins-icon-container">

<!--begin::Label-->

<label class="required fs-5 fw-semibold mb-2">Amount</label>

<!--end::Label-->

<!--begin::Input-->

<input type="text" class="form-control form-control-solid" placeholder=""

    name="amount" value="{{ old('amount') }}" >

@if($errors->has('amount'))

    <div class="text-danger fs-7 fw-bold">

        {{ $errors->first('amount') }}</div>

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

