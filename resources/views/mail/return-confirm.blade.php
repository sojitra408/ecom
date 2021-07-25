<?php
$orders = $emaildata['order'];
$products = $emaildata['products'];
$address = $emaildata['address'];

?>

<html>

<head>
    <title></title>
</head>

<body>
    <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>

            <tr style="font-size:0;line-height:0">
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="center" valign="top">
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <div style="color:inherit;font-size:inherit;line-height:inherit;margin:inherit;padding:inherit">
                    </div>
                    <table width="600" bgcolor="#70cbce">
                        <tbody>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <table border="0" cellpadding="0" cellspacing="0" width="570">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <a href="#" target="_blank"><img alt="TOT"
                                                            src="https://ecomnew.thisorthat.in/front/assets/img/emailer/ylogo.png"
                                                            style="border:0" width="200"></a>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>


                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0"
                                        style="overflow:hidden!important;border-radius:3px" width="580">
                                        <tbody>

                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <table width="85%">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center">
                                                                    <h2
                                                                        style="margin:0!important;font-family:'Helvetica', sans-serif!important;font-size:48px!important;line-height:48px!important;font-weight:bold!important;color:#72cbcf!important; text-transform:uppercase; font-style:italic">
                                                                        <img src="https://ecomnew.thisorthat.in/front/assets/img/emailer/order-confirm.png"
                                                                            width="67" valign="middle">
                                                                        Return <br>
                                                                        Confirmed!
                                                                    </h2>

                                                                    <hr
                                                                        style="height:3px; background:#c4e8e8; border:none">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center"
                                                                    style="font-family:'Helvetica', sans-serif!important;font-size:16px!important;line-height:30px!important;font-weight:400!important;color:#868485!important;">
                                                                    <br>
                                                                    <h3
                                                                        style="margin:0!important;font-family:'Helvetica', sans-serif!important;font-size:28px!important;line-height:38px!important;font-weight:300!important;color:#72cbcf!important; text-transform:normal; font-style:normal">
                                                                        Hey {{ $emaildata['name'] }},</h3><br>
                                                                    We have confirmed the return process where your order
                                                                    number is {{ $orders->order_id }}<br><br>
                                                                    Kinly ensure that the original tag of all the items 
                                                                    is maintained along with bill, and that you keep
                                                                    these handy for the postman/delivery boy.<br><br>
                                                                </td>
                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            @include('mail.includes.order-details')

                                            <tr>
                                                <td style="padding-left:10px; padding-right:10px; padding-bottom:10px;"
                                                    align="center">
                                                    <div
                                                        style=" width:90%; padding:15px; color:#737171; font-size:16px; background-color:#d5eded; margin-top:15px; text-align:left">
                                                        <h3
                                                            style="color:#72cbcf; font-family:'Helvetica', sans-serif!important; font-size:18px; margin:0">
                                                            Billing Info </h3>
                                                        <p
                                                            style="font-size:15px;font-family:'Helvetica', sans-serif!important;">
                                                            {{ $address->contact_name }} <br>
                                                            {{ $address->address }}
                                                            {{ $address->address1 }},{{ $address->City->city }}<br>
                                                            {{ $address->State->name }} - {{ $address->pincode }}
                                                        </p>
                                                        <hr style="background:#ffffff; height:3px; border:none">
                                                        <h3
                                                            style="color:#72cbcf; font-family:'Helvetica', sans-serif!important; font-size:18px; margin:0">
                                                            Shipping Info </h3>
                                                        <p
                                                            style="font-size:15px;font-family:'Helvetica', sans-serif!important;">
                                                            {{ $address->contact_name }} <br>
                                                            {{ $address->address }}
                                                            {{ $address->address1 }},{{ $address->City->city }}<br>
                                                            {{ $address->State->name }} - {{ $address->pincode }}
                                                        </p>
                                                    </div>

                                                    <div
                                                        style="color:#7b7778; font-family:'Helvetica', sans-serif!important; font-size:14px; margin:0; padding-top:10px; padding-left:10px; padding-right:10px">
                                                        If you need help or just want to chat, email us anytime
                                                        info@tot.com</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>

                            <tr>
                                <td align="center">
                                    <table border="0" cellpadding="0" cellspacing="0" width="580">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div style="width:31%;float:left;display:inline">
                                                        <table bgcolor="" border="0" cellpadding="0" cellspacing="0"
                                                            style="border-radius:3px!important" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" valign="middle">
                                                                        <a href="#"
                                                                            style="line-height:50px;display:block;text-decoration:none!important;width:100%"
                                                                            target="_blank">

                                                                            <span
                                                                                style="font-family:'Helvetica', sans-serif!important;font-size:12px!important;color:#ffffff!important;text-transform:uppercase!important;border-radius:3px!important;text-decoration:none!important;font-weight:400!important">
                                                                                SHOP </span></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div style="width:3.5%;min-height:50px;float:left;display:inline">
                                                    </div>
                                                    <div style="width:31%;float:left;display:inline">
                                                        <table bgcolor="" border="0" cellpadding="0" cellspacing="0"
                                                            style="border-radius:3px!important" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" valign="middle">
                                                                        <a href="#"
                                                                            style="line-height:50px;display:block;text-decoration:none!important;width:100%"
                                                                            target="_blank">


                                                                            <span
                                                                                style="font-family:'Helvetica', sans-serif!important;font-size:12px!important;color:#ffffff!important;text-transform:uppercase!important;border-radius:3px!important;text-decoration:none!important;font-weight:400!important">
                                                                                ABOUT US</span></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div style="width:3.5%;min-height:50px;float:left;display:inline">
                                                    </div>
                                                    <div style="width:31%;float:left;display:inline">
                                                        <table bgcolor="" border="0" cellpadding="0" cellspacing="0"
                                                            style="border-radius:3px!important" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" valign="middle">
                                                                        <a href="#"
                                                                            style="line-height:50px;display:block;text-decoration:none!important;width:100%"
                                                                            target="_blank">


                                                                            <span
                                                                                style="font-family:'Helvetica', sans-serif!important;font-size:12px!important;color:#fff!important;text-transform:uppercase!important;border-radius:3px!important;text-decoration:none!important;font-weight:400!important">
                                                                                HELP</span></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="580">
                                                        <tbody>
                                                            <tr>
                                                                <td width="50%" align="center" valign="top"
                                                                    style="font-family:'Helvetica', sans-serif!important;font-size:12px!important;line-height:15px!important;font-weight:400!important;color:#ffffff!important;    border-top: solid 1px #afdfe1;    border-right: solid 1px #afdfe1;    border-bottom: solid 1px #afdfe1; padding:15px">
                                                                    Lets Hang Out?<br> <br>
                                                                    <a href="#" target="_blank"><img alt="Facebook"
                                                                            height="20"
                                                                            src="https://ecomnew.thisorthat.in/front/assets/img/emailer/fb.png"
                                                                            style="border:0; padding-right:10px"
                                                                            width="18"></a> <a href="#"
                                                                        target="_blank"><img alt="" height="20"
                                                                            src="https://ecomnew.thisorthat.in/front/assets/img/emailer/insta.png"
                                                                            style="border:0; padding-right:10px"
                                                                            width="20"></a> <a href="#"
                                                                        target="_blank"><img alt="" height="20"
                                                                            src="https://ecomnew.thisorthat.in/front/assets/img/emailer/twt.png"
                                                                            style="border:0;padding-right:10px"
                                                                            width="24"></a> <a href="#"
                                                                        target="_blank"><img alt="" height="20"
                                                                            src="https://ecomnew.thisorthat.in/front/assets/img/emailer/yt.png"
                                                                            style="border:0" width="20"></a>
                                                                </td>
                                                                <td
                                                                    style="font-family:'Helvetica', sans-serif!important;font-size:11px!important;line-height:15px!important;font-weight:400!important;color:#ffffff!important;     border-top: solid 1px #afdfe1;    border-bottom: solid 1px #afdfe1;padding:15px; text-align:center">
                                                                    <strong>Address</strong> <br>
                                                                    Soch Retail Pvt. Ltd.<br>
                                                                    601 Link Rose, Linking Rd, Above Levi's<br>
                                                                    Store, Santacruz West, Mumbai, <br>
                                                                    Maharashtra 400054<br>
                                                                    <span style="display:none">GSTIN/UIN:
                                                                        27ADBFS0931L1Z0<br></span>Email:
                                                                    customer.care@thisorthat.in
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center"
                                                                    style="font-family:'Helvetica', sans-serif!important;font-weight:400!important;color:#7e8890!important;font-size:12px!important;text-transform:uppercase!important;letter-spacing:.045em!important"
                                                                    valign="top"> </td>
                                                            </tr>
                                                            <tr style="padding:0;margin:0;font-size:0;line-height:0">
                                                                <td>&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center"
                                                                    style="font-family:'Helvetica', sans-serif!important;font-weight:400!important;color:#ffffff!important;font-size:11px!important;letter-spacing:.05em!important"
                                                                    valign="top" colspan="2">&copy; 2021-2022 Soch
                                                                    Retail Pvt. Ltd. All rights reserved.</td>
                                                            </tr>
                                                            <tr style="padding:0;margin:0;font-size:0;line-height:0">
                                                                <td>&nbsp;</td>
                                                            </tr>

                                                            <tr style="padding:0;margin:0;font-size:0;line-height:0">
                                                                <td>&nbsp;</td>
                                                            </tr>

                                                            <tr>
                                                                <td>&nbsp;</td>
                                                            </tr>





                                                        </tbody>
                                                    </table>

                                                    <table border="0" cellpadding="0" cellspacing="0" width="600">
                                                        <tbody>
                                                            <tr>
                                                                <td
                                                                    style="padding:0;margin:0;font-size:0;line-height:0">

                                                                    <img alt="TOT"
                                                                        src="https://ecomnew.thisorthat.in/front/assets/img/emailer/orfooter.png"
                                                                        style="border:0" width="100%">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </td>
                            </tr>

                        </tbody>
                    </table>
</body>

</html>
