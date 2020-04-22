<?php


namespace App\Adaptors;

use App\User;
use Illuminate\Support\Facades\Hash;
use SocialiteProviders\Manager\OAuth2\User as UserOAuth;

class Adaptor
{
    public function getUserBySocId(UserOAuth $user, string $socName) {

        $userInSystem = User::query()
            ->where('id_in_soc', $user->id)
            ->where('type_auth', $socName)
            ->first();
        $sameEmail = User::query()
            ->where('email', $user->accessTokenResponseBody['email'])
            ->first();
//        dd($sameEmail);

        if (is_null($userInSystem) && is_null($sameEmail)) {
            $userInSystem = new User();
            $userInSystem->fill([
                'name' => !empty($user->getName())? $user->getName(): '',
                'email' => $user->accessTokenResponseBody['email'],
                'password' => Hash::make('123'),
                'id_in_soc' => !empty($user->getId())? $user->getId(): '',
                'type_auth' => $socName,
                'avatar' => !empty($user->getAvatar())? $user->getAvatar(): ''
            ]);
            $userInSystem->save();
            $userInSystem->isNew = true;
            return $userInSystem;
        } else if (is_null($userInSystem)){
            return null;
        } else if ($userInSystem->id_in_soc === $sameEmail->id_in_soc){
            return $userInSystem;
        } else {
            return null;
        }
    }
}
