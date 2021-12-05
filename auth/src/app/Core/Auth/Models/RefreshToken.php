<?php

namespace App\Core\Auth\Models;

use BenBodan\LaravelJwt\Contracts\JwtSubject;
use BenBodan\LaravelJwt\Contracts\RefreshKey;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Str;

use Carbon\Carbon;

class RefreshToken extends Model implements RefreshKey
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function generate(JwtSubject $user): string {

        $token = new RefreshToken();
        $key = Str::random(200);

        $token->user_id = $user->getJWTIdentifier();
        $token->refresh_token = $key;
        $token->revoked = false;
        $token->expire_at = Carbon::now()->addHours(24);
        $token->save();

        return $key;
    }

    public static function retrieveUserIdByRefreshToken(string $refresh_token){
        $token = RefreshToken::where('refresh_token', $refresh_token)
            ->where('expire_at', '>', Carbon::now())
            ->where('revoked', false)
            ->first();

        if(!$token) {
            return null;
        }

        return $token->user_id;
    }
}
