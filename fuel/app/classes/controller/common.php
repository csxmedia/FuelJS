<?php

class Controller_Common extends Controller_Hybrid {

    public function before()
    {
        parent::before();
        Log::debug('Controller: ' . $this->request->controller);
        Log::debug('    Action: ' . $this->request->action);
        if($this->request->controller == 'Controller_Site' && $this->request->action == 'login')
        {
            // Allow unathenticated requests for the login page
            //Log::debug('Show Login Page');
        } else if($this->request->controller == 'Controller_Site' && $this->request->action == 'check')
        {
            // Allow unauthenticated login attempts via post
            //Log::debug('Show Login Page');
        }
        else
        {
            if(\Auth::check())
            {
                // user logged in, proceed
                //$user = \Auth::instance()->get_user_id();
                //Log::debug("    Auth Check: Logged In as $user");
            }
            else
            {
                // user not logged in, send user to login page
                Response::redirect('/login', 'refresh');
            }
        }
    }
}