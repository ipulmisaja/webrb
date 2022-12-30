<?php

namespace App\Traits;

use App\Models\Visitor;
use Carbon\Carbon;

trait VisitorRepositoryTrait
{
    public function getTotalVisitor()
    {
        return Visitor::count();
    }

    public function getTodayVisitor()
    {
        return Visitor::whereDate('created_at', Carbon::today())->count();
    }

    public function getYesterdayVisitor()
    {
        return Visitor::whereDate('created_at', Carbon::yesterday())->count();
    }
}
