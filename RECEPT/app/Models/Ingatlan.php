<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingatlan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; 
	protected $fillable = [ 
    	'kateg_id', 
    	'leiras', 
        'datum', 
    	'tehermentes', 
        'ar', 
    	'kep'
	]; 
    public function kategoria() {
        return $this->belongsTo(Kategoria::class, 'kateg_id');
    }


}
