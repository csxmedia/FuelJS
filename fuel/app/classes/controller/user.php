<?php

class Controller_User extends Controller_Rest
{
    protected $format = 'json';

    public function get_index()
    {
        if(\Auth::check()) {
            $userObject = Auth::instance()->get_user_id();
            $id = $userObject[1];

            if(isset($id) and $id !== false)
            {
                $result = array();
                $groups = Auth::instance()->get_groups();
                $result['logged_in'] = true;

                $this->response(array(
                    'groups' => $groups[0][1],
                    'authenticated' => true
                ));
            }
            else
            {
                $this->response(array('empty' => true, 'logged_in' => false));
            }
        }
        else
        {
            $this->response(array('empty' => true, 'logged_in' => false));
        }
    }

    public function post_check()
    {
        $username = html_entity_decode(Input::post('username'));
        $password = html_entity_decode(Input::post('password'));

        $auth = Auth::instance();
        if($auth->login($username, $password))
        {
            $this->response(array('valid' => true, 'redirect' => '/'), 200);
        }
        else
        {
            $this->response(array('valid' => false, 'error' => 'Invalid user name or password, please try again'), 200);
        }
        // sleep to slow down brute force attempts?
        sleep(1);
    }

}