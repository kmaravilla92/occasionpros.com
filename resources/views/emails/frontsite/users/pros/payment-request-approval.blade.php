@extends('emails.frontsite.master')
@section('top_content')
<tr>
    <td>
     <table width="100%" cellspacing="0" cellpadding="0" border="0" align="left" style="mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;" class="mtitle">
       <tbody>

         <tr>
           <td style="letter-spacing: 3px; line-height: 31px; text-align: center; font-size:18px;  font-family: questrial , 'tahoma'; font-weight:400 ; color: #000000;">
           PAYMENT REQUEST HAS BEEN APPROVED!
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


       </tbody>
     </table>
    </td>
</tr>
@endsection
@section('mid_content')
<table border="0" cellpadding="0" cellspacing="0" class="full" style=" margin: 0 auto; border-collaps:collaps; mso-table-lspace:0pt; mso-table-rspace:0pt;" width="600" align="center">
   <tbody>
     <tr>
       <td bgcolor="3592f1">

         <table border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;" width="100%" align="center">
           <tbody>
             <tr>
               <td width="50"></td>

               <td>
                 <table class="" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;" width="100%" align="center">
                   <tbody>
                     <tr>
                       <td height="31">

                       </td>
                     </tr>
                     <tr>
                       <td height="34" style="line-height: 34px;text-align:left; font-size:27px; font-family:'Playfair Display' , 'times new roman'; font-weight:700 ;  color: #ffffff ">
                         Requested Amount: [Amount]
                       </td>
                     </tr>
                     <tr>
                       <td height="8">

                       </td>
                     </tr>
                     <tr>
                       <td height="34" style="line-height: 24px;text-align:left; font-size:14px; font-family: questrial , 'tahoma'; font-weight:300 ; color: #ffffff">
                          Great news! Your payment request has been approved! It will now be transferred to your account!
                         If you need any help, feel free to <a href="#" style="color:#ffa928; font-weight:600;">contact us</a> or visit our <a href="#" style="color:#ffa928; font-weight:600;">FAQ page</a>.
                       </td>

                     </tr>
                     <tr>
                       <td height="22">

                       </td>
                     </tr>
                     <tr>
                       <td>
                         <table class="" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;" width="auto" align="left">
                           <tbody>
                             <tr>
                               <td height="34" width="200" style="background: #ffffff;text-align:center; font-size:15px; font-family:'questrial' , tahoma; font-weight:400 ; color: #ac5474; ">
                                 <a href="#" style="display: block; text-align:center; font-size:15px; font-family:'questrial' , tahoma; font-weight:400 ; color: #3592f1;  ">VIEW FUND HISTORY</a>

                               </td>
                             </tr>
                           </tbody>
                         </table>
                       </td>

                     </tr>

                     <tr>
                       <td height="37">

                       </td>
                     </tr>
                   </tbody>
                 </table>
               </td>

               <td width="50"></td>
             </tr>
           </tbody>
         </table>

       </td>
     </tr>
     <tr>
       <td height="35"></td>
     </tr>
   </tbody>
</table>
@endsection