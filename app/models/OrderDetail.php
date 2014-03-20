<?php

    class OrderDetail extends Eloquent
    {
        public function order()
        {
            return $this->belongsTo('Order');
        }
        public function product()
        {
            return $this->belongsTo('Product');
        }
    }

?>
