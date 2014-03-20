<?php

    class Customer extends Eloquent
    {
        public function employee()
        {
            return $this->belongsTo('Employee');
        }
        public function orders()
        {
            return $this->hasMany('Order');
        }
        public function payments()
        {
            return $this->hasMany('Payment');
        }
    }

?>
