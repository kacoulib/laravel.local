<?php

class Comment extends Eloquent {

    protected $guarded = ['id'];

    public function posts() {
        return $this->belongTo('Post');
    }

    public function scopePublish($query) {
        return $query->where('status', '=', 'publish')
                        ->orderBy('updated_at', 'desc');
    }

    public static $rules = [
        'email' => 'required|email',
        'username' => 'required'
    ];

}
