@extends('emails.frontsite.master')
@section('top_content')
<tr>
   <td>
     <table width="100%" cellspacing="0" cellpadding="0" border="0" align="left" style="mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;" class="mtitle">
       <tbody>

         <tr>
           <td style="letter-spacing: 3px; line-height: 31px; text-align: center; font-size:18px;  font-family: questrial , 'tahoma'; font-weight:400 ; color: #000000;">
           TOP PROFESSIONALS
           </td>
         </tr>

         <tr>
           <td height="20"></td>
         </tr>

         <tr>
           <td>
             <table width="22" cellspacing="0" cellpadding="0" border="0" bgcolor="000000" align="center" style="mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;">
               <tbody>
                 <tr>
                   <td height="1"></td>
                 </tr>
               </tbody>
             </table>
           </td>
         </tr>
         <tr>
           <td height="20"></td>
         </tr>
         <tr>
           <td style="line-height: 20px; text-align: center;  font-size:14px;  font-family: questrial , 'tahoma'; font-weight:400 ; color: #000000;">
             Hi {{ $data['client_name'] }}, Occasions Pro's connects you with the best professionals worth hiring for. Occasion Pros is your one-stop site for connecting clients with the
             best and talented event professionals in the US. Here's a list of professional that you can connect with. View their profile now!
           </td>
         </tr>
         <tr>
           <td height="20"></td>
         </tr>

       </tbody>
     </table>
   </td>
 </tr>
@endsection
@section('mid_content')
<table border="0" cellpadding="0" cellspacing="0" class="full-no" style="margin: 0 auto; border-collaps:collaps; mso-table-lspace:0pt; mso-table-rspace:0pt;" width="600" align="center">
   <tbody>



     <tr>
       <td>

        @forelse($data['pros'] as $pro)
        <!-- Start Event -->
         <table class="arrival" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;" width="183" align="left">
           <tbody>
             <tr>
               <td>
                 <a href="#" style="display : block; height:245px; width:183px; overflow:hidden;">
                   <img width="183" class="img" src="{{url('')}}/frontsite/images/email_templates/new1.jpg" style="display : block; margin: 0 auto;" alt="img" />
                 </a>
               </td>
             </tr>
             <tr>
               <td height="12"></td>
             </tr>
             <tr>
               <td height="21" style="letter-spacing: 1px;text-align:center; font-size:12px; font-family:'questrial' , tahoma; font-weight:400 ; color: #8f8f8f; ">
                    {{
                        collect($pro['profile_information']['selected_categories'])->map(function($c){
                            return $c['professional_category'][0]['title'];
                        })->implode('/')
                    }}
               </td>
             </tr>
             <tr>
               <td height="21" style="letter-spacing: 1px;text-align:center; font-size:14px; font-family:'questrial' , tahoma; font-weight:400 ; color: #000000; ">
                 <a href="#" style="letter-spacing: 1px;display: block; text-align:center; font-size:14px; font-family:'questrial' , tahoma; font-weight:400 ; color: #000000;  ">{{ $pro['full_name'] }}</a>
               </td>
             </tr>
             <tr>
               <td height="21" style="letter-spacing: 1px;text-align:center; font-size:14px; font-family:'questrial' , tahoma; font-weight:400 ; color: #000000; ">
                {{ $pro['profile_information']['location'] }}
               </td>
             </tr>
           </tbody>
         </table>
         <!-- End Event -->

         <!-- Start Event Space -->
         <table class="arrival-sp" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;" width="15" align="left">
           <tbody>
             <tr>
               <td height="10">
                 <p style="padding-left: 25px; margin:0;"></p>
               </td>
             </tr>
           </tbody>
         </table>
         <!-- End Event Space -->
        @empty

        @endforelse

       </td>
     </tr>

     <tr>
       <td height="39"></td>
     </tr>

   </tbody>
 </table>
@endsection