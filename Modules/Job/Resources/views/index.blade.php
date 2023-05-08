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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Job
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
                        @can('job-create')

                        <div class="card-toolbar">

                            <a href="{{ route('job.create') }}"
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
                                <!--end::Svg Icon-->New Job</a>
<a href="{{url('job/download?')}}keyword={{ !empty(Request::get('keyword')) ? Request::get('keyword') : '' }}&status={{ !empty(Request::get('status')) ? Request::get('status') : '' }}" class=" mr-3 btn btn-icon btn-success" title="download">
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
                        <form method="get" action="{{url('job')}}">
                <div class="row mb-5">
            <div class="col-md-4 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">Search</label>
           <input type="text" name="keyword" class="form-control" value="{{ !empty(Request::get('keyword')) ? Request::get('keyword') : '' }}">
            </div>
            <div class="col-md-4 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">Status</label>
            <select class="form-control" name="status">
                <option value="">Select Status</option>
                <option value="1" {{ !empty(Request::get('status') && Request::get('status')==1) ? 'selected' : '' }}>Invoice Raised</option>
                <option value="5" {{ !empty(Request::get('status') && Request::get('status')==5) ? 'selected' : '' }}>Pending</option>
                <option value="2" {{ !empty(Request::get('status') && Request::get('status')==2) ? 'selected' : '' }}>W-I-P</option>
                <option value="3" {{ !empty(Request::get('status') && Request::get('status')==3) ? 'selected' : '' }}>Combined</option>
                <option value="4" {{ !empty(Request::get('status') && Request::get('status')==4) ? 'selected' : '' }}>Cancelled</option>
                <option value="6" {{ !empty(Request::get('status') && Request::get('status')==6) ? 'selected' : '' }}>FOC</option>
            </select>
            </div>
            <div class="col-md-4 fv-row fv-plugins-icon-container">
                       

                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-success mt-8">
                            <span class="indicator-label">
                                Submit
                            </span>
                           
                        </button> 
                         <a href="{{url('job')}}" class="btn btn-primary mt-8">
                            <span class="indicator-label">
                                Reset
                            </span>
                           
</a>
                    </div>
</div>
</form>
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bold text-muted bg-light">
                                        <th class="min-w-10px">S.no</th>
                                        <th class="min-w-125px">Name</th>
                                        <th class="min-w-125px">Status</th>
                                        <th class="min-w-125px">Change Status</th>
                                        <th class="min-w-10px">Action</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach($data as $val)
                                    @php 
                                    $status = '';
                                    switch ($val->is_used) {
                                       case 1:
                                        $status = 'Invoice Raised';
                                        break;
                                        case 0:
                                        $status = 'Pending';
                                        break;
                                        case 2:
                                        $status = 'W-I-P';
                                        break;
                                        case 3:
                                        $status = 'Combined';
                                        break;
                                        case 4:
                                        $status = 'Cancelled';
                                        break;
                                        case 6:
                                        $status = 'FOC';
                                        break;
                                   
                                    }
                                    @endphp
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $val->name}}</td>
     
                                            <td>{{$status}}</td>
                                            <td>
                                            @if($val->is_used==0 || $val->is_used==2 || $val->is_used==3)

                                                <select class="form-control" onchange="changeJobStatus(this,{{$val->id}})">
                                                    <option value=""> Select </option>
                                                    <option value="2">W-I-P</option>
                                                    <option value="6">FOC</option>
                                                    <option value="3">Combined</option>
                                                </select>
                                                @endif
                                            </td>

                                            <td>
                                            <div class="d-flex flex-shrink-0">
					
																<a href="{{ route('job.edit', $val->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
																	<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																	<span class="svg-icon svg-icon-3">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																			<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</a>
                                                                @if($val->is_used!=1)
                                                                <form action="{{ route('job.destroy', $val->id) }}" method="POST" id="delete-{{$val->id}}">
  @csrf
  @method("DELETE")
 
  <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" onclick="validateForm({{$val->id}})">
																	<span class="svg-icon svg-icon-3">
                                            @if($val->is_used!=4)
                                                                    <svg xmlns="http://www.w3.org/2000/svg" height="329pt" viewBox="0 0 329.26933 329" width="329pt"><path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0"/></svg>
                                                                    @else
                                                                    <svg class="svg-icon" viewBox="0 0 20 20" height="329pt">
							<path d="M10.219,1.688c-4.471,0-8.094,3.623-8.094,8.094s3.623,8.094,8.094,8.094s8.094-3.623,8.094-8.094S14.689,1.688,10.219,1.688 M10.219,17.022c-3.994,0-7.242-3.247-7.242-7.241c0-3.994,3.248-7.242,7.242-7.242c3.994,0,7.241,3.248,7.241,7.242C17.46,13.775,14.213,17.022,10.219,17.022 M15.099,7.03c-0.167-0.167-0.438-0.167-0.604,0.002L9.062,12.48l-2.269-2.277c-0.166-0.167-0.437-0.167-0.603,0c-0.166,0.166-0.168,0.437-0.002,0.603l2.573,2.578c0.079,0.08,0.188,0.125,0.3,0.125s0.222-0.045,0.303-0.125l5.736-5.751C15.268,7.466,15.265,7.196,15.099,7.03"></path>
						</svg>
                        @endif
																	</span>
																</a>
</form>
@endif
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
@endsection
