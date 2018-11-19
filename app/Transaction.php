<?php

namespace crm;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'client', 'date', 'amount', 'client_id'
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }
}
