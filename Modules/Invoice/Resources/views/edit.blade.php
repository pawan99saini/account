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

                <!--begin::Page title-->

                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">

                    <!--begin::Title-->

                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Invoice

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

                                    id="kt_careers_form" action="{{ route('invoice.update',$invoice->id) }}"

                                    enctype='multipart/form-data'>

                                    <!--begin::Input group-->

                                    @csrf

                                    @method('put')
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

                                                name="invoice_date"  value="{{$invoice->invoice_date}}" readonly>

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

                                            <select class="form-control form-control-solid"  name="billing_id" onchange="getBilling(this)">
                                            <option value="">Select Billing Entity</option>

                                            @foreach($billing as $bill)
                                            <option value="{{$bill->id}}" {{$invoice->billing_id==$bill->id ? 'selected' : ''}}>{{$bill->company_name}}</option>
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

                                            <select class="form-control form-control-solid"  name="party_id" onchange="getParty(this)">
                                            <option value="">Select Party</option>

                                            @foreach($parties as $party)
                                            <option value="{{$party->id}}" {{$invoice->party_id==$party->id ? 'selected' : ''}}>{{$party->name}}</option>
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
                                        <th>Internal job</th>
                                        <th>Job Execution Partner</th>

                                </tr>
                                </thead>
                                <tbody class="field_wrapper">
                                    @foreach($invoice->items as $item)
                                <tr>
                                <td><select class="w-50px"  name="job_id" disabled>
                                            @foreach($jobs as $job)
                                            <option value="{{$job->id}}" {{$item->job_id==$job->id ? 'selected' : ''}}>{{$job->name}}</option>
                                            @endforeach
                                            </select></td>
                                    <td><select class="w-100px" name="invoice[{{$item->id}}][category_id]" onchange="getService(this,{{$item->service_id}})">
                                        <option>Category</option>
                                        @foreach($categories as $cat)
                                        <option value="{{$cat->id}}" {{$item->category_id==$cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                    <td><select class="w-100px" name="invoice[{{$item->id}}][service_id]" onchange="serviceDetail(this)"><option>Service</option>
                                   
                                </select></td>
                                    <td>
          <div style="display:table-cell;vertical-align:middle;padding-left: 2px;">
          <input class="w-100px date1" name="invoice[{{$item->id}}][from]" placeholder="From date" value="{{$item->from}}"></div>

          <div style="text-align:right;display:table-cell;vertical-align:middle;padding-left: 10px;">
          <input class="w-100px date1" name="invoice[{{$item->id}}][to]" placeholder="To date" value="{{$item->to}}"></div>
      </td>
                                    <td><input type="text" name="invoice[{{$item->id}}][sac]" class="w-50px" value="{{$item->sac}}"></td>
                                    <td><input type="text" name="invoice[{{$item->id}}][gst]" class="w-50px" value="{{$item->gst}}" onkeydown="getGst()"></td>
                                    <td><input type="text" name="invoice[{{$item->id}}][rate]" class="w-100px" value="{{$item->rate}}" onkeydown="getRate()"></td>
                                    <td><textarea row="3" name="invoice[{{$item->id}}][remarks]" class="w-100px">{{$item->remarks}}</textarea></td>
                                    <td><textarea row="3" name="invoice[{{$item->id}}][Internal_job]" class="w-100px">{{$item->Internal_job}}</textarea></td>
                                    @php 
                                    $job_exe_id = $item->job_exe_id ? json_decode($item->job_exe_id,true) : [];
                                    $exe_id = getJobExecution($job_exe_id);
                                    @endphp
                                    <td><textarea row="3"  class="w-100px" disabled>{{implode(",",$exe_id)}}</textarea></td>

                                </tr>
                                @endforeach
                                
                                </tbody>
                                </table>
                                </div>
                                
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Remark</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea  class="form-control form-control-solid" name="remarks" >{{$invoice->remarks}}</textarea>

                                            @if($errors->has('remarks'))

                                                <div class="text-danger fs-7 fw-bold">

                                                    {{ $errors->first('remarks') }}</div>

                                            @endif
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div> 
                                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-semibold mb-2">Expense</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="number"  min="0" class="form-control form-control-solid" 

                                                name="expense"  value="{{$invoice->expense}}" >

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
<script>
    var bill_id = "{{$invoice->billing_id}}" 
    var party = "{{$invoice->party_id}}" 
</script>
@endsection

