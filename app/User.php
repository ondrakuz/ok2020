<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Role;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nick', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function __construct(array $attributes = []) {
        $this->setTable('users');
        
        parent::__construct($attributes);
        
        self::created(function (User $user) {
            $user->assignRole(['registered']);
        });
    }
    
    /**
     * Get the role of user.
     *
     * @return Role
     */
    public function role()
    {
        //return $this->belongsTo('App\Role', 'role_id', 'id')[0];
        $role = new Role();
        return $role->getById($this->role_id);
    }

    /**
     * Assign role to user.
     *
     * @param  array $slug
     */
    public function assignRole($slug)
    {
        $newRole = Role::whereIn('slug', $slug)->id;
        $this->role_id = $newRole;
    }

    /**
     * Send notification to verify email address.
     */
    public function sendEmailVerificationNotification()
    {
        VerifyEmail::toMailUsing(static function ($notifiable, $verificationUrl) {
            return (new MailMessage)
                ->subject('Verify email address')
                ->line('To verify your email address press button.')
                ->action('Verify email address', $verificationUrl)
                ->line('if you did not register, there is not necessary any action.');
        });
            
            parent::sendEmailVerificationNotification();
    }
    
    /**
     * Return user record by ID
     *
     * @param  integer  $id
     * @param  array  $columns
     * @return [object]
     */
    public function getById(int $id, $columns = ['*']) {
        $dataObject =  static::query()->get(
            is_array($columns) ? $columns : func_get_args()
            )->where('id', '=', $id);
            
        for ($i = 0; $i < 250; $i++) {
            if (!empty($dataObject[$i])) {
                return $dataObject[$i];
            }
        }
    }
    
    /**
     * Return user record by Nick
     *
     * @param  string  $nick
     * @param  array  $columns
     * @return [object]
     */
    public function getByNick(string $nick, $columns = ['*']) {
        $dataObject =  static::query()->get(
            is_array($columns) ? $columns : func_get_args()
            )->where('nick', '=', $nick);
            
        for ($i = 0; $i < 250; $i++) {
            if (!empty($dataObject[$i])) {
                return $dataObject[$i];
            }
        }
    }
    
    /**
     * Return all user records
     *
     * @param  array  $columns
     * @return [object]
     */
    public function getAll($columns = ['*']) {
        $dataObject =  static::query()->get(
            is_array($columns) ? $columns : func_get_args()
            );
    }
}
