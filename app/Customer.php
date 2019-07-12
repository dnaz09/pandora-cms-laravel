<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable =
    [
        'branch_code',
        'branch',
        'title',
        'firstname',
        'lastname',
        'email',
        'mobile',
        'birthday',
        'buying_for_others',
    ];
}
