<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;

class productcontroller extends Controller

{
function list2()
{
    $products = DB::connection('mysql2')->table('products')->get();
    $users = DB::connection('mysql')->table('users')->get();

    return [
        'products' => $products,
        'users' => $users,
    ];
}

}
