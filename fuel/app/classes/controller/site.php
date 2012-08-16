<?php

class Controller_Site extends Controller_Common
{
    public function action_index()
    {
        $data = array();
        $this->template->title = 'FuelJS';
        $this->template->content = View::forge('site/index', $data);
    }

    public function action_login()
    {
        $data = array();
        $this->template->title = 'Please Login';
        $this->template->content = View::forge('site/login', $data);
    }

    public function action_logout()
    {
        Log::debug('Logout');
        Auth::instance()->logout();
        Response::redirect('/');
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