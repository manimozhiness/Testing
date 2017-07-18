<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Mail;
use App\User;
use Auth;
use DB;

class General
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(User $users)
    {
        $this->users = $users;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
       $users=User::get();

       $view->with('users',$users);
    }
}