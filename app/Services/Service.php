<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\User;

abstract class Service
{
    /**
     * @var null|User|Admin
     */
    protected $user = null;

    /**
     * @param User|Admin|null $user
     * @return $this
     */
    public function withUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return User|Admin|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Create new service instance
     *
     * @return $this
     */
    public static function getInstance()
    {
        return app(static::class);
    }
}
