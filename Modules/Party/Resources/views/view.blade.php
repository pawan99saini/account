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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Party
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

    <!--end::Header-->

	<!--begin::Body-->
	<div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <form method="get" action="{{url('parties/view')}}">
                <div class="row mb-5">
            <div class="col-md-6 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold mb-2">Select Group</label>
            <select class="form-select form-select-solid select" name="group_id">
                <option value="">Select</option>
                @foreach($groups as $group)
                <option value="{{$group->id}}" {{ !empty(Request::get('group_id')) && Request::get('group_id')==$group->id ? 'selected' : '' }}>{{$group->name}}</option>
                @endforeach
            </select>
            </div>
            <div class="col-md-6 fv-row fv-plugins-icon-container">
                       

                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary mt-8">
                            <span class="indicator-label">
                                Submit
                            </span>
                           
                        </button>
                    </div>
</div>
</form>
            <!--begin::Table-->
            @if(!empty($data))
            <table class="table align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bold text-muted bg-light">
                        <th class="ps-4 min-w-300px rounded-start">S.no</th>
                        <th class="min-w-125px">Party Name</th>
                        
                    </tr>
                </thead>
                <!--end::Table head-->

                <!--begin::Table body-->
                <tbody>
                    @foreach($data as $k=>$val)
                             <tr>  
                                                          
                            <td>
                               {{$k+1}}
                            </td>
                            <td>{{$val->name}}</td>
                            
                            
                        </tr>
@endforeach
                            
                                            
                                    </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
            @endif
        </div>
        <!--end::Table container-->
	</div>
	<!--begin::Body-->
</div>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->


</div>
@endsection
