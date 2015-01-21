<?php

class Post extends Eloquent {

    public function user() {
        return $this->belongsTo('User');
    }
    
    public function comment() {
        return $this->hasMany('comment');
    }

    public function category() {
        return $this->belongsTo('Category');
    }

    public function scopePublish($query) {
        return $query->where('status', '=', 'publish')
                        ->orderBy('updated_at', 'desc');
    }

}
