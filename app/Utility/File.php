<?php

namespace App\Utility;

use App\Models\User;
use App\Utility\User as UtilityUser;

class File
{
    public static function user_can_download($user_id)
    {

        if (!UtilityUser::is_user_subscribed($user_id)) {
            return false;
        }
        $user_item = User::find($user_id);
        $user_subscrib = $user_item->currentSubscribe()->first();

        if (!$user_subscrib) {
            return false;
        }
        if ($user_subscrib->subscrib_download_count == $user_subscrib->subscrib_id_payment_amount) {
            return false;
        }
        return true;
    }
}
