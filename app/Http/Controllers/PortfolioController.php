<?php

namespace App\Http\Controllers;

use App\Repositories\UserInfoRepository;

class PortfolioController extends Controller
{
    public function index()
    {

        $admin = UserInfoRepository::getUserInfoByFirst();
        return view('portfolio.index', [
            'admin' => $admin
        ]);
    }

    public function show()
    {

    }
}
