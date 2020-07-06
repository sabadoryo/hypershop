<?php

namespace App;

/***
 * Class UserRole
 * @package App\Role
 */
class UserRole {

    const ROLE_ADMIN = 'ROLE_ADMIN';

    /**
     * @var array
     */
    protected static $roleHierarchy = [
        self::ROLE_ADMIN => ['*'],

    ];

    /**
     * @param string $role
     * @return array
     */
    public static function getAllowedRoles(string $role)
    {
        if (isset(self::$roleHierarchy[$role])) {
            return self::$roleHierarchy[$role];
        }

        return [];
    }

    /***
     * @return array
     */
    public static function getRoleList()
    {
        return [
            static::ROLE_ADMIN =>'Admin',
        ];
    }

}
