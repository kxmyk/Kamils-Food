<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(OrderDataTable $orderDataTable)
    {
        return $orderDataTable->render('admin.order.index');
    }
}
