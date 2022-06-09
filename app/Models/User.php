<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Mews\Purifier\Casts\CleanHtmlOutput;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
	protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
	protected $primaryKey = 'id'; // or null

    public $incrementing = false;
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
    // protected $casts = [
    //     "bio" => CleanHtmlOutput::class
    // ];
    public function messages(){
		return $this->hasMany(Message::class);
    }
    
    public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
             $user->messages()->delete();
        });
    }
}
