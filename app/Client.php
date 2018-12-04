<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
        // Table Name
        protected $table = 'users';

        public function user()
        {
                return $this->belongsTo('App\Client', 'email');
        }
}
