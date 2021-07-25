@php
$backgroundColor = $backgroundColor ?? '#d5eded';
$color = $color ?? '#70cbcc';
@endphp

<tr>
    <td align="center">
        <table width="90%" border-collapse="collapse" style="background: {{ $backgroundColor }}">
            <tbody>

                <tr>
                    <td colspan="4">
                        <p
                            style="font-family:'Helvetica', sans-serif!important;font-size:16px!important;line-height:30px!important;font-weight:bold!important;color:{{ $color }} !important; text-align:center">
                            HERE’S WHAT YOU ORDERED</p>
                    </td>
                </tr>
                <?php
        
        if(count($products)>0){
                $i=1;$price=0;$gst=0;
                foreach($products as $ord){?>
                <?php $variant = getVariantById($ord->product_id); ?>
                <tr>
                    <td align="center" width="22%" style="border-top:solid 1px #b8c6c6; padding-top:10px">
                        <img src="{{ $variant->img }}" width="100" valign="top">
                    </td>
                    <td align="center" width="25%" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        {{ $ord->product_name }}
                        @isset($variant->variant_val)
                            ({{ $variant->variant_val }})
                        @endisset
                    </td>
                    <td align="center" width="20%" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        Rs. {{ $ord->price }} X {{ $ord->qty }} </td>
                    <td align="center" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        Rs. {{ $ord->price * $ord->qty }}</td>
                </tr>

                <?php
                $price = $price + $ord->price * $ord->qty;
                $gst = $gst + $ord->igst;
                ?>
                <?php } } ?>

                <!--<tr><td align="center" width="22%" style="border-top:solid 1px #b8c6c6; padding-top:10px"><img src="https://demo.munchilicious.com/public//images/dried-fruits_4.png" width="100" valign="top"></td> <td align="center" width="25%" valign="top" style=
                    "font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">Munchilicious
Dried Fruits
(500 g) </td> <td align="center" width="20%" valign="top" style=
                    "font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">X 1 </td> <td align="center" valign="top" style=
                    "font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">Rs.500 </td></tr> <tr><td align="center" width="22%" style="border-top:solid 1px #b8c6c6; padding-top:10px"><img src="https://demo.munchilicious.com/public//images/dried-fruits_4.png" width="100" valign="top"></td> <td align="center" width="25%" valign="top" style=
                    "font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">Munchilicious
Dried Fruits
(500 g)<br>Brand Name </td> <td align="center" width="20%" valign="top" style=
                    "font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">X 1 </td> <td align="center" valign="top" style=
                    "font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">Rs.500 </td></tr> 
-->


                <tr>
                    <td align="center" width="22%"
                        style="border-top:solid 1px #b8c6c6; padding-top:10px; font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important;">
                        Sub total:</td>
                    <td align="center" width="25%" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        &nbsp;</td>
                    <td align="center" width="20%" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        &nbsp;</td>
                    <td align="center" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        Rs.{{ $price }}</td>
                </tr>


                <tr>
                    <td align="center" width="22%"
                        style="border-top:solid 1px #b8c6c6; padding-top:10px; font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important;">

                        Discount

                    </td>
                    <td align="center" width="25%" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        &nbsp;</td>
                    <td align="center" width="20%" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        &nbsp;</td>
                    <td align="center" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        -Rs.{{ $orders->discount + $orders->coupon_discount }}
                    </td>
                </tr>

                <tr>
                    <td align="center" width="22%"
                        style="border-top:solid 1px #b8c6c6; padding-top:10px; font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important;">

                        Rewards:</td>
                    <td align="center" width="25%" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        &nbsp;</td>
                    <td align="center" width="20%" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        &nbsp;</td>
                    <td align="center" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        -</td>
                </tr>


                <tr>
                    <td align="center" width="22%"
                        style="border-top:solid 1px #b8c6c6; padding-top:10px; font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important;">

                        Shipping:</td>
                    <td align="center" width="25%" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        &nbsp;</td>
                    <td align="center" width="20%" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        &nbsp;</td>
                    <td align="center" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        @if ($orders->shipping_charge == 0) FREE
                        @else Rs.{{ $orders->shipping_charge }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <td align="center" width="22%"
                        style="border-top:solid 1px #b8c6c6; padding-top:10px; font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important;">

                        Tax(included in total):</td>
                    <td align="center" width="25%" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        &nbsp;</td>
                    <td align="center" width="20%" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        &nbsp;</td>
                    <td align="center" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        Rs.{{ $gst }} </td>
                </tr>
                <tr>
                    <td align="center" width="22%"
                        style="border-top:solid 1px #b8c6c6; padding-top:10px; font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:bold!important;color:#737171!important;">

                        Total:</td>
                    <td align="center" width="25%" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        &nbsp;</td>
                    <td align="center" width="20%" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        &nbsp;</td>
                    <td align="center" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:bold!important;color:#737171!important; border-top:solid 1px #b8c6c6; padding-top:10px">
                        Rs.{{ $orders->grand_total }} </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>

<tr>
    <td valign="top" align="center">
        <table width="80%">
            <tbody>
                <tr>
                    <td
                        style="font-family:'Helvetica', sans-serif!important;font-size:16px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; text-transform:uppercase; padding-top:10px;">
                        Payment Info</td>
                </tr>
                <tr>
                    <td width="60%" valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; text-transform:normal; padding-top:10px;">
                        Payment Type:<br>
                        {{ $orders->transaction_id ? 'Online' : 'COD' }}
                    </td>
                    <td valign="top"
                        style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:400!important;color:#737171!important; text-transform:normal; padding-top:10px; text-align:right">
                        Rs.{{ $orders->grand_total }}</td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>


@isset($supportInfo)
    @if ($supportInfo)
        <tr>
            <td align="center"
                style="font-family:'Helvetica', sans-serif!important;font-size:14px!important;line-height:20px!important;font-weight:bold!important;color:#737171!important; padding-top:10px; padding-bottom:10px">
                <p>For Support, email us at customer.care@thisorthat.in<br> or visit
                    www.thisorthat.in</p>
            </td>
        </tr>
    @endif
@endisset
