@extends('layout.master-layout')

@section('content')<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Account Overview</h1>
										<!--end::Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">
												<a href="/metronic8/demo1/../demo1/index.html" class="text-muted text-hover-primary">Home</a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item">
												<span class="bullet bg-gray-400 w-5px h-2px"></span>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">Account</li>
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
									<!--begin::Navbar-->
									<div class="card mb-5 mb-xl-10">
										<div class="card-body pt-9 pb-0">
											<!--begin::Details-->
											<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
												<!--begin: Pic-->
												<div class="me-7 mb-4">
													<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
														<img src="{{asset('storage/uploads/'.$user->avatar)}}" alt="image">
													</div>
												</div>
												<!--end::Pic-->
												<!--begin::Info-->
												<div class="flex-grow-1">
													<!--begin::Title-->
													<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
														<!--begin::User-->
														<div class="d-flex flex-column">
															<!--begin::Name-->
															<div class="d-flex align-items-center mb-2">
																<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{$user->first_name}}</a>
																
															</div>
															<!--end::Name-->
															<!--begin::Info-->
															<div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
																<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
																<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
																<span class="svg-icon svg-icon-4 me-1">
																	<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3" d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor"></path>
																		<path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor"></path>
																		<rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor"></rect>
																	</svg>
																</span>
																<!--end::Svg Icon-->{{$user->position}}</a>
																<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
																<!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
																<span class="svg-icon svg-icon-4 me-1">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor"></path>
																		<path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor"></path>
																	</svg>
																</span>
																<!--end::Svg Icon-->{{$user->country}}</a>
																<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
																<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
																<span class="svg-icon svg-icon-4 me-1">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor"></path>
																		<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor"></path>
																	</svg>
																</span>
																<!--end::Svg Icon-->{{$user->email}}</a>
															</div>
															<!--end::Info-->
														</div>
														<!--end::User-->
														
													</div>
													<!--end::Title-->
													
												</div>
												<!--end::Info-->
											</div>
											<!--end::Details-->
											
										</div>
									</div>
									<!--end::Navbar-->
									<!--begin::details View-->
									<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
										<!--begin::Card header-->
										<div class="card-header cursor-pointer">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Profile Details</h3>
											</div>
											<!--end::Card title-->
											<!--begin::Action-->
											<!--end::Action-->
										</div>
										<!--begin::Card header-->
										<!--begin::Card body-->
										<div class="card-body p-9">
											<!--begin::Row-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Name</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<span class="fw-bold fs-6 text-gray-800">{{$user->first_name}}</span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Input group-->
			
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Contact Phone 
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Phone number must be active" data-kt-initialized="1"></i></label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 d-flex align-items-center">
													<span class="fw-bold fs-6 text-gray-800 me-2">{{$user->phone}}</span>
													<span class="badge badge-success">Verified</span>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Country 
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Country of origination" data-kt-initialized="1"></i></label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<span class="fw-bold fs-6 text-gray-800">{{$user->country}}</span>
												</div>
												<!--end::Col-->
											</div>
                                            @if($user->department)
                                            <div class="row mb-7">
												<!--begin::Label-->
												<label class="col-lg-4 fw-semibold text-muted">Department 
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Country of origination" data-kt-initialized="1"></i></label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<span class="fw-bold fs-6 text-gray-800">{{$user->department->name}}</span>
												</div>
												<!--end::Col-->
											</div>
											@endif
											<!--end::Input group-->
											
											<!--end::Input group-->
									
											<!--end::Input group-->
											
										</div>
										<!--end::Card body-->
									</div>
                                    @if($user->address)
									<!--end::details View-->
                                    <div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header">
											<!--begin::Title-->
											<div class="card-title">
												<h3>Address</h3>
											</div>
											<!--end::Title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body">
											<!--begin::Addresses-->
											<div class="row gx-9 gy-6">
												<!--begin::Col-->
                                                @foreach($user->address as $k=>$add)
												<div class="col-xl-6" data-kt-billing-element="address">
													<!--begin::Address-->
													<div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
														<!--begin::Details-->
														<div class="d-flex flex-column py-2">
															<div class="d-flex align-items-center fs-5 fw-bold mb-5">Address {{$k+1}} 
															<span class="badge badge-light-success fs-7 ms-2">Primary</span></div>
															<div class="fs-6 fw-semibold text-gray-600">{{$add->address}}
															
														</div>
														<!--end::Details-->
														<!--begin::Actions-->
														
														<!--end::Actions-->
													</div>
													<!--end::Address-->
												</div>
												<!--end::Col-->
												@endforeach
											</div>
											<!--end::Addresses-->
											<!--begin::Tax info-->
											
											<!--end::Tax info-->
										</div>
										<!--end::Card body-->
									</div>
                                    @endif 
                                    @if($user->contact_details)
									<!--end::details View-->
                                    <div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header">
											<!--begin::Title-->
											<div class="card-title">
												<h3>Contact Details</h3>
											</div>
											<!--end::Title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body">
											<!--begin::Addresses-->
											<div class="row gx-9 gy-6">
												<!--begin::Col-->
                                                @foreach($user->contact_details as $k=>$add)
												<div class="col-xl-6" data-kt-billing-element="address">
													<!--begin::Address-->
													<div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
														<!--begin::Details-->
														<div class="d-flex flex-column py-2">
															<div class="d-flex align-items-center fs-5 fw-bold mb-5">Contact {{$k+1}} 
															<span class="badge badge-light-success fs-7 ms-2">Primary</span></div>
															<div class="fs-6 fw-semibold text-gray-600">{{$add->contact_detail}}
															
														</div>
														<!--end::Details-->
														<!--begin::Actions-->
														
														<!--end::Actions-->
													</div>
													<!--end::Address-->
												</div>
												<!--end::Col-->
												@endforeach
											</div>
											<!--end::Addresses-->
											<!--begin::Tax info-->
											
											<!--end::Tax info-->
										</div>
										<!--end::Card body-->
									</div>
                                    @endif
                                   @if($user->qualification)
									<!--end::details View-->
                                    <div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header">
											<!--begin::Title-->
											<div class="card-title">
												<h3>Qualifications</h3>
											</div>
											<!--end::Title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body">
											<!--begin::Addresses-->
											<div class="row gx-9 gy-6">
												<!--begin::Col-->
                                                @foreach($user->qualification as $k=>$add)
												<div class="col-xl-6" data-kt-billing-element="address">
													<!--begin::Address-->
													<div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
														<!--begin::Details-->
														<div class="d-flex flex-column py-2">
															<div class="d-flex align-items-center fs-5 fw-bold mb-5">Qualification {{$k+1}} 
															<span class="badge badge-light-success fs-7 ms-2">Primary</span></div>
															<div class="fs-6 fw-semibold text-gray-600">Qualification :{{$add->qualification}}
															<div class="fs-6 fw-semibold text-gray-600">Start Date:{{$add->start_date}}
															<div class="fs-6 fw-semibold text-gray-600">End Date :{{$add->end_date}}
															
														</div>
														<!--end::Details-->
														<!--begin::Actions-->
														
														<!--end::Actions-->
													</div>
													<!--end::Address-->
												</div>
												<!--end::Col-->
												@endforeach
											</div>
											<!--end::Addresses-->
											<!--begin::Tax info-->
											
											<!--end::Tax info-->
										</div>
										<!--end::Card body-->
									</div>
                                    @endif
                                    @if($user->skills)
									<!--end::details View-->
                                    <div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header">
											<!--begin::Title-->
											<div class="card-title">
												<h3>Skills</h3>
											</div>
											<!--end::Title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body">
											<!--begin::Addresses-->
											<div class="row gx-9 gy-6">
												<!--begin::Col-->
                                                @foreach($user->skills as $k=>$add)
												<div class="col-xl-6" data-kt-billing-element="address">
													<!--begin::Address-->
													<div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
														<!--begin::Details-->
														<div class="d-flex flex-column py-2">
															<div class="d-flex align-items-center fs-5 fw-bold mb-5">Skill {{$k+1}} 
															<span class="badge badge-light-success fs-7 ms-2">Primary</span></div>
															<div class="fs-6 fw-semibold text-gray-600">{{$add->skill}}
															
														</div>
														<!--end::Details-->
														<!--begin::Actions-->
														
														<!--end::Actions-->
													</div>
													<!--end::Address-->
												</div>
												<!--end::Col-->
												@endforeach
											</div>
											<!--end::Addresses-->
											<!--begin::Tax info-->
											
											<!--end::Tax info-->
										</div>
										<!--end::Card body-->
									</div>
                                    @endif
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						
					</div>
@endsection
