<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>TAX INVOICE</title>

<link href="https://fonts.googleapis.com/css2?family=Muli:wght@200;300;400;500;700&display=swap" rel="stylesheet">

<style type="text/css">

   .print

   {

	   width:140px;

	   height:35px;

	   line-height:32px;

	   text-align:center;

	   border:none;

	   border-radius:20px;

	   background:#f60;

	   margin-bottom:20px;

	   cursor:pointer;

	   color:#fff;

	   font-family: 'Muli', sans-serif;

   }

</style>



<script> 

        function printDiv() { 

            var divContents = document.getElementById("panel").innerHTML; 

            var a = window.open('', '', 'height=800, width=800'); 

            a.document.write('<html>'); 

            a.document.write('<body> '); 

            a.document.write(divContents); 

            a.document.write('</body></html>'); 

            a.document.close(); 

            a.print(); 

        } 

    </script> 

</head>



<body>

<div onclick="printDiv()" class="print">Print Invoice</div>

<div id="panel">



@if($invoice->billing->preffix=='KDN')

<table style="border:1px solid #999999;" width="100%" border="0" cellpadding="0" cellspacing="0" class="tb">

  <tbody>

    <tr>

      <td height="35" colspan="4" align="center" class="txt" style="border-bottom:1px solid #ddd; color:#d04e00; font-weight:800; font-family: 'Muli', sans-serif;">TAX INVOICE</td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tbody>

          <tr>

            <td height="49" valign="bottom"><img src="/public/storage/uploads/1680865709_KDN.png" style="width:200px; margin:10px"></td>

			<td style="text-align: end;">@if($invoice->billing->logo)<img src="{{asset('storage/uploads/'.$invoice->billing->logo)}}" style="width:100px;margin:10px">@endif</td>

            </tr>

          <tr>

            <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" >{{ strip_tags($invoice->billing->address_1)}}</br>

          																							{{ strip_tags($invoice->billing->address_2)}}</br>

        																							{{$invoice->billing->city->name}} - {{$invoice->billing->pincode}}</br>

        																							{{$invoice->billing->state->name}} - {{$invoice->billing->country->name}}</br>

  																									@if($invoice->billing->phone) Contact:@endif {{$invoice->billing->phone}}

            </td>

            <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" >@if($invoice->billing->gstin) GSTIN:@endif {{$invoice->billing->gstin}}</br>

  																									@if($invoice->billing->pan) PAN:@endif {{$invoice->billing->pan}}</br>

              																						@if($invoice->billing->email) Email:@endif {{$invoice->billing->email}}</br>

              																						@if($invoice->billing->website) Website:@endif {{$invoice->billing->website}}

   			</td>

            </tr>

        </tbody>

      </table></td>

      <td>&nbsp;</td>

    </tr>

      <tr>

      <td width="3%">&nbsp;</td>

      <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb1">

        <tbody>

          <tr>

            <td><table style="border:1px solid #999999;" width="100%" border="0" cellspacing="0" cellpadding="0">

              <tbody>

                <tr>

                  <td width="16%" height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Party Name </span></strong></td>

                  <td width="49%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->name}}</span></td>

                  <td width="20%"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Date</span></strong></td>

                  <td width="15%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{ date("d-m-Y",strtotime($invoice->invoice_date))}}</span></td>

                </tr>

                <tr>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Address</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{!! $invoice->party->address!!}, {!! $invoice->party->address_1!!} </span></td>

                  <td><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Number</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->invoice_number}}</span></td>

                </tr>

                <tr>

				  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

				  </span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;"> {{$invoice->party->party_city->name}} - {{$invoice->party->pincode}}, {{$invoice->party->party_state->name}} - {{$invoice->party->party_country->name}} </span></td>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->client_gst_number) GSTIN @endif</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->client_gst_number}}</span></td>

                </tr>

				<tr>

				  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Contact</span></strong></td>



@php $sep = !empty($invoice->party->email) && !empty($invoice->party->cell_phone) ? '|'  : ''; @endphp       



                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->cell_phone}} {{$sep}} {{$invoice->party->email}} </span></td>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->pan) PAN No @endif</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->pan}}</span></td>

                </tr>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td height="31" style="border-top:1px solid #999999;">&nbsp;</td>

          </tr>

          <tr>

            <td>

			<table style="border:1px solid #999999;" width="100%" border="1" cellpadding="0" cellspacing="0" class="tb2">

              <tbody>

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td width="7%" height="30" align="center"><strong>S.N</strong></td>

                  <td width="68%" align="center"><strong>Description </strong></td>

                  <td width="12%" align="center"><strong>SAC Code</strong></td>

                  <td width="13%" align="center"><strong>Amount</strong></td>

                </tr>

                @foreach($invoice->items as $k=>$item)

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="50" align="center">{{$k+1}}.</td>

                  <td align="center">{{$item->service->narration}}<br> @if ($item->from !='1970-01-01' || $item->to !='1970-01-01') Fees For {{date("F j, Y",strtotime($item->from)).' to '.date("F j, Y",strtotime($item->to))}}@endif</br>

                  @if($item->remarks) {{$item->remarks}} @endif</td>

                  <td align="center">{{$item->sac}}</td>

                  <td align="center">{{$item->rate}}</td>

                </tr>

                @endforeach

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center"><strong>Sub Total</strong></td>

                  <td align="center">{{$invoice->subtotal}}</td>

                </tr>

				<tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center"><strong>SGST 9%</strong></td>

                  <td align="center">{{$invoice->total_sgst}}</td>

				  <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center"><strong>CGST 9%</strong></td>

                  <td align="center">{{$invoice->total_cgst}}</td>

				  <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center"><strong>Total</strong></td>

                  <td align="center">{{$invoice->total}}</td>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb2">

              <tbody>

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td width="15%" height="20" align="right">@if($invoice->remarks)Remarks :@endif </td>

                  <td width="85%" align="Left">  {{$invoice->remarks}}</td>

                </tr>

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td height="20" align="right">Bank Details : </td>

                  <td align="Left">{!!$invoice->billing->bank_details!!}</td>

                </tr>

				<tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td height="20" align="right">Notes : </td>

                  <td align="Left">  {!!$invoice->billing->note!!}</td>

                </tr>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

        </tbody>

            </table>

	        </td>

      <td width="3%">&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td height="25">&nbsp;</td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" height="32"><strong>&nbsp;</strong></td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" align="right"><strong>For {{$invoice->billing->company_name}}</strong></td>

      <td height="25">&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td height="50">&nbsp;</td>

      <td>&nbsp;</td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" align="right" valign="bottom"><strong>Authorised Signatory</strong></td>

      <td>&nbsp;
      </td>

    </tr>

  </tbody>

</table>
@if($invoice->status==2)<span style="font-size:18px; color:#ff0000; font-weight:800; font-family: 'Muli', sans-serif;">This INVOICE is Cancelled</span>@endif


@elseif($invoice->billing->preffix=='KVS')



      <table style="border:1px solid #999999;" width="100%" border="0" cellpadding="0" cellspacing="0" class="tb">

            <tbody>

                <tr>

                    <td>&nbsp;</td>

                    <td colspan="2">

                        <table width="100%" style="color:cadetblue;" border="0" cellspacing="0" cellpadding="0">

                            <tbody>

                                <tr>

                                    <td height="49" valign="bottom" style=" font-size:20px; color:#0000FF; font-weight:800; font-family: 'Muli', sans-serif;">{{$invoice->billing->company_name}}</td>

                                    <td></td>

                                </tr>

                                <tr>

                                    <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{ strip_tags($invoice->billing->address_1)}}</br>

																															{{ strip_tags($invoice->billing->address_2)}}</br>

																															{{$invoice->billing->city->name}} - {{$invoice->billing->pincode}}</br>

																															{{$invoice->billing->state->name}} - {{$invoice->billing->country->name}}

																																																														</td>

									<td  style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->billing->phone) Contact:@endif {{$invoice->billing->phone}}</br>

																															@if($invoice->billing->email) Email:@endif {{$invoice->billing->email}}</br>

																															@if($invoice->billing->website) Website:@endif {{$invoice->billing->website}}</br>

																															@if($invoice->billing->pan) Pan No:@endif {{$invoice->billing->pan}}

									</td>

                                </tr>

								

								<tr>

                    <td height="35" colspan="4" align="center" class="txt" style="border:2px solid #ddd; color:#0000FF; font-weight:800; font-family: 'Muli', sans-serif;">TAX INVOICE</td>

                </tr>			

                                </tbody>

                        </table>  

        

        

      </td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td height="36" colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td width="3%">&nbsp;</td>

      <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb1">

        <tbody>

          <tr>

            <td><table style="border:0px solid #999999;" width="100%" border="0" cellspacing="0" cellpadding="0">

              <tbody>

                <tr>

                  <td width="16%" height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Party Name </span></strong></td>

                  <td width="49%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->name}}</span></td>

                  <td width="20%"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Date</span></strong></td>

                  <td width="15%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{ date("d-m-Y",strtotime($invoice->invoice_date))}}</span></td>

                </tr>

                <tr>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Address</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{!! $invoice->party->address!!}, {!! $invoice->party->address_1!!} </span></td>

                  <td><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Number</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->invoice_number}}</span></td>

                </tr>

                <tr>

				  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

				  </span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;"> {{$invoice->party->party_city->name}} - {{$invoice->party->pincode}}, {{$invoice->party->party_state->name}} - {{$invoice->party->party_country->name}} </span></td>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->client_gst_number) GSTIN @endif</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->client_gst_number}}</span></td>

                </tr>

				<tr>

				  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Contact</span></strong></td>



                  @php $sep = !empty($invoice->party->email) && !empty($invoice->party->cell_phone) ? '|'  : ''; @endphp       



                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->cell_phone}} {{$sep}} {{$invoice->party->email}} </span></td>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->pan) PAN No @endif</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->pan}}</span></td>

                </tr>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td height="31" style="border-top:0px solid #999999;">&nbsp;</td>

          </tr>

          <tr>

            <td>

			<table style="border:1px solid #999999;" width="100%" border="1" cellpadding="0" cellspacing="0" class="tb2">

              <tbody>

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td width="7%" height="30" align="center"><strong>S.N</strong></td>

                  <td width="68%" align="center"><strong>Description </strong></td>

                  <td width="12%" align="center"><strong>SAC Code</strong></td>

                  <td width="13%" align="center"><strong>Amount</strong></td>

                </tr>



                @foreach($invoice->items as $k=>$item)

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="50" align="center">{{$k+1}}.</td>

                  <td align="center">{{$item->service->narration}}<br> @if ($item->from !='1970-01-01' || $item->to !='1970-01-01') Fees For {{date("F j, Y",strtotime($item->from)).' to '.date("F j, Y",strtotime($item->to))}}@endif</br>

                  @if($item->remarks) {{$item->remarks}} @endif</td>

                  <td align="center">{{$item->sac}}</td>

                  <td align="center">{{$item->rate}}</td>

                </tr>

                @endforeach



                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center"><strong>Sub Total</strong></td>

                  <td align="center">{{$invoice->subtotal}}</td>

                </tr>

				 <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center"><strong>Total</strong></td>

                  <td align="center">{{$invoice->total}}</td>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb2">

              <tbody>

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td width="15%" height="20" align="right">@if($invoice->remarks)Remarks :@endif </td>

                  <td width="85%" align="Left">  {{$invoice->remarks}}</td>

                </tr>

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td height="20" align="right">Bank Details : </td>

                  <td align="Left">{!!$invoice->billing->bank_details!!}</td>

                </tr>

				<tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td height="20" align="right">Notes : </td>

                  <td align="Left">  {!!$invoice->billing->note!!}</td>

                </tr>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

        </tbody>

            </table>

	        </td>

      <td width="3%">&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td height="25">&nbsp;</td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" height="32"><strong>&nbsp;</strong></td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" align="right"><strong>For {{$invoice->billing->company_name}}</strong></td>

      <td height="25">&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td height="50">&nbsp;</td>

      <td>&nbsp;</td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" align="right" valign="bottom"><strong>Authorised Signatory</strong></td>

      <td>&nbsp;</td>

    </tr>

  </tbody>

</table>
@if($invoice->status==2)<span style="font-size:18px; color:#ff0000; font-weight:800; font-family: 'Muli', sans-serif;">This INVOICE is Cancelled</span>@endif


@elseif($invoice->billing->preffix=='UR')

      <table style="border:1px solid #999999;" width="100%" border="0" cellpadding="0" cellspacing="0" class="tb">

  <tbody>

    <tr>

      <td height="35" colspan="4" align="center" class="txt" style="border-bottom:1px solid #ddd; color:#fff; font-weight:800; font-family: 'Muli', sans-serif; -webkit-print-color-adjust: exact; background: #000000;">TAX INVOICE</td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tbody>

          <tr>

            <td height="49" style="font-family: 'Muli', sans-serif;">@if($invoice->billing->logo)<img src="{{asset('storage/uploads/'.$invoice->billing->logo)}}" style="width:100px;margin:10px">@endif</br>

			<span valign="top" style=" font-size:24px; color:#000000; font-weight:800; font-family: 'Muli', sans-serif;">NPKU & ASSOCIATES</span></br>

			@if($invoice->billing->gstin) GSTIN:@endif {{$invoice->billing->gstin}}</br>

			@if($invoice->billing->pan) PAN:@endif {{$invoice->billing->pan}}</br>

			@if($invoice->billing->website) Website:@endif {{$invoice->billing->website}}</br>

			</td>

			<td style="font-family: 'Muli', sans-serif;">NPKU & ASSOCIATES</br>

			{{ strip_tags($invoice->billing->address_1)}}</br>

			{{ strip_tags($invoice->billing->address_2)}}</br>

			{{$invoice->billing->city->name}} - {{$invoice->billing->pincode}}</br>

			{{$invoice->billing->state->name}} - {{$invoice->billing->country->name}}</br>

			@if($invoice->billing->phone) Contact:@endif {{$invoice->billing->phone}}</br>

            @if($invoice->billing->email) Email:@endif {{$invoice->billing->email}}

			</td>

            </tr>

          </tbody>

      </table>

     </td>

      <td>&nbsp;</td>

    </tr>

    

    <tr>

      <td width="3%">&nbsp;</td>

      <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb1">

        <tbody>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tbody>

                <tr>

                  <td width="16%" height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Party Name </span></strong></td>

                  <td width="49%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->name}}</span></td>

                  <td width="20%"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Date</span></strong></td>

                  <td width="15%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{ date("d-m-Y",strtotime($invoice->invoice_date))}}</span></td>

                </tr>

                <tr>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Address</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{!! $invoice->party->address!!}, {!! $invoice->party->address_1!!} </span></td>

                  <td><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Number</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->invoice_number}}</span></td>

                </tr>

                <tr>

				  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

				  </span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;"> {{$invoice->party->party_city->name}} - {{$invoice->party->pincode}}, {{$invoice->party->party_state->name}} - {{$invoice->party->party_country->name}} </span></td>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->client_gst_number) GSTIN @endif</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->client_gst_number}}</span></td>

                </tr>

				<tr>

				  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Contact</span></strong></td>

@php $sep = !empty($invoice->party->email) && !empty($invoice->party->cell_phone) ? '|'  : ''; @endphp       

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->cell_phone}} {{$sep}} {{$invoice->party->email}} </span></td>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->pan) PAN No @endif</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->pan}}</span></td>

                </tr>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td height="31">&nbsp;</td>

          </tr>

          <tr>

            <td>

			<table width="100%" cellpadding="0" cellspacing="0" class="tb2">

              <tbody>

                <tr style=" font-size:13px; color:#fff; padding:5px; font-family: 'Muli', sans-serif; -webkit-print-color-adjust: exact; background: #000000;">

                  <td width="7%" height="30" align="center"><strong>S.N</strong></td>

                  <td width="68%" align="center"><strong>Description </strong></td>

                  <td width="12%" align="center"><strong>SAC Code</strong></td>

                  <td width="13%" align="center"><strong>Amount</strong></td>

                </tr>

                @foreach($invoice->items as $k=>$item)

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; border-bottom: 1px solid #ccc; line-height: 1.8em;  -webkit-print-color-adjust: exact;">

                  <td height="50" align="center" style="border-bottom: 1px solid #ccc;">{{$k+1}}.</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$item->service->narration}}<br> @if ($item->from !='1970-01-01' || $item->to !='1970-01-01') Fees For {{date("F j, Y",strtotime($item->from)).' to '.date("F j, Y",strtotime($item->to))}} </br>@endif

                  @if($item->remarks) {{$item->remarks}} @endif</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$item->sac}}</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$item->rate}}</td>

                </tr>

                @endforeach



                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;"><strong>Sub Total</strong></td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$invoice->subtotal}}</td>

                </tr>

				<tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;"><strong>SGST 9%</strong></td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$invoice->total_sgst}}</td>

				  <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;"><strong>CGST 9%</strong></td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$invoice->total_cgst}}</td>

				  <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center"><strong>Total</strong></td>

                  <td align="center">{{$invoice->total}}</td>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb2">

              <tbody>

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td width="15%" height="20" align="right">@if($invoice->remarks)Remarks :@endif </td>

                  <td width="85%" align="Left">  {{$invoice->remarks}}</td>

                </tr>

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td height="20" align="right">Bank Details : </td>

                  <td align="Left">{!!$invoice->billing->bank_details!!}</td>

                </tr>

				<tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td height="20" align="right">Notes : </td>

                  <td align="Left">  {!!$invoice->billing->note!!}</td>

                </tr>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

        </tbody>

            </table>

	        </td>

      <td width="3%">&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td height="25">&nbsp;</td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" height="32"><strong>&nbsp;</strong></td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" align="right"><strong>For NPKU & ASSOCIATES</strong></td>

      <td height="25">&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td height="50">&nbsp;</td>

      <td>&nbsp;</td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" align="right" valign="bottom"><strong>Authorised Signatory</strong></td>

      <td>&nbsp;</td>

    </tr>

  </tbody>

</table>
@if($invoice->status==2)<span style="font-size:18px; color:#ff0000; font-weight:800; font-family: 'Muli', sans-serif;">This INVOICE is Cancelled</span>@endif


@elseif($invoice->billing->preffix=='KS')

      <table style="border:1px solid #999999;" width="100%" border="0" cellpadding="0" cellspacing="0" class="tb">

  <tbody>

    <tr>

      <td height="35" colspan="4" align="center" class="txt" style="border-bottom:1px solid #ddd; color:#fff; font-weight:800; font-family: 'Muli', sans-serif; -webkit-print-color-adjust: exact; background: #000000;">TAX INVOICE</td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tbody>

          <tr>

            <td height="49" style="font-family: 'Muli', sans-serif;">@if($invoice->billing->logo)<img src="{{asset('storage/uploads/'.$invoice->billing->logo)}}" style="width:100px;margin:10px">@endif</br>

			<span valign="top" style=" font-size:24px; color:#000000; font-weight:800; font-family: 'Muli', sans-serif;">NPKU & ASSOCIATES</span></br>

			@if($invoice->billing->gstin) GSTIN:@endif {{$invoice->billing->gstin}}</br>

			@if($invoice->billing->pan) PAN:@endif {{$invoice->billing->pan}}</br>

			@if($invoice->billing->website) Website:@endif {{$invoice->billing->website}}</br>

			</td>

			<td style="font-family: 'Muli', sans-serif;">NPKU & ASSOCIATES</br>

			{{ strip_tags($invoice->billing->address_1)}}</br>

			{{ strip_tags($invoice->billing->address_2)}}</br>

			{{$invoice->billing->city->name}} - {{$invoice->billing->pincode}}</br>

			{{$invoice->billing->state->name}} - {{$invoice->billing->country->name}}</br>

			@if($invoice->billing->phone) Contact:@endif {{$invoice->billing->phone}}</br>

            @if($invoice->billing->email) Email:@endif {{$invoice->billing->email}}

			</td>

            </tr>

          </tbody>

      </table>

     </td>

      <td>&nbsp;</td>

    </tr>

    

    <tr>

      <td width="3%">&nbsp;</td>

      <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb1">

        <tbody>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tbody>

                <tr>

                  <td width="16%" height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Party Name </span></strong></td>

                  <td width="49%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->name}}</span></td>

                  <td width="20%"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Date</span></strong></td>

                  <td width="15%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{ date("d-m-Y",strtotime($invoice->invoice_date))}}</span></td>

                </tr>

                <tr>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Address</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{!! $invoice->party->address!!}, {!! $invoice->party->address_1!!} </span></td>

                  <td><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Number</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->invoice_number}}</span></td>

                </tr>

                <tr>

				  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

				  </span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;"> {{$invoice->party->party_city->name}} - {{$invoice->party->pincode}}, {{$invoice->party->party_state->name}} - {{$invoice->party->party_country->name}} </span></td>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->client_gst_number) GSTIN @endif</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->client_gst_number}}</span></td>

                </tr>

				<tr>

				  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Contact</span></strong></td>

@php $sep = !empty($invoice->party->email) && !empty($invoice->party->cell_phone) ? '|'  : ''; @endphp       

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->cell_phone}} {{$sep}} {{$invoice->party->email}} </span></td>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->pan) PAN No @endif</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->pan}}</span></td>

                </tr>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td height="31">&nbsp;</td>

          </tr>

          <tr>

            <td>

			<table width="100%" cellpadding="0" cellspacing="0" class="tb2">

              <tbody>

                <tr style=" font-size:13px; color:#fff; padding:5px; font-family: 'Muli', sans-serif; -webkit-print-color-adjust: exact; background: #000000;">

                  <td width="7%" height="30" align="center"><strong>S.N</strong></td>

                  <td width="68%" align="center"><strong>Description </strong></td>

                  <td width="12%" align="center"><strong>SAC Code</strong></td>

                  <td width="13%" align="center"><strong>Amount</strong></td>

                </tr>

                @foreach($invoice->items as $k=>$item)

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; border-bottom: 1px solid #ccc; line-height: 1.8em;  -webkit-print-color-adjust: exact;">

                  <td height="50" align="center" style="border-bottom: 1px solid #ccc;">{{$k+1}}.</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$item->service->narration}}<br> @if ($item->from !='1970-01-01' || $item->to !='1970-01-01') Fees For {{date("F j, Y",strtotime($item->from)).' to '.date("F j, Y",strtotime($item->to))}} </br>@endif

                  @if($item->remarks) {{$item->remarks}} @endif</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$item->sac}}</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$item->rate}}</td>

                </tr>

                @endforeach



                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;"><strong>Sub Total</strong></td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$invoice->subtotal}}</td>

                </tr>

				<tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;"><strong>SGST 9%</strong></td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$invoice->total_sgst}}</td>

				  <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;"><strong>CGST 9%</strong></td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$invoice->total_cgst}}</td>

				  <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center"><strong>Total</strong></td>

                  <td align="center">{{$invoice->total}}</td>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb2">

              <tbody>

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td width="15%" height="20" align="right">@if($invoice->remarks)Remarks :@endif </td>

                  <td width="85%" align="Left">  {{$invoice->remarks}}</td>

                </tr>

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td height="20" align="right">Bank Details : </td>

                  <td align="Left">{!!$invoice->billing->bank_details!!}</td>

                </tr>

				<tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td height="20" align="right">Notes : </td>

                  <td align="Left">  {!!$invoice->billing->note!!}</td>

                </tr>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

        </tbody>

            </table>

	        </td>

      <td width="3%">&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td height="25">&nbsp;</td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" height="32"><strong>&nbsp;</strong></td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" align="right"><strong>For NPKU & ASSOCIATES</strong></td>

      <td height="25">&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td height="50">&nbsp;</td>

      <td>&nbsp;</td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" align="right" valign="bottom"><strong>Authorised Signatory</strong></td>

      <td>&nbsp;</td>

    </tr>

  </tbody>

</table>
@if($invoice->status==2)<span style="font-size:18px; color:#ff0000; font-weight:800; font-family: 'Muli', sans-serif;">This INVOICE is Cancelled</span>@endif



@elseif($invoice->billing->preffix=='NG')

      <table style="border:1px solid #999999;" width="100%" border="0" cellpadding="0" cellspacing="0" class="tb">

  <tbody>

    <tr>

      <td height="35" colspan="4" align="center" class="txt" style="border-bottom:1px solid #ddd; color:#fff; font-weight:800; font-family: 'Muli', sans-serif; -webkit-print-color-adjust: exact; background: #000000;">TAX INVOICE</td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tbody>

          <tr>

            <td height="49" style="font-family: 'Muli', sans-serif;">@if($invoice->billing->logo)<img src="{{asset('storage/uploads/'.$invoice->billing->logo)}}" style="width:100px;margin:10px">@endif</br>

			<span valign="top" style=" font-size:24px; color:#000000; font-weight:800; font-family: 'Muli', sans-serif;">NPKU & ASSOCIATES</span></br>

			@if($invoice->billing->gstin) GSTIN:@endif {{$invoice->billing->gstin}}</br>

			@if($invoice->billing->pan) PAN:@endif {{$invoice->billing->pan}}</br>

			@if($invoice->billing->website) Website:@endif {{$invoice->billing->website}}</br>

			</td>

			<td style="font-family: 'Muli', sans-serif;">NPKU & ASSOCIATES</br>

			{{ strip_tags($invoice->billing->address_1)}}</br>

			{{ strip_tags($invoice->billing->address_2)}}</br>

			{{$invoice->billing->city->name}} - {{$invoice->billing->pincode}}</br>

			{{$invoice->billing->state->name}} - {{$invoice->billing->country->name}}</br>

			@if($invoice->billing->phone) Contact:@endif {{$invoice->billing->phone}}</br>

            @if($invoice->billing->email) Email:@endif {{$invoice->billing->email}}

			</td>

            </tr>

          </tbody>

      </table>

     </td>

      <td>&nbsp;</td>

    </tr>

    

    <tr>

      <td width="3%">&nbsp;</td>

      <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb1">

        <tbody>

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tbody>

                <tr>

                  <td width="16%" height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Party Name </span></strong></td>

                  <td width="49%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->name}}</span></td>

                  <td width="20%"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Date</span></strong></td>

                  <td width="15%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{ date("d-m-Y",strtotime($invoice->invoice_date))}}</span></td>

                </tr>

                <tr>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Address</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{!! $invoice->party->address!!}, {!! $invoice->party->address_1!!} </span></td>

                  <td><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Number</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->invoice_number}}</span></td>

                </tr>

                <tr>

				  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

				  </span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;"> {{$invoice->party->party_city->name}} - {{$invoice->party->pincode}}, {{$invoice->party->party_state->name}} - {{$invoice->party->party_country->name}} </span></td>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->client_gst_number) GSTIN @endif</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->client_gst_number}}</span></td>

                </tr>

				<tr>

				  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Contact</span></strong></td>

@php $sep = !empty($invoice->party->email) && !empty($invoice->party->cell_phone) ? '|'  : ''; @endphp       

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->cell_phone}} {{$sep}} {{$invoice->party->email}} </span></td>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->pan) PAN No @endif</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->pan}}</span></td>

                </tr>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td height="31">&nbsp;</td>

          </tr>

          <tr>

            <td>

			<table width="100%" cellpadding="0" cellspacing="0" class="tb2">

              <tbody>

                <tr style=" font-size:13px; color:#fff; padding:5px; font-family: 'Muli', sans-serif; -webkit-print-color-adjust: exact; background: #000000;">

                  <td width="7%" height="30" align="center"><strong>S.N</strong></td>

                  <td width="68%" align="center"><strong>Description </strong></td>

                  <td width="12%" align="center"><strong>SAC Code</strong></td>

                  <td width="13%" align="center"><strong>Amount</strong></td>

                </tr>

                @foreach($invoice->items as $k=>$item)

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; border-bottom: 1px solid #ccc; line-height: 1.8em;  -webkit-print-color-adjust: exact;">

                  <td height="50" align="center" style="border-bottom: 1px solid #ccc;">{{$k+1}}.</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$item->service->narration}}<br> @if ($item->from !='1970-01-01' || $item->to !='1970-01-01') Fees For {{date("F j, Y",strtotime($item->from)).' to '.date("F j, Y",strtotime($item->to))}} </br>@endif

                  @if($item->remarks) {{$item->remarks}} @endif</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$item->sac}}</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$item->rate}}</td>

                </tr>

                @endforeach



                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;"><strong>Sub Total</strong></td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$invoice->subtotal}}</td>

                </tr>

				<tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;"><strong>SGST 9%</strong></td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$invoice->total_sgst}}</td>

				  <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center" style="border-bottom: 1px solid #ccc;"><strong>CGST 9%</strong></td>

                  <td align="center" style="border-bottom: 1px solid #ccc;">{{$invoice->total_cgst}}</td>

				  <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center"><strong>Total</strong></td>

                  <td align="center">{{$invoice->total}}</td>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb2">

              <tbody>

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td width="15%" height="20" align="right">@if($invoice->remarks)Remarks :@endif </td>

                  <td width="85%" align="Left">  {{$invoice->remarks}}</td>

                </tr>

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td height="20" align="right">Bank Details : </td>

                  <td align="Left">{!!$invoice->billing->bank_details!!}</td>

                </tr>

				<tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td height="20" align="right">Notes : </td>

                  <td align="Left">  {!!$invoice->billing->note!!}</td>

                </tr>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

        </tbody>

            </table>

	        </td>

      <td width="3%">&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td height="25">&nbsp;</td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" height="32"><strong>&nbsp;</strong></td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" align="right"><strong>For NPKU & ASSOCIATES</strong></td>

      <td height="25">&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td height="50">&nbsp;</td>

      <td>&nbsp;</td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" align="right" valign="bottom"><strong>Authorised Signatory</strong></td>

      <td>&nbsp;</td>

    </tr>

  </tbody>

</table>
@if($invoice->status==2)<span style="font-size:18px; color:#ff0000; font-weight:800; font-family: 'Muli', sans-serif;">This INVOICE is Cancelled</span>@endif



@elseif($invoice->billing->preffix=='NS')

<table style="border:0px solid #999999;" width="100%" border="0" cellpadding="0" cellspacing="0" class="tb">

            <tbody>

                <tr>

                    <td>&nbsp;</td>

                    <td colspan="2">

                        <table width="100%" style="color:cadetblue;" border="0" cellspacing="0" cellpadding="0">

                            <tbody>

                                <tr>

                                    <td height="49" valign="bottom" style=" font-size:24px; color:#000000; font-weight:800; font-family: 'Muli', sans-serif;">{{$invoice->billing->company_name}}</td>

                                    <td></td>

                                </tr>

                                <tr>

                                    <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{ strip_tags($invoice->billing->address_1)}}</br>

																															{{ strip_tags($invoice->billing->address_2)}}</br>

																															{{$invoice->billing->city->name}} - {{$invoice->billing->pincode}}</br>

																															{{$invoice->billing->state->name}} - {{$invoice->billing->country->name}}

																																																														</td>

									<td  style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->billing->phone) Contact:@endif {{$invoice->billing->phone}}</br>

																															@if($invoice->billing->email) Email:@endif {{$invoice->billing->email}}</br>

																															@if($invoice->billing->website) Website:@endif {{$invoice->billing->website}}</br>

																															@if($invoice->billing->pan) Pan No:@endif {{$invoice->billing->pan}}

									</td>

                                </tr>

								

								<tr>

                    <td height="35" colspan="4" align="center" class="txt" style="border-bottom:1px solid #ddd; color:#fff; font-weight:800; font-family: 'Muli', sans-serif; -webkit-print-color-adjust: exact; background: #000000;">TAX INVOICE</td>

                </tr>			

                                </tbody>

                        </table> </td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td width="3%">&nbsp;</td>

      <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb1">

        <tbody>

          <tr>

            <td><table style="border:1px solid #999999;" width="100%" border="0" cellspacing="0" cellpadding="0">

              <tbody>

                <tr>

                  <td width="16%" height="25" style="border-right:1px solid #999999;"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Party Name </span></strong></td>

                  <td width="49%" style="border-right:1px solid #999999;"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->name}}</span></td>

                  <td width="20%" style="border-right:1px solid #999999;"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Date</span></strong></td>

                  <td width="15%" style="border-right:1px solid #999999;"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{ date("d-m-Y",strtotime($invoice->invoice_date))}}</span></td>

                </tr>

                <tr>

                  <td height="25" style="border-right:1px solid #999999;"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Address</span></strong></td>

                  <td style="border-right:1px solid #999999;"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{!! $invoice->party->address!!}, {!! $invoice->party->address_1!!} </span></td>

                  <td style="border-right:1px solid #999999;"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Number</span></strong></td>

                  <td style="border-right:1px solid #999999;"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->invoice_number}}</span></td>

                </tr>

                <tr>

				  <td height="25" style="border-right:1px solid #999999;"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

				  </span></strong></td>

                  <td style="border-right:1px solid #999999;"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;"> {{$invoice->party->party_city->name}} - {{$invoice->party->pincode}}, {{$invoice->party->party_state->name}} - {{$invoice->party->party_country->name}} </span></td>

                  <td height="25" style="border-right:1px solid #999999;"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->client_gst_number) GSTIN @endif</span></strong></td>

                  <td style="border-right:1px solid #999999;"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->client_gst_number}}</span></td>

                </tr>

				<tr>

				  <td height="25" style="border-right:1px solid #999999;"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Contact</span></strong></td>

@php $sep = !empty($invoice->party->email) && !empty($invoice->party->cell_phone) ? '|'  : ''; @endphp       

                  <td style="border-right:1px solid #999999;"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->cell_phone}} {{$sep}} {{$invoice->party->email}} </span></td>

                  <td height="25" style="border-right:1px solid #999999;"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->pan) PAN No @endif</span></strong></td>

                  <td style="border-right:1px solid #999999;"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->pan}}</span></td>

                </tr>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>

			<table width="100%" border="1" cellpadding="0" cellspacing="0" class="tb2">

              <tbody>

                <tr style=" font-size:13px; color:#fff; padding:5px; font-family: 'Muli', sans-serif; -webkit-print-color-adjust: exact; background: #000000;">

                  <td width="7%" height="30" align="center"><strong>S.N</strong></td>

                  <td width="68%" align="center"><strong>Description </strong></td>

                  <td width="12%" align="center"><strong>SAC Code</strong></td>

                  <td width="13%" align="center"><strong>Amount</strong></td>

                </tr>

                @foreach($invoice->items as $k=>$item)

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="50" align="center">{{$k+1}}.</td>

                  <td align="center">{{$item->service->narration}}<br> @if ($item->from !='1970-01-01' || $item->to !='1970-01-01') Fees For {{date("F j, Y",strtotime($item->from)).' to '.date("F j, Y",strtotime($item->to))}} </br>@endif

                  @if($item->remarks) {{$item->remarks}} @endif</td>

                  <td align="center">{{$item->sac}}</td>

                  <td align="center">{{$item->rate}}</td>

                </tr>

                @endforeach

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center"><strong>Sub Total</strong></td>

                  <td align="center">{{$invoice->subtotal}}</td>

                </tr>

				<tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center"><strong>Total</strong></td>

                  <td align="center">{{$invoice->total}}</td>

          		</tr>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb2">

              <tbody>

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td width="15%" height="20" align="right">@if($invoice->remarks)Remarks :@endif </td>

                  <td width="85%" align="Left">  {{$invoice->remarks}}</td>

                </tr>

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td height="20" align="right">Bank Details : </td>

                  <td align="Left">{!!$invoice->billing->bank_details!!}</td>

                </tr>

				<tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td height="20" align="right">Notes : </td>

                  <td align="Left">  {!!$invoice->billing->note!!}</td>

                </tr>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

        </tbody>

            </table>

	        </td>

      <td width="3%">&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td height="25">&nbsp;</td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" height="32"><strong>&nbsp;</strong></td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" align="right"><strong>For {{$invoice->billing->company_name}}</strong></td>

      <td height="25">&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td height="50">&nbsp;</td>

      <td>&nbsp;</td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" align="right" valign="bottom"><strong>Authorised Signatory</strong></td>

      <td>&nbsp;</td>

    </tr>

  </tbody>

</table>
@if($invoice->status==2)<span style="font-size:18px; color:#ff0000; font-weight:800; font-family: 'Muli', sans-serif;">This INVOICE is Cancelled</span>@endif


@elseif($invoice->billing->preffix=='PE')

<style>

        #customers {

            font-family: Arial, Helvetica, sans-serif;

            border-collapse: collapse;

            width: 100%;}

        #customers td, #customers th {

                border: 1px solid #006400;

                padding: 8px;}

        #customers th {

                padding-top: 12px;

                padding-bottom: 12px;

                text-align: left;

                background-color: #04AA6D;

                color: white;

            }

    </style>



<table style="border:1px solid #999999;" width="100%" border="0" cellpadding="0" cellspacing="0" class="tb">

            <tbody>

                

                <tr>

                    <td>&nbsp;</td>

                    <td colspan="2">

                        <table width="100%" style="color:cadetblue;" border="0" cellspacing="0" cellpadding="0">

                            <tbody>

                                <tr>

                                    <td height="49" valign="bottom" style=" font-size:24px; color:#006400; font-weight:800; font-family: 'Muli', sans-serif;">{{$invoice->billing->company_name}}</td>

                                    <td></td>

                                </tr>

                                <tr>

                                    <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{ strip_tags($invoice->billing->address_1)}}</br>

																															{{ strip_tags($invoice->billing->address_2)}},</br>

																															{{$invoice->billing->city->name}} - {{$invoice->billing->pincode}} </br>

																															{{$invoice->billing->state->name}} - {{$invoice->billing->country->name}}

																															</td>

									<td  style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->billing->pan) PAN:@endif {{$invoice->billing->pan}}</br>

																															@if($invoice->billing->email) Email:@endif {{$invoice->billing->email}}</br>

																															@if($invoice->billing->phone) Contact:@endif {{$invoice->billing->phone}}</br>

																															@if($invoice->billing->website) Website:@endif {{$invoice->billing->website}}

									</td>

                                </tr>

								

								<tr>

                    <td height="35" colspan="4" align="center" class="txt" style="border:2px solid #ddd; color:#006400; font-weight:800; font-family: 'Muli', sans-serif; background-color: #f2f2f2; -webkit-print-color-adjust: exact;">TAX INVOICE</td>

                </tr>

                                </tbody>

                        </table>

                    </td>

                    <td>&nbsp;</td>

                </tr>

                  <tr>

                    <td width="3%">&nbsp;</td>

                    <td colspan="2">

                        <table width="100%" id="customers" border="0" cellpadding="0" cellspacing="0" class="tb1">

                            <tbody>

                                <tr>

                                    <td>

                                        <table style="border:1px solid #999999;" width="100%" border="0" cellspacing="0" cellpadding="0">

                                            <tbody>

                                                <tr>

                                                    <td width="16%" height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Party Name </span></strong></td>

                                                    <td width="49%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->name}}</span></td>

                                                    <td width="15%"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Dt</span></strong></td>

                                                    <td width="20%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{ date("d-m-Y",strtotime($invoice->invoice_date))}}</span></td>

                                                </tr>

                                                <tr>

                                                    <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Address</span></strong></td>

                                                    <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{!! $invoice->party->address!!}, {!! $invoice->party->address_1!!}</span></td>

                                                    <td><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice No</span></strong></td>

                                                    <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->invoice_number}}</span></td>

                                                </tr>

                                                <tr>

                                                    <td height="25">

                                                        <strong>

                                                            <span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                                                            </span>

                                                        </strong>

                                                    </td>

                                                    <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->party_city->name}} - {{$invoice->party->pincode}}, {{$invoice->party->party_state->name}} - {{$invoice->party->party_country->name}} </span></td>

                                                    <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->client_gst_number) GSTIN @endif</span></strong></td>

                                                    <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->client_gst_number}}</span></td>

                                                </tr>

                                                <tr>

                                                    <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Contact</span></strong></td>

  @php $sep = !empty($invoice->party->email) && !empty($invoice->party->cell_phone) ? '|'  : ''; @endphp                                                       

                                                    <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->cell_phone}} {{$sep}} {{$invoice->party->email}} </span></td>

                                                    <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->pan) PAN No @endif</span></strong></td>

                                                    <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->pan}}</span></td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <table style="border:1px solid #999999;" width="100%" border="1" cellpadding="0" cellspacing="0" class="tb2">

                                            <tbody>

                                                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; background-color: #f2f2f2; -webkit-print-color-adjust: exact;">

                                                    <td width="7%" height="30" align="center"><strong>S.N</strong></td>

                                                    <td width="68%" align="center"><strong>Description </strong></td>

                                                    <td width="12%" align="center"><strong>SAC Code</strong></td>

                                                    <td width="13%" align="center"><strong>Amount</strong></td>

                                                </tr>

                                              @foreach($invoice->items as $k=>$item)

                                                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                                                    <td height="50" align="center">{{$k+1}}.</td>

                                                    <td align="center">{{$item->service->narration}}<br> @if ($item->from !='1970-01-01' || $item->to !='1970-01-01') Fees For {{date("F j, Y",strtotime($item->from)).' to '.date("F j, Y",strtotime($item->to))}} </br> @endif

                  @if($item->remarks) {{$item->remarks}} @endif </td>

                                                    <td align="center">{{$item->sac}}</td>

                                                    <td align="center">{{$item->rate}}</td>

                                                </tr>

                              @endforeach

                                                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                                                    <td height="30" align="center">&nbsp;</td>

                                                    <td align="center">&nbsp;</td>

                                                    <td align="center"><strong>Sub Total</strong></td>

                                                    <td align="center">{{$invoice->subtotal}}</td>

                                                </tr>

                                                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                                                    <td height="30" align="center">&nbsp;</td>

                                                    <td align="center">&nbsp;</td>

                                                    <td align="center"><strong>Total</strong></td>

                                                    <td align="center">{{$invoice->total}}</td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb2">

                                            <tbody>

                                                @if($invoice->remarks)<tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                                                    <td width="15%" height="50" align="left"><b>Remarks : </b> </td>

                                                    <td width="80%" align="Left">  {{$invoice->remarks}}</td>

                                                </tr>@endif

                                                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                                                    <td height="50" align="left"><b>Bank Details :</b> </td>

                                                    <td align="Left">  {!!$invoice->billing->bank_details!!}</td>

                                                </tr>

                                                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                                                    <td height="50" align="left"><b>Notes : </b></td>

                                                    <td align="Left">  {!!$invoice->billing->note!!}</td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </td>

                                </tr>

                                

                            </tbody>

                        </table>



                    </td>

                    <td width="3%">&nbsp;</td>

                </tr>

                

                <tr>

                    <td height="32">&nbsp;</td>

                    <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" height="32"><strong>&nbsp;</strong></td>

                    <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" align="right"><strong>For {{$invoice->billing->company_name}}</strong></td>

                    <td height="32">&nbsp;</td>

                </tr>

                <tr>

                    <td colspan="4">&nbsp;</td>

                </tr>

                <tr>

                    <td height="32">&nbsp;</td>

                    <td>&nbsp;</td>

                    <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" align="right" valign="bottom"><strong>Authorised Signatory</strong></td>

                    <td>&nbsp;</td>

                </tr>

                <tr>

                    <td colspan="4">&nbsp;</td>

                </tr>

            </tbody>

        </table>

@if($invoice->status==2)<span style="font-size:18px; color:#ff0000; font-weight:800; font-family: 'Muli', sans-serif;">This INVOICE is Cancelled</span>@endif



@elseif($invoice->billing->preffix=='RR')

<table style="border:1px solid #999999;" width="100%" border="0" cellpadding="0" cellspacing="0" class="tb">

  <tbody>

    <tr>

      <td height="35" colspan="4" align="center" class="txt" style="border-bottom:1px solid #ddd; color:#d04e00; font-weight:800; font-family: 'Muli', sans-serif;">TAX INVOICE</td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tbody>

          <tr>

            <td height="49" valign="bottom" style=" font-size:20px; color:#d04e00; font-weight:800; font-family: 'Muli', sans-serif;">{{$invoice->billing->company_name}}</td>

			<td rowspan="2" style="text-align: end;">@if($invoice->billing->logo)<img src="{{asset('storage/uploads/'.$invoice->billing->logo)}}" style="width:100px;margin:10px">@endif</td>

            </tr>

          <tr>

            <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" >{{ strip_tags($invoice->billing->address_1)}}</td>

            </tr>

          <tr>

            <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{ strip_tags($invoice->billing->address_2)}}</td>

			<td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->billing->gstin) GSTIN:@endif {{$invoice->billing->gstin}}</td>

            </tr>

          <tr>

            <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->billing->city->name}} - {{$invoice->billing->pincode}}</td>

			<td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->billing->pan) Pan No:@endif {{$invoice->billing->pan}}</td>

            </tr>

          <tr>

            <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->billing->state->name}} - {{$invoice->billing->country->name}}</td>

			<td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->billing->email) Email:@endif {{$invoice->billing->email}}</td>

            </tr>

			<tr>

            <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->billing->phone) Contact:@endif {{$invoice->billing->phone}}</td>

			<td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->billing->website) Website:@endif {{$invoice->billing->website}}</td>

            </tr>

        </tbody>

      </table></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td height="36" colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td width="3%">&nbsp;</td>

      <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb1">

        <tbody>

          <tr>

            <td><table style="border:1px solid #999999;" width="100%" border="0" cellspacing="0" cellpadding="0">

              <tbody>

                <tr>

                  <td width="16%" height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Party Name </span></strong></td>

                  <td width="49%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->name}}</span></td>

                  <td width="20%"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Date</span></strong></td>

                  <td width="15%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{ date("d-m-Y",strtotime($invoice->invoice_date))}}</span></td>

                </tr>

                <tr>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Address</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{!! $invoice->party->address!!}, {!! $invoice->party->address_1!!} </span></td>

                  <td><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Number</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->invoice_number}}</span></td>

                </tr>

                <tr>

				  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

				  </span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->party_city->name}} - {{$invoice->party->pincode}}, {{$invoice->party->party_state->name}} - {{$invoice->party->party_country->name}} </span></td>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->client_gst_number) GSTIN @endif</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->client_gst_number}}</span></td>

                </tr>

				<tr>

				  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Contact</span></strong></td>

@php $sep = !empty($invoice->party->email) && !empty($invoice->party->cell_phone) ? '|'  : ''; @endphp       

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->cell_phone}} {{$sep}} {{$invoice->party->email}} </span></td>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->pan) PAN No @endif</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->pan}}</span></td>

                </tr>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td height="31" style="border-top:1px solid #999999;">&nbsp;</td>

          </tr>

          <tr>

            <td>

			<table style="border:1px solid #999999;" width="100%" border="1" cellpadding="0" cellspacing="0" class="tb2">

              <tbody>

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td width="7%" height="30" align="center"><strong>S.N</strong></td>

                  <td width="68%" align="center"><strong>Description </strong></td>

                  <td width="12%" align="center"><strong>SAC Code</strong></td>

                  <td width="13%" align="center"><strong>Amount</strong></td>

                </tr>

                @foreach($invoice->items as $k=>$item)

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="50" align="center">{{$k+1}}.</td>

                  <td align="center">{{$item->service->narration}}<br> @if ($item->from !='1970-01-01' || $item->to !='1970-01-01') Fees For {{date("F j, Y",strtotime($item->from)).' to '.date("F j, Y",strtotime($item->to))}} </br>@endif

                  @if($item->remarks) {{$item->remarks}} @endif</td>

                  <td align="center">{{$item->sac}}</td>

                  <td align="center">{{$item->rate}}</td>

                </tr>

                @endforeach

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center"><strong>Sub Total</strong></td>

                  <td align="center">{{$invoice->subtotal}}</td>

                </tr>

				  <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center"><strong>Total</strong></td>

                  <td align="center">{{$invoice->total}}</td>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb2">

              <tbody>

                @if($invoice->remarks)<tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td width="17%" height="20" align="left">Remarks : </td>

                  <td width="83%" align="Left">  {{$invoice->remarks}}</td>

                </tr>@endif

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td width="17%" height="20" align="left">Bank Details : </td>

                  <td width="83%" align="Left">{!!$invoice->billing->bank_details!!}</td>

                </tr>

				<tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td width="17%" height="20" align="left">Notes : </td>

                  <td width="83%" align="Left">  {!!$invoice->billing->note!!}</td>

                </tr>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

        </tbody>

            </table>

	        </td>

      <td width="3%">&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td height="25">&nbsp;</td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" height="32"><strong>&nbsp;</strong></td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" align="right"><strong>For {{$invoice->billing->company_name}}</strong></td>

      <td height="25">&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td height="50">&nbsp;</td>

      <td>&nbsp;</td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" align="right" valign="bottom"><strong>Authorised Signatory</strong></td>

      <td>&nbsp;</td>

    </tr>

  </tbody>

</table>

@elseif($invoice->billing->preffix=='MD')

<table style="border:2px dashed #999999;" width="100%" border="0" cellpadding="0" cellspacing="0" class="tb">

  <tbody>

    <tr>

      <td height="35" colspan="4" align="center" class="txt" style="font-weight:800; font-family: 'Muli', sans-serif; color:#0000ff; background-color: #f2f2f2; -webkit-print-color-adjust: exact;">TAX INVOICE</td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tbody>

          <tr>

            <td height="49" valign="bottom" style=" font-size:24px; color:#0000ff; font-weight:800; font-family: 'Muli', sans-serif;">{{$invoice->billing->company_name}}</td>

			<td rowspan="2" style="text-align: end;">@if($invoice->billing->logo)<img src="{{asset('storage/uploads/'.$invoice->billing->logo)}}" style="width:100px;margin:10px">@endif</td>

            </tr>

          <tr>

            <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" >{{ strip_tags($invoice->billing->address_1)}}</td>

            </tr>

          <tr>

            <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{ strip_tags($invoice->billing->address_2)}}</td>

			<td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->billing->gstin) GSTIN:@endif {{$invoice->billing->gstin}}</td>

            </tr>

          <tr>

            <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->billing->city->name}} - {{$invoice->billing->pincode}}</td>

			<td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->billing->pan) Pan No:@endif {{$invoice->billing->pan}}</td>

            </tr>

          <tr>

            <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->billing->state->name}} - {{$invoice->billing->country->name}}</td>

			<td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->billing->email) Email:@endif {{$invoice->billing->email}}</td>

            </tr>

			<tr>

            <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->billing->phone) Contact:@endif {{$invoice->billing->phone}}</td>

			<td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->billing->website) Website:@endif {{$invoice->billing->website}}</td>

            </tr>

        </tbody>

      </table></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td height="36" colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td width="3%">&nbsp;</td>

      <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb1">

        <tbody>

          <tr>

            <td><table style="border:1px solid #999999;" width="100%" border="0" cellspacing="0" cellpadding="0">

              <tbody>

                <tr>

                  <td width="16%" height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Party Name </span></strong></td>

                  <td width="49%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->name}}</span></td>

                  <td width="20%"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Date</span></strong></td>

                  <td width="15%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{ date("d-m-Y",strtotime($invoice->invoice_date))}}</span></td>

                </tr>

                <tr>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Address</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{!! $invoice->party->address!!}, {!! $invoice->party->address_1!!}, </span></td>

                  <td><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Number</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->invoice_number}}</span></td>

                </tr>

                <tr>

				  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

				  </span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->party_city->name}} - {{$invoice->party->pincode}}, {{$invoice->party->party_state->name}} - {{$invoice->party->party_country->name}} </span></td>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->client_gst_number) GSTIN @endif</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->client_gst_number}}</span></td>

                </tr>

				<tr>

				  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Contact</span></strong></td>

@php $sep = !empty($invoice->party->email) && !empty($invoice->party->cell_phone) ? '|'  : ''; @endphp       

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->cell_phone}} {{$sep}} {{$invoice->party->email}} </span></td>

                  <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">@if($invoice->party->pan) PAN No @endif</span></strong></td>

                  <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">{{$invoice->party->pan}}</span></td>

                </tr>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td height="31" style="border-top:1px solid #999999;">&nbsp;</td>

          </tr>

          <tr>

            <td>

			<table style="border:1px solid #999999;" width="100%" border="1" cellpadding="0" cellspacing="0" class="tb2">

              <tbody>

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td width="7%" height="30" align="center"><strong>S.N</strong></td>

                  <td width="68%" align="center"><strong>Description </strong></td>

                  <td width="12%" align="center"><strong>SAC Code</strong></td>

                  <td width="13%" align="center"><strong>Amount</strong></td>

                </tr>

                @foreach($invoice->items as $k=>$item)

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="50" align="center">{{$k+1}}.</td>

                  <td align="center">{{$item->service->narration}}<br> @if ($item->from !='1970-01-01' || $item->to !='1970-01-01') Fees For {{date("F j, Y",strtotime($item->from)).' to '.date("F j, Y",strtotime($item->to))}} </br>@endif

                  @if($item->remarks) {{$item->remarks}} @endif</td>

                  <td align="center">{{$item->sac}}</td>

                  <td align="center">{{$item->rate}}</td>

                </tr>

                @endforeach

                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center"><strong>Sub Total</strong></td>

                  <td align="center">{{$invoice->subtotal}}</td>

                </tr>

				  <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">

                  <td height="30" align="center">&nbsp;</td>

                  <td align="center">&nbsp;</td>

                  <td align="center"><strong>Total</strong></td>

                  <td align="center">{{$invoice->total}}</td>

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb2">

              <tbody>

                @if($invoice->remarks)<tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td width="17%" height="20" align="left">Remarks : </td>

                  <td width="83%" align="Left">  {{$invoice->remarks}}</td>

                </tr>@endif

@if($invoice->billing->bank_details) <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td width="17%" height="20" align="left">Bank Details : </td>

                  <td width="83%" align="Left">{!!$invoice->billing->bank_details!!}</td>

                </tr>@endif

				@if($invoice->billing->note) <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; vertical-align:top;">

                  <td width="17%" height="20" align="left">Notes : </td>

                  <td width="83%" align="Left">  {!!$invoice->billing->note!!}</td>

                </tr>@endif

              </tbody>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

          </tr>

        </tbody>

            </table>

	        </td>

      <td width="3%">&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td height="25">&nbsp;</td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" height="32"><strong>&nbsp;</strong></td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" align="right"><strong>For {{$invoice->billing->company_name}}</strong></td>

      <td height="25">&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td height="50">&nbsp;</td>

      <td>&nbsp;</td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" align="right" valign="bottom"><strong>Authorised Signatory</strong></td>

      <td>&nbsp;</td>

    </tr>

  </tbody>

</table>
@if($invoice->status==2)<span style="font-size:18px; color:#ff0000; font-weight:800; font-family: 'Muli', sans-serif;">This INVOICE is Cancelled</span>@endif

@endif

</div>

</body>

</html>