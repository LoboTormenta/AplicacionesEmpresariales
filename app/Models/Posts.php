<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
 
protected $table ='empleados';


//relación de uno a muchos inversa (muchos a uno)
        public function user(){
            return $this->belongsTo('App\Model\Empleado', 'id');
        }


}
