<?php

    class Order extends Eloquent
    {
        public function customer()
        {
            return $this->belongsTo('Customer');
        }
        public function order_details()
        {
            return $this->hasMany('OrderDetails');
        }
    }

?>
