<?php

namespace tests\unit\models;

use app\models\UserOld;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        expect_that($user = UserOld::findIdentity(100));
        expect($user->username)->equals('admin');

        expect_not(UserOld::findIdentity(999));
    }

    public function testFindUserByAccessToken()
    {
        expect_that($user = UserOld::findIdentityByAccessToken('100-token'));
        expect($user->username)->equals('admin');

        expect_not(UserOld::findIdentityByAccessToken('non-existing'));
    }

    public function testFindUserByUsername()
    {
        expect_that($user = UserOld::findByUsername('admin'));
        expect_not(UserOld::findByUsername('not-admin'));
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $user = UserOld::findByUsername('admin');
        expect_that($user->validateAuthKey('test100key'));
        expect_not($user->validateAuthKey('test102key'));

        expect_that($user->validatePassword('admin'));
        expect_not($user->validatePassword('123456'));        
    }

}
