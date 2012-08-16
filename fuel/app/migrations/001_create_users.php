<?php

namespace Fuel\Migrations;

class Create_Users {

	function up()
	{
        // From: http://docs.fuelphp.com/packages/auth/simpleauth/intro.html
        // CREATE TABLE `users` (
        //     `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        //     `username` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
        //     `password` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
        //     `group` INT NOT NULL DEFAULT 1 ,
        //     `email` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
        //     `last_login` VARCHAR( 25 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
        //     `login_hash` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
        //     `profile_fields` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
        //     `created_at` INT( 11 ) UNSIGNED NOT NULL ,
        //     UNIQUE (
        //         `username` ,
        //         `email`
        //     )
        // )

        // I added the following added :
        // fullname - Full name of client
        // enabled (0/1) - to disable an account
        // verified (0/1) - for email verification
        // deleted (0/1) - to mark accounts as deleted

		\DBUtil::create_table(
            'users',
            array(
                'id'         => array('constraint' => 11,  'type' => 'int',     'unsigned' => true, 'auto_increment' => true),
                'username'   => array('constraint' => 50,  'type' => 'varchar', 'unique'   => true, 'null' => false),
                'password'   => array('constraint' => 255, 'type' => 'varchar', 'null'     => false),
                'fullname'   => array('constraint' => 255, 'type' => 'varchar', 'null'     => false),
                'email'      => array('constraint' => 255, 'type' => 'varchar', 'unique'   => true, 'null' => false),
                'group'      => array('constraint' => 11,  'type' => 'int',     'unsigned' => true, 'default' => 1,'null' => false),
                'last_login' => array('constraint' => 25,  'type' => 'int',     'unsigned' => true, 'null' => true),
                'login_hash' => array('constraint' => 255, 'type' => 'varchar', 'null'     => true),
                'created_at' => array('type' => 'timestamp', 'default' => \DB::expr('CURRENT_TIMESTAMP')),
                'enabled'    => array('constraint' => 1,   'type' => 'tinyint', 'default'  => 1, 'null' => false, ),
                'verified'   => array('constraint' => 1,   'type' => 'tinyint', 'default'  => 0, 'null' => false, ),
                'deleted'    => array('constraint' => 1,   'type' => 'tinyint', 'default'  => 0, 'null' => false, ),
                'profile_fields' => array('type' => 'text', 'null' => true)
            ),
            array('id'),
            false,
            'InnoDB',
            'utf8_unicode_ci',
            array(),
            null
        );

        $admin_pass_hash= \Auth::instance()->hash_password('admin');

        $users = \Model_User::forge(array(
            'username' => 'admin',
            'password' => $admin_pass_hash,
            'fullname' => 'Administrator',
            'email' => 'no_email',
            'group' => '100',
            'last_login' => '',
            'login_hash' => '',
            'enabled' => 1,
            'verified' => 1,
            'deleted' => 0,
            'profile_fields' => ''
        ));

        if ($users and $users->save()) {
            \Cli::write("added admin account");
        } else {
            \Cli::write("failed to add admin account");
        }
	}

	function down()
	{
		\DBUtil::drop_table('users');
	}
}