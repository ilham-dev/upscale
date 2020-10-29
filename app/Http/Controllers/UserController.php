<?php

namespace App\Http\Controllers;

use ilhamdev\upscale\controllers\IndexController;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->user = new  IndexController();
    }

    public function User(Request $request)
    {
        $data = $this->user->getuser();
        return $data;
    }

    public function UserDetail($id){
        $data = $this->user->getuserdetail($id);
        return $data;
    }
}
