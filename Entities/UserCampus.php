<?php

namespace Lumis\Organization\Entities;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserCampus
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function campus():mixed
    {
        return Campus::find($this->user->campus_id);
    }

    /**
     * @return bool
     */
    public function exists():bool
    {
        $campus = $this->campus();
        return !empty($campus);
    }

    /**
     * @return bool
     */
    public function missing():bool
    {
        return !$this->exists();
    }

    /**
     * @return mixed
     */
    public static function get($user=null):mixed
    {
        if(empty($user)){
            $user = Auth::user();
        }else{
            if(is_string($user)){
                $user = User::find($user);
            }
        }
        $object = new self($user);
        return $object->campus();
    }

    /**
     * @return static
     */
    public static function instance():static
    {
        $user = Auth::user();
        return new self($user);
    }
}
