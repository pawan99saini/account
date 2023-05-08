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

                   Billing

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

                                    id="kt_careers_form" action="{{ route('billing.store') }}"

                                    enctype='multipart/form-data'>

                                    <!--begin::Input group-->

                                    @csrf

                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">

                                            <!--begin::Label-->

                                            <label class="required fs-5 fw-semibold mb-2">Company Name</label>

                                            <!--end::Label-->

                                            <!--begin::Input-->

                                            <input type="text" class="form-control form-control-solid" placeholder=""

                                                name="company_name" value="{{ old('company_name') }}">

                                            @if($errors->has('company_name'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('company_name') }}</div>

                                            @endif



                                            <!--end::Input-->

                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                        </div> 
                                        
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Address Line 1</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea  class="form-control form-control-solid ckeditor" placeholder=""

                                                name="address_1" >{{ old('address_1') }}</textarea>

                                            @if($errors->has('address_1'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('address_1') }}</div>

                                            @endif
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div> 
                                        
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Address Line 2</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea  class="form-control form-control-solid ckeditor" placeholder=""

                                                name="address_2" >{{ old('address_2') }}</textarea>

                                            @if($errors->has('address_2'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('address_2') }}</div>

                                            @endif
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div> 
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Country</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                            <select name="country_id" class="form-control form-control-solid" onchange="GetState(this)" id="country_id">
                                                <option value="">Select Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{$country->id}}" {{$country->id==old('country_id') ? 'selected' : ''}}>{{$country->name}}</option>
                                                @endforeach
                                            </select>

                                        @if($errors->has('country_id'))

                                            <div class="text-danger fs-7 fw-bold">

                                                {{ $errors->first('country_id') }}</div>

                                        @endif
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">State</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                            <select name="state_id" class="form-control form-control-solid" id="state_id" onchange="getCity(this)">
                                                <option></option>
                                                
                                            </select>

                                        @if($errors->has('state_id'))

                                            <div class="text-danger fs-7 fw-bold">

                                                {{ $errors->first('state_id') }}</div>

                                        @endif
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div> 
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">City</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                            <select name="city_id" class="form-control form-control-solid" id="city_id">
                                                <option></option>
                                                
                                            </select>

                                        @if($errors->has('city_id'))

                                            <div class="text-danger fs-7 fw-bold">

                                                {{ $errors->first('city_id') }}</div>

                                        @endif
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Pincode</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""

                                                name="pincode" value="{{ old('pincode') }}">

                                            @if($errors->has('pincode'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('pincode') }}</div>

                                            @endif
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Phone Number</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""

                                                name="phone" value="{{ old('phone') }}">

                                            @if($errors->has('phone'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('phone') }}</div>

                                            @endif
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Email</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""

                                                name="email" value="{{ old('email') }}">

                                            @if($errors->has('email'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('email') }}</div>

                                            @endif
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-semibold mb-2">Website</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""

                                                name="website" value="{{ old('website') }}">

                                            @if($errors->has('website'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('website') }}</div>

                                            @endif
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-semibold mb-2">GSTIN</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""

                                                name="gstin" value="{{ old('gstin') }}">

                                            @if($errors->has('gstin'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('gstin') }}</div>

                                            @endif
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        
                                        
                                        
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-semibold mb-2">Pan</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""

                                                name="pan" value="{{ old('pan') }}">

                                            @if($errors->has('pan'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('pan') }}</div>

                                            @endif
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>                                     
                                        
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-semibold mb-2">Logo</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="file" class="form-control form-control-solid" placeholder=""

                                                name="logo">

                                            @if($errors->has('logo'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('logo') }}</div>

                                            @endif
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-semibold mb-2">Bank Details</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea class="form-control form-control-solid ckeditor" placeholder=""

                                                name="bank_details">{{ old('bank_details') }}</textarea>

                                            @if($errors->has('bank_details'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('bank_details') }}</div>

                                            @endif
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-semibold mb-2">Note</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea class="form-control form-control-solid ckeditor" placeholder=""

                                                name="note">{{ old('note') }}</textarea>

                                            @if($errors->has('note'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('note') }}</div>

                                            @endif
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>

                                         <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Invoice Number</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                          <div class="row">
                                            <div class="col-md-3">
                                            <label class="required fs-5 fw-semibold mb-2">Preffix</label>

                                            <input type="text" class="form-control form-control-solid" placeholder=""

                                                    name="preffix" value="{{ old('preffix') }}">

                                                    @if($errors->has('preffix'))

                                                    <div class="text-danger fs-7 fw-bold">

                                                        {{ $errors->first('preffix') }}</div>

                                                    @endif
                                                    <!--end::Input-->
                                            </div> 
                                            <div class="col-md-3">
                                            <label class="required fs-5 fw-semibold mb-2">Autonumber</label>

                                            <input type="text" class="form-control form-control-solid" placeholder=""

                                                    name="order_no" value="{{$order_no}}" readonly>

                                                    
                                                    <!--end::Input-->
                                            </div>
                                            <div class="col-md-3">
                                            <label class="required fs-5 fw-semibold mb-2">Suffix</label>

                                            <input type="text" class="form-control form-control-solid" placeholder=""

                                                    name="suffix" value="{{$y}}" readonly>

                                                    @if($errors->has('suffix'))

                                                    <div class="text-danger fs-7 fw-bold">

                                                        {{ $errors->first('suffix') }}</div>

                                                    @endif
                                                    <!--end::Input-->
                                            </div>
                                              </div>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>  
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-semibold mb-2">Proforma notes</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea  class="form-control form-control-solid ckeditor" placeholder=""

                                                name="pi_notes" >{{ old('pi_notes') }}</textarea>

                                            @if($errors->has('pi_notes'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('pi_notes') }}</div>

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

