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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Proforma Invoice
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
                        @can('proforma-invoice-create')

                        <div class="card-toolbar">

                            <a href="{{ route('proforma-invoice.create') }}"
                                class="btn btn-sm btn-light-primary">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                            transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor">
                                        </rect>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->New Invoice</a>

                                <a href="{{url('proforma-invoice/download-excel?')}}keyword={{ !empty(Request::get('keyword')) ? Request::get('keyword') : '' }}&status={{ !empty(Request::get('status')) ? Request::get('status') : '' }}&with_proforma={{ !empty(Request::get('with_proforma')) ? Request::get('with_proforma') : '' }}&billing={{ !empty(Request::get('billing')) ? Request::get('billing') : '' }}&party={{ !empty(Request::get('party')) ? Request::get('party') : '' }}" class=" mr-3 btn btn-icon btn-success" title="download">
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
                            <form method="get" action="{{route('proforma-invoice.index')}}">
                <div class="row mb-5">
            <div class="col-md-3 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">Search</label>
           <input type="text" name="keyword" class="form-control" value="{{ !empty(Request::get('keyword')) ? Request::get('keyword') : '' }}">
            </div>
            <div class="col-md-3 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">Status</label>
            <select class="form-control" name="status">
            <option value="">Select Status</option>
            <option value="1" {{ !empty(Request::get('status')) && (Request::get('status')==1) ? 'selected' : '' }}>Active</option>
            <option value="2" {{ !empty(Request::get('status')) && (Request::get('status')==2) ? 'selected' : '' }}>Canceled</option>
            </select>
            </div>
            <div class="col-md-3 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">Billing</label>
            <select class="form-control" name="billing">
            <option value="">Select Billing</option>
            @foreach($billing as $bill)
            <option value="{{$bill->id}}" {{ !empty(Request::get('billing')) && (Request::get('billing')==$bill->id) ? 'selected' : '' }}>{{$bill->company_name}}</option>
            @endforeach
            </select>
            </div>
            <div class="col-md-3 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">Party</label>
            <select class="form-control" name="party">
            <option value="">Select Party</option>
            @foreach($parties as $party)
            <option value="{{$party->id}}" {{ !empty(Request::get('party')) && (Request::get('party')==$party->id) ? 'selected' : '' }}>{{$party->name}}</option>
            @endforeach
            </select>
            </div>
            <div class="col-md-6 fv-row fv-plugins-icon-container">
                       

                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary mt-8">
                            <span class="indicator-label">
                                Submit
                            </span>
                           
                        </button> 
                         <a href="{{route('proforma-invoice.index')}}" class="btn btn-primary mt-8">
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
                                        <th class="min-w-125px">Billing</th>
                                        <th class="min-w-125px">Party Name</th>
                                        <th class="min-w-125px">Amount</th>
                                        <th class="min-w-125px">Status</th>                                        
                                        <th class="min-w-125px">Invoice Status</th>                                        
                                        <th class="min-w-125px">Change Status</th>
                                        <th class="min-w-10px">Action</th>
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
                                            <td>{{ $val->billing->company_name}}</td>
                                            <td>{{ $val->party->name}}</td>
                                            <td>{{ $val->total }}</td>
                                            @php 
                                            switch ($val->status) {
                                            case 0:
                                                $status = 'Pending';
                                                break;
                                            case 1:
                                                $status = 'Active';
                                                break;
                                            case 2:
                                                $status = 'Cancelled';
                                                break;
            
                                            }
                                            
                                            $check = checkInvoice($val->id);
                                            @endphp
                                            <td>{{$status}}</td>
                                            <td>{{$check ? 'Done' : 'Not Done'}}</td>
                                            <td><select class="form-control" name="status" onchange="changeStatus(this,{{$val->id}},'ProformaInvoice')">
                                                <option value="">Status</option>
                                                <option value="1">Active</option>
                                                <option value="2">Canceled</option>
                                            </select></td>
                                            <td>
                                            <div class="d-flex flex-shrink-0">
																<a href="javascript:" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" onclick="viewPI({{$val->id}})">
																	<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																	<span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"> <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/> <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/> </svg>
																	</span>
                                                                    
																	<!--end::Svg Icon-->
																</a>
                                                            
                                                            @if(!$check && $val->status==1)
                                                                <a href="{{ route('proforma-invoice.edit', $val->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
																	<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																	<span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																			<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</a>
                                                                @endif
                                                                <form action="{{ route('proforma-invoice.destroy', $val->id) }}" method="POST" id="delete-{{$val->id}}">
  @csrf
  @method("DELETE")
 
  <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" onclick="validateForm({{$val->id}})">
																	<span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" height="329pt" viewBox="0 0 329.26933 329" width="329pt"><path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0"/></svg>

																	</span>
																</a>
</form>
</div>													
														
                                            </td>
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            {{ $data->appends(Request::except('page'))->links() }}

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
