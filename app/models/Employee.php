<?php

    class Employee extends Eloquent
    {
        public function customers()
        {
            return $this->hasMany('Customer');
        }
        public function office()
        {
            return $this->belongsTo('Office');
        }
    }

?>
