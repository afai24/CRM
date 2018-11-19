<?php

namespace crm;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable =['name', 'surname', 'avatar', 'email']; //we specify which attributes can be updated

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
