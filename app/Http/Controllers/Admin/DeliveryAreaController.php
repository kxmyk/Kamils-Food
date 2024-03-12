<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DeliveryAreaDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeliveryAreaRequest;
use App\Models\DeliveryArea;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DeliveryAreaController extends Controller
{
    public function index(DeliveryAreaDataTable $deliveryAreaDataTable): View
    {
        return $deliveryAreaDataTable->render('admin.delivery-area.index');
    }

    public function create(): View
    {
        return view('admin.delivery-area.create');
    }

    public function store(DeliveryAreaRequest $request): RedirectResponse
    {
        $area = new DeliveryArea();
        $area->area_name = $request->area_name;
        $area->min_delivery_time = $request->min_delivery_time;
        $area->max_delivery_time = $request->max_delivery_time;
        $area->delivery_fee = $request->delivery_fee;
        $area->status = $request->status;
        $area->save();

        toastr()->success('Created Successfully!');

        return to_route('admin.delivery-area.index');
    }
}
