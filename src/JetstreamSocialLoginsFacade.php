<?php

namespace Ckissi\JetstreamSocialLogins;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ckissi\JetstreamSocialLogins\Skeleton\SkeletonClass
 */
class JetstreamSocialLoginsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'social-logins';
    }
}
