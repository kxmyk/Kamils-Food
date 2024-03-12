<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DeliveryAreaDataTable;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DeliveryAreaController extends Controller
{
    public function index(DeliveryAreaDataTable $deliveryAreaDataTable): View
    {
        return $deliveryAreaDataTable->render('admin.delivery-area.index');
    }
}
