<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResouce;

class UsersController extends Controller
{

    public function index(Request $request)
    {
        return new UserCollection(User::full()
            ->ordered($request->orderBy, $request->orderType)
            ->filtered($request->searchToken)->paginated($request->pageLimit));
    }
}
