<?php

class Comment extends Eloquent{
     public function posts(){
            return $this->belongTo('Post');
        }
}
