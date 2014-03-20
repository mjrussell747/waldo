<?php

    class Office extends Eloquent
    {
        public function employees()
        {
            return $this->hasMany('Employee');
        }
    }

?>
