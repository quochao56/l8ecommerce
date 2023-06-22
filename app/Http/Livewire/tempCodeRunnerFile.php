<?php
$coupon = Coupon::where('code',$this->couponCode)
                        ->where('cart_value',"<=",Cart::instance('cart')->subtotal())
                        ->first();