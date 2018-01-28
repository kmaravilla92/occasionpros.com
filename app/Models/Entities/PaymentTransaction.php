<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\Entities\EventPost as EventPostEntity;
use App\User as UserPostEntity;

class PaymentTransaction extends Model
{
    protected $table = 'payment_transactions';

    protected $guarded = [];

    protected $appends = [];

    public function event()
    {
        return $this->hasOne(EventPostEntity::class, 'id', 'event_id');
    }

    public function paidFor()
    {
        return $this->hasOne(UserPostEntity::class, 'id', 'paid_for');
    }

    public function paidBy()
    {
        return $this->hasOne(UserPostEntity::class, 'id', 'paid_by');
    }

    public function getAmountFloatAttribute()
    {
        return $this->attributes['amount'];
    }

    public function getFeedAmountFloatAttribute()
    {
        return $this->attributes['feed_amount'];
    }

    public function getAmountAttribute()
    {
        return number_format($this->attributes['amount'], 2, '.', ',');
    }

    public function getFeedAmountAttribute()
    {
        return number_format($this->attributes['feed_amount'], 2, '.', ',');
    }

    public function getStatusTextAttribute()
    {
        $status_labels = config('occ_pros.labels.backoffice.payment_transactions.statuses_by_index');
        return $status_labels[$this->attributes['status']];
    }

    public function getNormalizedStatusTextAttribute()
    {
        $status_labels = config('occ_pros.labels.backoffice.payment_transactions.statuses_by_index');
        return str_slug($status_labels[$this->attributes['status']]);
    }

    public function applyFee($amount = 0)
    {
        return (float)$amount * (1 - config('occ_pros.settings.payment.booking_fee'));
    }
}
