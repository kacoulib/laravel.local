<?php

class Post extends Eloquent {

    public function user() {
        return $this->belongsTo('User');
    }
    
    public function comments() {
        return $this->hasMany('comment');
    }

    public function category() {
        return $this->belongsTo('Category');
    }

    public function scopePublish($query) {
        return $query->where('status', '=', 'publish')
                        ->orderBy('updated_at', 'desc');
    }
    
    public function scopeNoTrash($query) {
        return $query->where('status', '!=', 'trash')
                        ->orderBy('updated_at', 'desc');
    }
    
    public function scopeTrash($query) {
        return $query->where('status', '=', 'trash')
                        ->orderBy('updated_at', 'desc');
    }

}
