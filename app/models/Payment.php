<?php

    class Payment extends Eloquent
    {
        public function customer()
        {
            return $this->belongsTo('Customer');
        }
    }

?>
