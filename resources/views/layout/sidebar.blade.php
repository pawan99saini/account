<!--begin::Sidebar-->

<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

    <!--begin::Logo-->

    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">

        <!--begin::Logo image-->

        <a href="{{url('dashboard')}}">

            <img alt="Logo" src="{{asset('demo1/media/logos/logo.png')}}" class="h-50px app-sidebar-logo-default" />

            <!-- <img alt="Logo" src="{{asset('demo1/media/logos/logo.png')}}" class="h-20px app-sidebar-logo-minimize" /> -->

        </a>

        <!--end::Logo image-->

        <!--begin::Sidebar toggle-->

        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">

            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->

            <span class="svg-icon svg-icon-2 rotate-180">

                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />

                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />

                </svg>

            </span>

            <!--end::Svg Icon-->

        </div>

        <!--end::Sidebar toggle-->

    </div>

    <!--end::Logo-->

    <!--begin::sidebar menu-->

    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">

        <!--begin::Menu wrapper-->

        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">

            <!--begin::Menu-->

            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">

                <!--begin:Menu item-->

                <div class="menu-item">

                    <!--begin:Menu link-->

                    <a href="{{url('dashboard')}}" class="menu-link">

                        <span class="menu-icon">

                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->

                            <span class="svg-icon svg-icon-2">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />

                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />

                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />

                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />

                                </svg>

                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-title">Dashboards</span>

</a>

                    <!--end:Menu link-->

                    

                </div>

                <!--end:Menu item-->




                <!--begin:Menu item-->

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">

                    <!--begin:Menu link-->

                    

                    <span class="menu-link">

                        <span class="menu-icon">

                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->

                            <span class="svg-icon svg-icon-2">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                                    <path d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z" fill="currentColor" />

                                    <path opacity="0.3" d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z" fill="currentColor" />

                                </svg>

                            </span>

                            <!--end::Svg Icon-->

                        </span>

                        <span class="menu-title">User Management</span>

                        <span class="menu-arrow"></span>

                    </span>

                    <!--end:Menu link-->

                    <!--begin:Menu sub-->

                    <div class="menu-sub menu-sub-accordion">

                        <!--begin:Menu item-->




                        <div class="menu-item">

                            <!--begin:Menu link-->

                            <a class="menu-link" href="{{route('users.index')}}">

                                <span class="menu-bullet">

                                    <span class="bullet bullet-dot"></span>

                                </span>

                                <span class="menu-title">Users</span>

                            </a>

                            <!--end:Menu link-->

                            

                        </div>





                        <!--begin:Menu item-->

                        <div class="menu-item">

                            <!--begin:Menu link-->

                            <a class="menu-link" href="{{route('roles.index')}}">

                                <span class="menu-bullet">

                                    <span class="bullet bullet-dot"></span>

                                </span>

                                <span class="menu-title">Roles</span>

                            </a>

                            <!--end:Menu link-->

                            

                        </div>


                        <!--end:Menu item-->

                        <!--begin:Menu item-->


                        <div class="menu-item">

                            <!--begin:Menu link-->

                            <a class="menu-link" href="{{route('permissions.index')}}">

                                <span class="menu-bullet">

                                    <span class="bullet bullet-dot"></span>

                                </span>

                                <span class="menu-title">Permissions</span>

                            </a>

                            <!--end:Menu link-->

                        </div>


                        <!--end:Menu item-->

                    </div>

                    <!--end:Menu sub-->

                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">

                    <!--begin:Menu link-->

                    

                    <span class="menu-link">

                    <span class="menu-icon"><!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
<span class="svg-icon svg-icon-2"><svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3" d="M8.9 21L7.19999 22.6999C6.79999 23.0999 6.2 23.0999 5.8 22.6999L4.1 21H8.9ZM4 16.0999L2.3 17.8C1.9 18.2 1.9 18.7999 2.3 19.1999L4 20.9V16.0999ZM19.3 9.1999L15.8 5.6999C15.4 5.2999 14.8 5.2999 14.4 5.6999L9 11.0999V21L19.3 10.6999C19.7 10.2999 19.7 9.5999 19.3 9.1999Z" fill="currentColor"></path>
<path d="M21 15V20C21 20.6 20.6 21 20 21H11.8L18.8 14H20C20.6 14 21 14.4 21 15ZM10 21V4C10 3.4 9.6 3 9 3H4C3.4 3 3 3.4 3 4V21C3 21.6 3.4 22 4 22H9C9.6 22 10 21.6 10 21ZM7.5 18.5C7.5 19.1 7.1 19.5 6.5 19.5C5.9 19.5 5.5 19.1 5.5 18.5C5.5 17.9 5.9 17.5 6.5 17.5C7.1 17.5 7.5 17.9 7.5 18.5Z" fill="currentColor"></path>
</svg>
</span>
<!--end::Svg Icon--></span>

                        <span class="menu-title">Masters</span>

                        <span class="menu-arrow"></span>

                    </span>

                    <!--end:Menu link-->

                    <!--begin:Menu sub-->

                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">

                            <!--begin:Menu link-->

                            <a class="menu-link" href="{{route('categories.index')}}">

                                <span class="menu-bullet">

                                    <span class="bullet bullet-dot"></span>

                                </span>

                                <span class="menu-title">Category Master</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--begin:Menu item-->
                        <div class="menu-item">

                            <!--begin:Menu link-->

                            <a class="menu-link" href="{{route('service.index')}}">

                                <span class="menu-bullet">

                                    <span class="bullet bullet-dot"></span>

                                </span>

                                <span class="menu-title">Service Master</span>

                            </a>

                            <!--end:Menu link-->

                            

                        </div>
                        <div class="menu-item">

                            <!--begin:Menu link-->

                            <a class="menu-link" href="{{route('channel-partner.index')}}">

                                <span class="menu-bullet">

                                    <span class="bullet bullet-dot"></span>

                                </span>

                                <span class="menu-title">Channel Partner</span>

                            </a>

                            <!--end:Menu link-->
                        </div> 
                         <div class="menu-item">

                            <!--begin:Menu link-->

                            <a class="menu-link" href="{{route('group.index')}}">

                                <span class="menu-bullet">

                                    <span class="bullet bullet-dot"></span>

                                </span>

                                <span class="menu-title">Party Group</span>

                            </a>

                            <!--end:Menu link-->
                        </div>                         
                        <div class="menu-item">

                            <!--begin:Menu link-->

                            <a class="menu-link" href="{{route('parties.index')}}">

                                <span class="menu-bullet">

                                    <span class="bullet bullet-dot"></span>

                                </span>

                                <span class="menu-title">Party Master</span>

                            </a>

                            <!--end:Menu link-->
                        </div> 
                        <div class="menu-item">

                            <!--begin:Menu link-->

                            <a class="menu-link" href="{{route('billing.index')}}">

                                <span class="menu-bullet">

                                    <span class="bullet bullet-dot"></span>

                                </span>

                                <span class="menu-title">Billing Entity</span>

                            </a>

                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">

                            <!--begin:Menu link-->

                            <a class="menu-link" href="{{route('jobexecution.index')}}">

                                <span class="menu-bullet">

                                    <span class="bullet bullet-dot"></span>

                                </span>

                                <span class="menu-title">Job Execution Partner</span>

                            </a>

                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">

                            <!--begin:Menu link-->

                            <a class="menu-link" href="{{route('bank.index')}}">

                                <span class="menu-bullet">

                                    <span class="bullet bullet-dot"></span>

                                </span>

                                <span class="menu-title">Bank Master</span>

                            </a>

                            <!--end:Menu link-->
                        </div>
                         
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <!--end:Menu item-->

                    </div>

                    <!--end:Menu sub-->

                </div>
<div class="menu-item">
<!--begin:Menu link-->
<a href="{{url('invoice')}}" class="menu-link">
<span class="menu-icon"><!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
<span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M22 7H2V11H22V7Z" fill="currentColor"></path>
<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="currentColor"></path>
</svg>
</span>
<!--end::Svg Icon--></span>
    <span class="menu-title">Invoice</span>
</a>
<!--end:Menu link-->
</div>

<div class="menu-item">
<!--begin:Menu link-->
<a href="{{url('proforma-invoice')}}" class="menu-link">
<span class="menu-icon"><!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
<span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M22 7H2V11H22V7Z" fill="currentColor"></path>
<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="currentColor"></path>
</svg>
</span>
<!--end::Svg Icon--></span>
    <span class="menu-title">Proforma Invoice</span>
</a>
<!--end:Menu link-->
</div>

<div class="menu-item">
<!--begin:Menu link-->
<a href="{{url('parties/view')}}" class="menu-link">
<span class="menu-icon"><!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
<span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M22 7H2V11H22V7Z" fill="currentColor"></path>
<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="currentColor"></path>
</svg>
</span>
<!--end::Svg Icon--></span>
    <span class="menu-title">View Parties</span>
</a>
<!--end:Menu link-->
</div>

<div class="menu-item">
<!--begin:Menu link-->
<a href="{{url('invoice/invoice-items')}}" class="menu-link">
<span class="menu-icon"><!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
<span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M22 7H2V11H22V7Z" fill="currentColor"></path>
<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="currentColor"></path>
</svg>
</span>
<!--end::Svg Icon--></span>
    <span class="menu-title">Invoice report</span>
</a>
<!--end:Menu link-->
</div>

<div class="menu-item">

                            <!--begin:Menu link-->

                            <a class="menu-link" href="{{route('job.index')}}">

                            <span class="menu-icon"><!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
<span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M22 7H2V11H22V7Z" fill="currentColor"></path>
<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="currentColor"></path>
</svg>
</span>
<!--end::Svg Icon--></span>

                                <span class="menu-title">Job Master</span>

                            </a>

                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
<!--begin:Menu link-->
<a href="{{route('payment.index')}}" class="menu-link">
<span class="menu-icon"><!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
<span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M22 7H2V11H22V7Z" fill="currentColor"></path>
<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="currentColor"></path>
</svg>
</span>
<!--end::Svg Icon--></span>
    <span class="menu-title">Payment Receipt</span>
</a>
<!--end:Menu link-->
</div>
            </div>

            <!--end::Menu-->

            

        </div>

        <!--end::Menu wrapper-->

    </div>

    <!--end::sidebar menu-->

    

</div>

<!--end::Sidebar-->