<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Mews\Purifier\Casts\CleanHtmlOutput;

class Message extends Model
{
    use HasFactory;
    protected $guarded =[];
	protected $keyType = 'string';   
    public $incrementing = false;
    protected $primaryKey = 'id';

    // protected $casts = [
    //     "message" => CleanHtmlOutput::class
    // ];

    public function user(){
		return $this->belongsTo(User::class);
}
	public function replies(){
		return $this->hasMany(Reply::class);
        }
        
    public static function boot() {
        parent::boot();
    
        static::deleting(function($user) { // before delete() method call this
            $user->replies()->delete();
        });
    }
}
