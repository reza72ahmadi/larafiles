<?php

namespace App\Utility;
// class User
// {
//     public static function is_user_subscribed($user_id = null)
//     {
//         $user = \App\Models\User::find($user_id);
//         $user_subscrib = $user->subscribes->where('subscrib_expire_at', '<=', \Carbon\Carbon::now())->first();
//         return $user_subscrib;
//     }
// }


class User
{
    public static function is_user_subscribed($user_id = null)
    {
        $user = \App\Models\User::find($user_id);
        if (!$user) {
            return false; // or throw an exception
        }
        return $user->subscribes()->where('subscrib_expire_at', '>', \Carbon\Carbon::now())->exists();
    }
}
