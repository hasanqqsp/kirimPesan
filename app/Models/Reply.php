<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Mews\Purifier\Casts\CleanHtmlOutput;

class Reply extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // or null
    // protected $casts = [
    //   "message" => CleanHtmlOutput::class
    // ];
    public $incrementing = false;
    
    public function message(){
		return $this->belongsTo(Message::class);
	}
	protected $guarded = [];
	protected $keyType = 'string';
}
