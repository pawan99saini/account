@extends('layout.master-layout')
@section('content')
<style>
    .textarea{
        -webkit-appearance: textarea;
    border: 1px solid gray;
    font: medium -moz-fixed;
    font: -webkit-small-control;
    height: 100px;
    overflow: auto;
    padding: 2px;
    resize: both;
    width: 100%;
    }
</style>
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

                   Proforma Invoice

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

                                    id="kt_careers_form" action="{{ route('proforma-invoice.store') }}"

                                    enctype='multipart/form-data'>

                                    <!--begin::Input group-->

                                    @csrf

                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                         
                                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text"  class="form-control form-control-solid date" 

                                                name="invoice_date"  value="{{ old('invoice_date') }}" readonly>

                                            @if($errors->has('invoice_date'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('invoice_date') }}</div>

                                            @endif
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div> 
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">

                                            <!--begin::Label-->

                                            <label class="required fs-5 fw-semibold mb-2">Billing Entity</label>

                                            <!--end::Label-->

                                            <!--begin::Input-->

                                            <select class="form-control form-control-solid select"  name="billing_id" onchange="getBilling(this)">
                                            <option value="">Select Billing Entity</option>

                                            @foreach($billing as $bill)
                                            <option value="{{$bill->id}}">{{$bill->company_name}}</option>
                                            @endforeach
                                            </select>

                                            @if($errors->has('billing_id'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('billing_id') }}</div>

                                            @endif



                                            <!--end::Input-->

                                            <div class="fv-plugins-message-container invalid-feedback"></div>

                                        </div>
                                         <div class="col-md-6 fv-row fv-plugins-icon-container">

                                            <!--begin::Label-->

                                            <label class="required fs-5 fw-semibold mb-2">Party</label>

                                            <!--end::Label-->

                                            <!--begin::Input-->

                                            <select class="form-control form-control-solid select"  name="party_id" onchange="getParty(this)">
                                            <option value="">Select Party</option>

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
                                            <label class="required fs-5 fw-semibold mb-2">From</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div contenteditable id="from" class="textarea"></div>

                                            
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div> 
                                        
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">To</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div contenteditable id="to" class="textarea"></div>
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div> 
                                        
                                <div class="table-border" id="kt_repeater_1">
                                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                    <thead>
                                    <tr class="fw-bold text-muted">
                                        <th>JOB ID</th>
                                        <th>Category</th>
                                        <th>Service</th>
                                        <th>Duration</th>
                                        <th>SAC</th>
                                        <th>GST</th>
                                        <th>Rate</th>
                                        <th>Remarks</th>
                                        <th></th>
                                </tr>
                                </thead>
                                <tbody class="field_wrapper">
                                @for($i=0;$i<=4;$i++)
                                @php 
                                $required = $i==0 ? 'required' : '';
                                @endphp
                                <tr>
                                    <td><select class="w-100px select" name="invoice[{{$i}}][job_id]" {{$required}}>
                                        <option value="">JOB ID</option>
                                        @foreach($jobs as $job)
                                        <option value="{{$job->id}}">{{$job->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><select class="w-100px select" name="invoice[{{$i}}][category_id]" onchange="getService(this,0)" {{$required}}>
                                        <option value="">Category</option>
                                        @foreach($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                    <td><select class="w-100px select" name="invoice[{{$i}}][service_id]" onchange="serviceDetail(this)" {{$required}}><option value="">Service</option>
                                   
                                </select></td>
                                    <td>
          <div style="display:table-cell;vertical-align:middle;padding-left: 2px;">
          <input class="w-100px date1" name="invoice[{{$i}}][from]" placeholder="From date"></div>

          <div style="text-align:right;display:table-cell;vertical-align:middle;padding-left: 10px;">
          <input class="w-100px date1" name="invoice[{{$i}}][to]" placeholder="To date"></div>
      </td>
                                    <td><input type="text" name="invoice[{{$i}}][sac]" class="w-50px" {{$required}}></td>
                                    <td><input type="number" name="invoice[{{$i}}][gst]" value="0" min="0" class="w-50px" onkeydown="getGst()" {{$required}}></td>
                                    <td><input type="number" name="invoice[{{$i}}][rate]" value="0" min="0" class="w-100px" onkeydown="getRate()" {{$required}}></td>
                                    <td><textarea row="3" name="invoice[{{$i}}][remarks]" class="w-100px"></textarea></td>
                                    
                                <td>
                                    
                                </td>
                                   

                                </tr>
                                @endfor
                                
                                
                                
                                </tbody>
                                </table>
                                
                                </div>
                                
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-semibold mb-2">Remark</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea  class="form-control form-control-solid" 

                                                name="remarks" >{{ old('remarks') }}</textarea>

                                            @if($errors->has('remarks'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('remarks') }}</div>

                                            @endif
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div> 
                                    
                                        <div class="d-flex justify-content-end">
                    <!--begin::Section-->
                    <div class="mw-300px">
                        <!--begin::Item-->
                        <div class="d-flex flex-stack mb-3">
                            <!--begin::Accountname-->
                            <div class="fw-semibold pe-10 text-gray-600 fs-7">Subtotal:</div>
                            <!--end::Accountname-->

                            <!--begin::Label-->
                            <div class="text-end fw-bold fs-6 text-gray-800" id="Subtotal"></div> 
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="d-flex flex-stack mb-3">
                            <!--begin::Accountname-->
                            <div class="fw-semibold pe-10 text-gray-600 fs-7" >CGST</div>
                            <!--end::Accountname-->

                            <!--begin::Label-->
                            <div class="text-end fw-bold fs-6 text-gray-800" id="CGST">0</div> 
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="d-flex flex-stack mb-3">
                            <!--begin::Accountnumber-->
                            <div class="fw-semibold pe-10 text-gray-600 fs-7">SGST</div>
                            <!--end::Accountnumber-->

                            <!--begin::Number-->
                            <div class="text-end fw-bold fs-6 text-gray-800" id="SGST">0</div> 
                            <!--end::Number-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Code-->
                            <div class="fw-semibold pe-10 text-gray-600 fs-7">Total</div>
                            <!--end::Code-->

                            <!--begin::Label-->
                            <div class="text-end fw-bold fs-6 text-gray-800" id="Total">0</div> 
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                    </div>   
                    <!--end::Section-->                        
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

