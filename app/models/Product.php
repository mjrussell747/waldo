<?php

    class Product extends Eloquent
    {
        public function category()
        {
            return $this->belongsTo('Category');
        }
        public function order_details()
        {
            return $this->hasMany('OrderDetail');
        }
    }

?>
