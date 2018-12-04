<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
        // Table Name
        protected $table = 'workouts';
            // Primary Key
    public $primaryKey = 'id';
        // Timestamps
        public $timestamps = false;
}
