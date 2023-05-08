@extends('layout.master-layout')
@section('content')
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

                <div class="card mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">

                        </h3>
                        @can('invoice-create')

                        <div class="card-toolbar">
                                <a href="{{url('invoice/item-download?')}}keyword={{ !empty(Request::get('keyword')) ? Request::get('keyword') : '' }}&status={{ !empty(Request::get('status')) ? Request::get('status') : '' }}&with_proforma={{ !empty(Request::get('with_proforma')) ? Request::get('with_proforma') : '' }}&invoice_date={{ !empty(Request::get('invoice_date')) ? Request::get('invoice_date') : '' }}" class=" mr-3 btn btn-icon btn-success" title="download">
    <i class="fa fa-download fa-lg"></i>
</a>
                        </div>
                        @endcan

                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <form method="get" action="{{url('invoice/invoice-items')}}">
                <div class="row mb-5">
            
            <div class="col-md-3 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">Status</label>
            <select class="form-control" name="status">
            <option value="">Select Status</option>
            <option value="1" {{ !empty(Request::get('status')) && (Request::get('status')==1) ? 'selected' : '' }}>Active</option>
            <option value="2" {{ !empty(Request::get('status')) && (Request::get('status')==2) ? 'selected' : '' }}>Canceled</option>
            </select>
            </div>
          
            <div class="col-md-3 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">Date Picker</label>
           <input type="text" name="invoice_date" class="form-control date-range" value="{{ !empty(Request::get('keyword')) ? Request::get('keyword') : '' }}">
            </div>
            <div class="col-md-6 fv-row fv-plugins-icon-container">
                       

                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary mt-8">
                            <span class="indicator-label">
                                Submit
                            </span>
                           
                        </button> 
                         <a href="{{route('invoice.index')}}" class="btn btn-primary mt-8">
                            <span class="indicator-label">
                                Reset
                            </span>
                           
</a>
                    </div>
</div>
</form>
                            <table class="table align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bold text-muted bg-light">
                                        <th class="min-w-10px">S.no</th>
                                        <th class="min-w-125px">Invoice Date</th>
                                        <th class="min-w-10px">Invoice Number</th>
                                        <th class="min-w-125px">Party Name</th>
                                        <th class="min-w-125px">Amount</th>
                                        <th class="min-w-125px">Status</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach($data as $val)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ date("d-m-Y",strtotime($val->invoice_date))}}</td>
                                            <td>{{ $val->invoice_number}}</td>
                                            <td>{{ $val->party->name}}</td>
                                            <td>{{ $val->total }}</td>
                                            <td>{{ $val->status==1 ? 'Active' : 'Canceled'}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            {!! $data->links() !!}

                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--begin::Body-->
                </div>
                <!--end::Tables Widget 10-->
                <!--begin::Tables Widget 11-->

                <!--end::Tables Widget 11-->
                <!--begin::Tables Widget 12-->

                <!--end::Tables Widget 12-->
                <!--begin::Tables Widget 13-->

                <!--end::Tables Widget 13-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->


</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="content">
        ...
      </div>
    
    </div>
  </div>
</div>
@endsection
