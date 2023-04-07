<?php

namespace Lumis\Organization\Concerns;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Lumis\Organization\Entities\Campus;
use Lumis\Organization\Entities\UserCampus;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

trait CampusPicker
{


    /**
     * Get Selected or Assigned Campus for Authenticated User
     *
     * @return mixed
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function getUserCampus(): mixed
    {
        $userCampus = UserCampus::instance();
        if (session()->exists('user_campus')) {
            $campus = session()->get('user_campus');
            return Campus::find($campus);
        }
        elseif ($userCampus->exists()) {
            return $userCampus->campus();
        }else{
            return null;
        }
    }

    /**
     * @return bool
     */
    public static function hasUserCampus():bool
    {
        $userCampus = UserCampus::instance();
        return $userCampus->exists();
    }

    /**
     * Get Campus List for Authenticated User
     *
     * @return Collection
     */
    public static function getCampusList(): Collection
    {
        return Campus::all();
    }


}
