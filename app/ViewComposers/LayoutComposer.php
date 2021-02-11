<?php

namespace App\ViewComposers;
use App\Models\AboutCompany;
use App\Models\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class LayoutComposer
{
    public function compose(View $view)
    {
        $view->with('aboutCompanyPages', AboutCompany::all());
        $view->with('notification', Notification::where('id','>',0)->first());
        $basketTotalCount=session()->has('basketTotalCount')?session('basketTotalCount'):0;
        $view->with('basketTotalCount',$basketTotalCount);
    }
}
