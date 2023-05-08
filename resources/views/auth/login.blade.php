<x-auth-layout>


    <!--begin::Signin Form-->
    <form class="form w-100 " novalidate="novalidate" method ="post" id="" action="{{ route('login') }}">
    @csrf

    <!--begin::Heading-->
        <div class="text-center mb-11">
             <!--begin::Title-->
             <img src="{{ asset('demo1/media/logos/logo.png') }}" >

             <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
            <!--end::Title-->
           
        </div>
        <!--begin::Heading-->
        <!--begin::Login options-->
        <div class="row g-3 mb-9">
            <!--begin::Col-->
            
        </div>
        <!--end::Login options-->
        
        <!--begin::Input group=-->
        <div class="fv-row mb-8 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
            <!--begin::Email-->
            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent"  required autofocus>
            <!--end::Email-->
          
        </div>
        <!--end::Input group=-->
        <div class="fv-row mb-3 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
            <!--begin::Password-->
            <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" >
            <!--end::Password-->
         
        </div>
        <!--end::Input group=-->
        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                @include('partials.general._button-indicator', ['label' => __('Continue')])
            </button>
        </div>
        <!--end::Submit button-->
        <div></div>
        @if(count($errors) > 0)
 @foreach( $errors->all() as $message )
  <div class="alert alert-danger display-hide">
   
   <span>{{ $message }}</span>
  </div>
 @endforeach
@endif
    </form>
    <!--end::Signin Form-->

</x-auth-layout>
