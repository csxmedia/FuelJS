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
        // Render the login page
        $this->template->title = 'Please Login';
        $this->template->content = View::forge('site/login', array());
    }

    public function action_logout()
    {
        // Logout user and redirect to front page
        Auth::instance()->logout();
        Response::redirect('/');
    }
}