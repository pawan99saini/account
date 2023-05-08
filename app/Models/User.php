<?php



namespace App\Models;



use App\Core\Traits\SpatieLogsActivity;

use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\SoftDeletes;





class User extends Authenticatable implements MustVerifyEmail

{

    use HasFactory, Notifiable;

    use SpatieLogsActivity;

    use HasRoles;

    use SoftDeletes;





    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [

        'first_name',
        'last_name',
        'email',
        'api_token',
        'password',
        'phone', 
        'status',
        'token'
    ];



    /**

     * The attributes that should be hidden for arrays.

     *

     * @var array

     */

    protected $hidden = [

        'password',

        'remember_token',

    ];



    /**

     * The attributes that should be cast to native types.

     *

     * @var array

     */

    protected $casts = [

        'email_verified_at' => 'datetime',

    ];

    

    

}

