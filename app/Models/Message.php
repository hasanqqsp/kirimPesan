<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $guarded =[];
	protected $keyType = 'string';   
    public $incrementing = false;
    protected $primaryKey = 'id';
    public function user(){
		return $this->belongsTo(User::class);
}
	public function replies(){
		return $this->hasMany(Reply::class);
		}
}
