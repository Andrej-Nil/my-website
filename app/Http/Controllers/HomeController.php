<?php

namespace App\Http\Controllers;



use App\Repositories\PortfolioRepository;
use App\Repositories\UserInfoRepository;

class HomeController extends Controller
{

    public function index(){
        $count = 10;
        $admin = UserInfoRepository::getUserInfoByFirst();
        $portfolioData = PortfolioRepository::getPaginationByIsDisplay(1, $count);

        return view('home', [
            'admin' => $admin,
            'portfolioList' => $portfolioData['data']
        ]);
    }
}
