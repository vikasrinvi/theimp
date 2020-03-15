<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function (Link $link) {
            $link->code = static::createUniqueCode();
        });
    }

    public function getShortenLinkAttribute(){
        return url('/'.$this->code);
    }

    protected static function createUniqueCode()
    {
        do {
            $code = static::generateCode();
        } while (Link::where('code', '=', $code)->exists());

        return $code;
    }

    protected static function generateCode(int $characters = 5)
    {
        $characters = str_repeat('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', 5);

        return substr(str_shuffle($characters), 0, 5);
    }

    protected $fillable=['url'];
}
