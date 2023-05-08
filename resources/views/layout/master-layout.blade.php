<!DOCTYPE html>



<html lang="en">

<!--begin::Head-->



<head>

    <base href="" />

    <title>Admin</title>

    <meta charset="utf-8" />

    <link rel="shortcut icon" href="{{ asset('demo1/media/logos/logo.png') }}" />

    <!--begin::Fonts-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    <!--end::Fonts-->

     <!--begin::Global Stylesheets Bundle(used by all pages)-->

    <link href="{{ asset('demo1/plugins/global/plugins.bundle.css') }}" rel="stylesheet"

        type="text/css" />
        
        <link href="{{ asset('demo1/plugins/global/custom.css') }}" rel="stylesheet"

        type="text/css" />

    <link href="{{ asset('demo1/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <meta name="csrf-token" content="{{ csrf_token() }}" />



<script>
    state_id = null;
    city_id= null;
</script>
</head>

<!--end::Head-->

<!--begin::Body-->



<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"

    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"

    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"

    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">

    <!--begin::Theme mode setup on page load-->

    <script>

        var defaultThemeMode = "light";

        var themeMode;

        if (document.documentElement) {

            if (document.documentElement.hasAttribute("data-theme-mode")) {

                themeMode = document.documentElement.getAttribute("data-theme-mode");

            } else {

                if (localStorage.getItem("data-theme") !== null) {

                    themeMode = localStorage.getItem("data-theme");

                } else {

                    themeMode = defaultThemeMode;

                }

            }

            if (themeMode === "system") {

                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";

            }

            document.documentElement.setAttribute("data-theme", themeMode);

        }

    </script>

    <!--end::Theme mode setup on page load-->

    <!--begin::App-->

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">

        <!--begin::Page-->

        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

            <!--begin::Header-->

            @include('layout.header')

            <!--end::Header-->

            <!--begin::Wrapper-->

            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

                <!--begin::Sidebar-->

                @include('layout.sidebar')

                <!--end::Sidebar-->

                <!--begin::Main-->

                @yield('content')

                <!--end:::Main-->

            </div>

            <!--end::Wrapper-->

        </div>

        <!--end::Page-->

    </div>

    <!--end::App-->

    <!--begin::Drawers-->





    <!--end::Drawers-->

    <!--begin::Engage drawers-->



    <!--begin::Javascript-->

    <script>

        var hostUrl = "assets/";

    </script>

    <!--end::Vendors Javascript-->


    <script src="{{ asset('demo1/plugins/global/plugins.bundle.js') }}"></script>

    <script src="{{ asset('demo1/js/scripts.bundle.js') }}"></script>

    <script src="{{ asset('demo1/js/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('demo1/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('demo1/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>

    <script src="{{ asset('demo1/js/jquery.repeater.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('demo1/js/form-repeater.js') }}" type="text/javascript"></script>
    <script src="{{ asset('demo1/js/select2.js') }}" type="text/javascript"></script>

    <script src="https://cdn.ckeditor.com/4.19.1/full/ckeditor.js"></script>
    <!--end::Custom Javascript-->

    <!--end::Javascript-->

    @if(Session::has('success'))



        <script>

            swal({



                title: "Success!",



                text: "{{ Session::get('success') }}",



                icon: 'success'



            });

        </script>



    @endif



    @if(Session::has('error'))



        <script>

            swal({



                title: "Error!",



                text: "{{ Session::get('error') }}",



                icon: 'error'



            });

        </script>



    @endif

    <script>

        

      function validateForm(id) {

      event.preventDefault(); // prevent form submit

      var form = $('#delete-'+id); // storing the form

      swal({

             title: "Are you sure?",

             text: "Once deleted, you will not be able to recover this imaginary file!",

             icon: "warning",

             buttons: true,

             dangerMode: true,

           })

          .then((willDelete) => {

               if (willDelete) {

                     form.submit();

               } else {

                      swal("Your imaginary file is safe!");

           }

        });

}


$('.ckeditor').each(function(){



if ($('textarea[name="'+$(this).attr('name')+'"]').length > 0)



{



CKEDITOR.replace( $(this).attr('name') ,{

    allowedContent:true,

    extraAllowedContent:'span(*)[*]{*},div(*)',

    filebrowserUploadUrl: "{{route('image_upload', ['_token' => csrf_token() ])}}",

    filebrowserUploadMethod: 'form'





});



}



})
if(state_id){
const element = document.querySelector('#country_id')
if(element.value){
const e = new Event("change");
element.dispatchEvent(e);

}
}
if(city_id){
const s = document.querySelector('#state_id')
setTimeout(() => {
    const e1 = new Event("change");
s.dispatchEvent(e1);
}, "1000");
}
function GetState(c)
{
    
    $('#state_id').html('');
var country = c.value
$.ajax({
                    url: "{{url('fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: country,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state_id').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
                            var selected = (state_id==value.id) ? 'selected' : '';
                            $("#state_id").append('<option value="' + value
                                .id + '" '+selected+'>' + value.name + '</option>');
                        });
                        $('#city_id').html('<option value="">-- Select City --</option>');
                    }
                });
}

function getCity(st)
{
var state = st.value;
$("#city").html('');
                $.ajax({
                    url: "{{url('fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: state,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city_id').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            var selected = (city_id==value.id) ? 'selected' : '';
                            $("#city_id").append('<option value="' + value
                                .id + '" '+selected+'>' + value.name + '</option>');
                        });
                    }
                });
}
const b = document.querySelector('[name="billing_id"]');
if(b){
if(b.value){
const e = new Event("change");
b.dispatchEvent(e);
}
}
const p = document.querySelector('[name="party_id"]');
if(p){
if(p.value){
const e = new Event("change");
p.dispatchEvent(e);
}
}
function getBilling(billing)
{
 var billing_id = billing.value;

 $.ajax({
                    url: "{{url('getBilling')}}",
                    type: "POST",
                    data: {
                        billing_id: billing_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) 
                    {
                       var html = res.company_name+'<br>'+res.address_1+'<br>'+res.address_2+'<br>'+res.city.name+'-'+res.pincode+'<br>'+res.state.name+'-'+res.country.name+'<br><br><br> Email:'+res.email+'<br> Phone:'+res.phone+'<br> GSTIN:'+res.gstin+'<br> PAN:'+res.pan;
                       document.querySelector('[id="from"]').innerHTML = html;
                    }
                });
}

function getParty(party)
{
 var party_id = party.value;

 $.ajax({
                    url: "{{url('getParty')}}",
                    type: "POST",
                    data: {
                        party_id: party_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) 
                    {
                        var html = res.name+'<br>'+res.address+'<br>'+res.address_1+'<br>'+res.party_city.name+'-'+res.pincode+'<br>'+res.party_state.name+'-'+res.party_country.name+'<br><br> Email:'+res.email+'<br> Phone:'+res.cell_phone+'<br> GSTIN:'+res.client_gst_number+'<br> PAN:'+res.pan;
                       document.querySelector('[id="to"]').innerHTML = html;
                    }
                });
}

function getService(cont,sid)
{
    
 var cid = cont.value;
 var sel = cont.closest('td').nextElementSibling.childNodes[0];

 $.ajax({
                    url: "{{url('getService')}}",
                    type: "POST",
                    data: {
                        cid: cid,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) 
                    {
                        $.each(res, function (key, value) {
                            var selected = (value.id==sid) ? 'selected' : '';
                            $(sel).append('<option value="' + value
                                .id + '" '+selected+'>' + value.name + '</option>');
                        });
                    }
                });
}

function serviceDetail(service)
{
var bid = b.value;
 var service_id = service.value;
 var sac = service.closest('td').nextElementSibling.nextElementSibling.childNodes[0];
 var gst = service.closest('td').nextElementSibling.nextElementSibling.nextElementSibling.childNodes[0];
 var rate = service.closest('td').nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.childNodes[0];


 $.ajax({
                    url: "{{url('serviceDetail')}}",
                    type: "POST",
                    data: {
                        service_id: service_id,
                        bid: bid,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) 
                    {
                        sac.value= res.sac_code 
                        gst.value= res.gst 
                        rate.value= res.rate 
                        setTimeout(function(){
                            calculateInvoice()
                            }, 1000);
                        
                    }
                });
}

function getGst()
{
    setTimeout(function(){
calculateInvoice()
     }, 1000);
    }
    
    function getRate()
   {
   
    setTimeout(function(){
calculateInvoice()
     }, 1000);
    }
function calculateInvoice()
{
var cgst = 0;
var sgst = 0;
var subTotal = 0;
var Total = 0;
document.querySelectorAll('tbody.field_wrapper tr').forEach(function(button) 
{
    var gst  = button.getElementsByTagName("td")[5].children[0].value;
    var rate  = button.getElementsByTagName("td")[6].children[0].value;
   var total_gst = percentage(parseInt(gst),parseInt(rate));
   Total += parseInt(rate)+parseInt(total_gst);
   subTotal += parseInt(rate);
   cgst += parseInt(total_gst/2);
   sgst += parseInt(total_gst/2);

   
});

document.getElementById("Subtotal").innerHTML = subTotal;
document.getElementById("CGST").innerHTML = cgst;
document.getElementById("SGST").innerHTML = sgst;
document.getElementById("Total").innerHTML = Total;
}
function percentage(percent, total) {
    return ((percent/ 100) * total).toFixed(2)
} 


function checkJob(ele)
{
    if(ele.value)
    ele.value=='First' ? ele.closest('td').nextElementSibling.style.display = 'none': ele.closest('td').nextElementSibling.style.display = 'block';
}
   
function viewInvoice(id)
{
    $.ajax({
                    url: "{{url('invoice/download')}}/"+id,
                    type: "get",
                    headers:
                        {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    dataType: 'json',
                    success: function (res) 
                    {
                        $("#content").html(res.html)
                        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'))
                         myModal.show() 
                        
                    }
                });
}

function viewPI(id)
{
    $.ajax({
                    url: "{{url('proforma-invoice/download')}}/"+id,
                    type: "get",
                    headers:
                        {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    dataType: 'json',
                    success: function (res) 
                    {
                        $("#content").html(res.html)
                        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'))
                         myModal.show() 
                        
                    }
                });
}

document.querySelectorAll('tbody.field_wrapper tr').forEach(function(term) 
{
    
    var cat  = term.getElementsByTagName("td")[0].children.length > 0 ? term.getElementsByTagName("td")[0].children[0] : term.getElementsByTagName("td")[1].children[0];
    if(cat.value)
    {
        const e = new Event("change");
        cat.dispatchEvent(e); 
    }
   
});

function changeStatus(ele,id,model)
{
    swal({

title: "Are you sure?",

text: "",

icon: "warning",

buttons: true,

dangerMode: true,

})

.then((willDelete) => {

  if (willDelete) {
    $.ajax({
                    url: "{{url('changeStatus')}}",
                    type: "post",
                    headers:
                        {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    dataType: 'json',
                    data:{
                        status:ele.value,
                        id:id,
                        model:model
                    },
                    success: function (res) 
                    {
                        if(res.success)
                        {
                            swal({title: "Good job", text: "Status Updated", type: 
"success"}).then(function(){ 
   location.reload();
   }
);
                        }
                        
                    }
                });

  } else {

         swal("Your imaginary file is safe!");

}

});
}

function changeJobStatus(ele,id)
{
    swal({

title: "Are you sure?",

text: "",

icon: "warning",

buttons: true,

dangerMode: true,

})

.then((willDelete) => {

  if (willDelete) {
    $.ajax({
                    url: "{{url('changeJobStatus')}}",
                    type: "post",
                    headers:
                        {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    dataType: 'json',
                    data:{
                        status:ele.value,
                        id:id
                    },
                    success: function (res) 
                    {
                        if(res.success)
                        {
                            swal({title: "Good job", text: "Status Updated", type: 
"success"}).then(function(){ 
   location.reload();
   }
);
                        }
                        
                    }
                });

  } else {

         swal("Your imaginary file is safe!");

}

});
}

function getProforma(p)
{
    var current_url = "{{route('invoice.create')}}";
    if(p.value!='')
    {
        current_url = current_url+'?performa_id='+p.value
    }
    window.location.href = current_url;

}
document.querySelectorAll('tbody.field_wrapper tr').forEach(function(ele) 
{
    var c  = ele.getElementsByTagName("td")[1].children[0];
if(c.value)
{
    const e = new Event("change");
    c.dispatchEvent(e);
}
    
   
});

$(".date-range").daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });
  $(".date-range").on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
  });
    
   </script>
@if(Request::get('performa_id') || Route::current()->getName()=='invoice.edit' || Route::current()->getName()=='proforma-invoice.edit')
<script>
setTimeout(function(){
    calculateInvoice()
}, 1000);
</script>
@endif
</body>

<!--end::Body-->



</html>