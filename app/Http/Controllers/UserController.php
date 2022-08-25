<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(30);

        return view('user.index', compact('users'));
    }

    function getUser($api) {
        try {
            $result = $api->account->users()['result'];
            foreach ($result as $key => $user) {
                User::firstOrCreate(
                    [
                        'login' => $user['login']
                    ],
                    [
                        'id' =>  $user['id'],
                        'name' => $user['name'],
                        'amo_profile_id' => $user['amo_profile_id']
                    ]
                );
            }
        } catch (\Exception $e) {
            echo 'Exception when calling AccountApi->users: ', $e->getMessage(), PHP_EOL;
        }
    }
}
