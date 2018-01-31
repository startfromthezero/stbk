<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use App\Models\Admin\News;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getName()
    {
        $names = array();
        $users = DB::table('users')->select('id', 'username')->get();
        foreach ($users as $user)
        {
            $names[$user->id] = $user->username;
        }

        return $names;
    }

    public function favorites(){
        return $this->belongsToMany(News::class,'favorites','user_id','new_id')->withTimeStamps();
    }
}
