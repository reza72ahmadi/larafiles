<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use function PHPUnit\Framework\returnSelf;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['payment_id'];
    const CREATED_AT = 'payment_created_at';
    const UPDATED_AT = 'payment_updated_at';

    const ONLINE = 1;
    const WALLET = 2;

    const COMPLETE = 1;
    const INCOMPLETE = 2;



    public function user()
    {
        return $this->belongsTo(User::class, 'payment_user_id');
    }

    public function payment_method_format()
    {
        switch ($this->attributes['payment_method']) {
            case self::ONLINE:
                return 'آنلان';
                break;

            case self::WALLET:
                return 'کیف پول';
                break;
        }
    }
    public function payment_status()
    {
        switch ($this->attributes['payment_status']) {
            case self::COMPLETE:
                return 'تکمیل شده';
                break;

            case self::INCOMPLETE:
                return 'تکمیل ناشده';
                break;
        }
    }
};
