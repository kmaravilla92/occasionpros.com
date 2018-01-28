@extends('emails.frontsite.master')
@section('top_content')
<tr>
   <td>

     <table class="mid-baner-text" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;" width="auto" align="center">
       <tbody>
         <tr>
           <td height="25" style="line-height: 20px;text-align:center; font-size:16px; font-family:'Playfair Display' , 'times new roman'; font-weight:400 ;  color: #000000 ">
             Hello Admin, you received a message/question. Please see details below
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
<table bgcolor="3a94d8" border="0" cellpadding="0" cellspacing="0" style="border-collaps:collaps; mso-table-lspace:0pt; mso-table-rspace:0pt;"  width="100%" align="center">
    <tbody>

      <!-- Start-->
      <tr>
          <td valign="top">
            <table border="0" cellpadding="0" cellspacing="0" class="full" style="margin: 0 auto; border-collaps:collaps; mso-table-lspace:0pt; mso-table-rspace:0pt;" width="600" align="center">
              <tbody>

                <tr>
                  <td height="61"></td>
                </tr>

                <tr>
                  <td>

                    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="left" style="mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;" class="mtitle">
                      <tbody>

                        <tr>
                          <td style="letter-spacing: 3px; line-height: 31px; text-align: center; font-size:18px;  font-family: questrial , 'tahoma'; font-weight:400 ; color: #ffffff;">
                            CLIENT INQUIRY
                          </td>
                        </tr>

                        <tr>
                          <td height="20"></td>
                        </tr>

                        <tr>
                          <td>
                            <table width="50" cellspacing="0" cellpadding="0" border="0" bgcolor="ffa928" align="center" style="mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;">
                              <tbody>
                                <tr>
                                  <td height="3"></td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>

                      </tbody>
                    </table>

                  </td>
                </tr>

                <tr>
                  <td height="47"></td>
                </tr>

                <!-- Start First Name & Last Name -->
                <tr>
                  <td style="font-size:18px; line-height: 23px;  font-family: 'Playfair Display' , 'times new roman'; font-weight:400 ; color: #ffffff;">
                    Name:
                  </td>

                </tr>
                <tr>
                  <td style="font-size:14px; line-height: 23px;  font-family: questrial , 'tahoma'; font-weight:400 ; color: #ffffff;">
                    {{$data['first_name']}} {{$data['last_name']}}
                  </td>

                </tr>
                <!-- End Name -->

                <tr>
                  <td height="20"></td>
                </tr>

                <!-- Start Phone Number -->
                <tr>
                  <td style="font-size:18px; line-height: 23px;  font-family: 'Playfair Display' , 'times new roman'; font-weight:400 ; color: #ffffff;">
                    Phone Number:
                  </td>

                </tr>
                <tr>
                  <td style="font-size:14px; line-height: 23px;  font-family: questrial , 'tahoma'; font-weight:400 ; color: #ffffff;">
                    {{$data['phone_number']}}
                  </td>

                </tr>
                <!-- End Phone Number -->

                <tr>
                  <td height="20"></td>
                </tr>

                <!-- Start First Email Address -->
                <tr>
                  <td style="font-size:18px; line-height: 23px;  font-family: 'Playfair Display' , 'times new roman'; font-weight:400 ; color: #ffffff;">
                    Email Address:
                  </td>

                </tr>
                <tr>
                  <td style="font-size:14px; line-height: 23px;  font-family: questrial , 'tahoma'; font-weight:400 ; color: #ffffff;">
                    {{$data['email']}}
                  </td>

                </tr>
                <!-- End Name -->

                <tr>
                  <td height="20"></td>
                </tr>

                <!-- Start First Name & Last Name -->
                <tr>
                  <td style="font-size:18px; line-height: 23px;  font-family: 'Playfair Display' , 'times new roman'; font-weight:400 ; color: #ffffff;">
                    Message/Question:
                  </td>

                </tr>
                <tr>
                  <td style="font-size:14px; line-height: 23px;  font-family: questrial , 'tahoma'; font-weight:400 ; color: #ffffff;">
                    {{$data['message']}}
                  </td>

                </tr>
                <!-- End Name -->

                <tr>
                  <td height="20"></td>
                </tr>


                <tr>
                  <td height="62"></td>
                </tr>

              </tbody>
            </table>
          </td>
      </tr>
      <!--End-->

    </tbody>
</table>
@endsection