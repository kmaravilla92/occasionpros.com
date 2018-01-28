<?php

namespace App;

use App\Models\Entities\Traits\ModelTraits;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Naabster\EloquentHashids\EloquentHashids;
use Sentinel;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable,ModelTraits,EloquentHashids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'name', 'permissions', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['role', 'status', 'membership_title', 'full_name','hired_pros'];

    public function events()
    {
        return $this->hasMany(Models\Entities\EventPost::class,'created_by');
    }

    public function profileInformation()
    {
        return $this->hasOne(Models\Entities\ProfessionalInformation::class, 'user_id', 'id');
    }

    public function testimonials()
    {
        return $this->hasMany(Models\Entities\Testimonial::class, 'created_for', 'id');
    }

    public function paymentTransactions()
    {
        return $this->hasMany(Models\Entities\PaymentTransaction::class, 'paid_for', 'id');
    }

    public function userSettings()
    {
        return $this->hasMany(Models\Entities\UserSetting::class);
    }

    public function userMembership()
    {
        return $this->hasOne(Models\Entities\UserMembership::class, 'user_id', 'id');
    }

    public function userNotifications()
    {
        return $this->hasMany(Models\Entities\UserNotification::class, 'to_user_id', 'id');
    }

    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function getRoleAttribute()
    {
        $sentinelUser = Sentinel::findUserById($this->id);
        if(isset($sentinelUser)){
            return $sentinelUser->roles()->get()->map(function($role)
            {
                return $role->name;
            })->implode(",");
        }
        return '';
    }

    public function getStatusAttribute()
    {
        return 'Active';
    }

    public function getTotalEarningsAttribute()
    {
        $paymentTransactions = $this->paymentTransactions()->whereIn('status', ['0','1'])->get();

        if(0 === $paymentTransactions->count()){
            return 0;
        }

        $totalEarnings =  $paymentTransactions->reduce(function($carry, $item)
        {
            return ['amount' => $carry['amount'] + (float)$item['feed_amount_float']];
        }, ['amount' => 0]);

        $totalAmount = $totalEarnings['amount'];

        return number_format($totalAmount, 2, '.', ',');
    }

    public function getMembershipTitleAttribute()
    {
        return $this->userMembership ? $this->userMembership->title : 'FREE';
    }

    public function getHiredProsAttribute()
    {
        return $this->events->filter(function($event)
            {
                $selected_pro = $event->selectedPro;
                return !is_null($selected_pro);
            });
    }

    public function scopeOfStatus($query, $status = '1')
    {
        return $query->where('status', $status);
    }
}
