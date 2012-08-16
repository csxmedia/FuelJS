<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jsidhu
 * Date: 08/08/2012
 * Time: 18:34
 * To change this template use File | Settings | File Templates.
 */

class Model_User extends Orm\Model {
    protected static $_properties = array(
        'id',
        'fullname',
        'username',
        'password',
        'email',
        'profile_fields',
        'group',
        'last_login',
        'login_hash',
        'enabled',
        'verified',
        'deleted'
    );

}

/* End of file users.php */