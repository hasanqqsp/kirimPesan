<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // or null

    public $incrementing = false;
    
    public function message(){
		return $this->belongsTo(Message::class);
	}
	protected $guarded = [];
	protected $keyType = 'string';
}
