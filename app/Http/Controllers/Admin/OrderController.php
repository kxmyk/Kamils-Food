<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(OrderDataTable $orderDataTable): View | JsonResponse
    {
        return $orderDataTable->render('admin.order.index');
    }
}
