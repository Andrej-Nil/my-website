<?php

namespace App\Http\Controllers;

use App\Repositories\PortfolioRepository;
use App\Repositories\UserInfoRepository;

class PortfolioController extends Controller
{
    public function index()
    {

        $admin = UserInfoRepository::getUserInfoByFirst();
        $portfolioList = PortfolioRepository::getPaginationByIsDisplay();
        return view('portfolio.index', [
            'admin' => $admin,
            'portfolioList' => $portfolioList
        ]);
    }

    public function show($id)
    {
        $portfolio = PortfolioRepository::getPortfolioById($id);

        if(!$portfolio){
            abort(404);
        }
        $admin = UserInfoRepository::getUserInfoByFirst();

        return view('portfolio.show', [
            'admin' => $admin,
            'portfolio' =>$portfolio]);
    }
}
