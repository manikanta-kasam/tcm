<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestCase extends Model
{
      /**
     * The table associated with the model.
     */
    protected $table = 'public.test_cases';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','description','module_id','created_at','updated_at'
    ];
}
