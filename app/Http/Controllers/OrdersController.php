<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExportOrderDocx;
use App\Http\Requests\OperatorAddOrder;
use App\Http\Requests\OperatorDeleteOrder;
use App\Http\Requests\OperatorDetailsOrder;
use App\Http\Requests\OperatorExtendOrderUsedParts;
use App\Http\Requests\OperatorExtendOrderUsedServices;
use App\Http\Requests\OperatorSaveDetails;
use App\Models\Order;
use App\Models\UsedPart;
use App\Models\UsedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;

class OrdersController extends Controller
{
    public function __invoke()
    {
        $table = 'orders';
        $rows = DB::table($table)
            ->join('cars', 'orders.car_id', '=', 'cars.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('models', 'cars.model_id', '=', 'models.id')
            ->join('marks', 'models.mark_id', '=', 'marks.id')
            ->select('*', 'orders.id as id')
            ->get();
        $cars = DB::table('cars')
            ->join('models', 'cars.id', '=', 'models.id')
            ->join('marks', 'models.mark_id', '=', 'marks.id')
            ->select('*')
            ->get();
        $users = DB::table('users')->get();
        return view($table, array_merge(['rows' => $rows, 'cars' => $cars, 'users' => $users, 'title' => $table]));
    }

    public function extend_services(OperatorExtendOrderUsedServices $request)
    {
        $order_id = (integer)$request->validated()['order_id'];
        if (!Order::find($order_id)['is_saved']) {
            $service = UsedService::create($request->validated());

            return redirect(config('constants.ORDERS_TABLE_URL_DETAILS') . '?order_id=' . $request->validated()['order_id']);
        }
    }

    public function extend_parts(OperatorExtendOrderUsedParts $request)
    {
        $part = UsedPart::create($request->validated());

        return redirect(config('constants.ORDERS_TABLE_URL_DETAILS') . '?order_id=' . $request->validated()['order_id']);
    }

    public function save_details(OperatorSaveDetails $request)
    {
        Order::find($request->validated()['order_id'])->update(['is_saved' => 1]);

        return redirect(config('constants.ORDERS_TABLE_URL'));
    }

    public function add_order(OperatorAddOrder $request)
    {
        $user = Order::create($request->validated());

        return redirect(config('constants.ORDERS_TABLE_URL'));
    }

    public function delete_order(OperatorDeleteOrder $request)
    {
        Order::create($request->validated());

        return redirect(config('constants.ORDERS_TABLE_URL'))->with('success', 'Account successfully registered!');
    }

    public function index_details(OperatorDetailsOrder $request)
    {
        $order_id = (int) $request->validated()['order_id'];
        $order = Order::find($order_id);
        $parts = DB::table('parts')->get();
        $services = DB::table('services')->get();
        $order_services = DB::table('orders')
            ->join('used_services', 'orders.id', '=', 'used_services.order_id')
            ->join('services', 'used_services.service_id', '=', 'services.id')
            ->where('order_id', $order_id)
            ->get();
        $order_parts = DB::table('orders')
            ->join('used_parts', 'orders.id', '=', 'used_parts.order_id')
            ->join('parts', 'used_parts.part_id', '=', 'parts.id')
            ->where('order_id', $order_id)
            ->get();

        return view('tables.order-details', ['order_id' => $order_id, 'title' => 'Order Details', 'services' => $services, 'parts' => $parts, 'order' => $order, 'order_details' => $order_services, 'order_parts' => $order_parts]);
    }

    public function OrderDocx(ExportOrderDocx $request)
    {
        $order_id = $request->validated()['id'];
        $order = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('cars', 'orders.car_id', '=', 'cars.id')
            ->join('models', 'cars.model_id', '=', 'models.id')
            ->join('marks', 'models.mark_id', '=', 'marks.id')
            ->select('users.phone', 'users.first_name', 'users.second_name', 'users.last_name', 'marks.mark', 'models.model', 'cars.register_sign', 'cars.vin', 'cars.year', 'orders.id as order_id', 'orders.date as created_at', 'orders.recommendations', 'orders.reason', 'cars.mileage')
            ->where('orders.id', $order_id)
            ->get()[0];

        $order_services = DB::table('used_services')
            ->join('orders', 'orders.id', '=', 'used_services.order_id')
            ->join('services', 'used_services.service_id', '=', 'services.id')
            ->select('used_services.id as service_id', 'services.name as service_name', 'used_services.quantity as service_count', 'services.price as coast', 'used_services.quantity')
            ->where('orders.id', $order_id)
            ->get()
            ->toArray();

        $order_parts = DB::table('used_parts')
            ->join('orders', 'orders.id', '=', 'used_parts.order_id')
            ->join('parts', 'used_parts.part_id', '=', 'parts.id')
            ->select('used_parts.quantity', 'used_parts.id as used_part_id', 'parts.unit', 'parts.price as part_price', 'parts.name as used_part_name', 'parts.price as coast')
            ->where('orders.id', $order_id)
            ->get();

        $fullSum = 0;
        foreach ($order_services as $service) {
            $fullSum += $service->coast * $service->quantity;
        }
        foreach ($order_parts as $part) {
            $fullSum += $part->coast * $part->quantity;
        }

        $tProcessor = new TemplateProcessor('/home/user/colledge/car-workshop-site/public/template.docx');
        $tProcessor->setValue('order_id', $order->order_id);
        $tProcessor->setValue('order_date', $order->created_at);
        $tProcessor->setValue('recomendation', $order->recommendations);
        $tProcessor->setValue('reason', $order->reason);
        $tProcessor->setValue('created_at', $order->created_at);

        $tProcessor->setValue('full_sum', $fullSum);

        $tProcessor->setValue('first_name', $order->first_name);
        $tProcessor->setValue('second_name', $order->second_name);
        $tProcessor->setValue('last_name', $order->last_name);
        $tProcessor->setValue('phone', $order->phone);

        $tProcessor->setValue('mark', $order->mark);
        $tProcessor->setValue('model', $order->model);
        $tProcessor->setValue('register_sign', $order->register_sign);
        $tProcessor->setValue('vin', $order->vin);
        $tProcessor->setValue('year', $order->year);
        $tProcessor->setValue('mileage', $order->mileage);

        $tProcessor->cloneRowAndSetValues('service_id', $order_services);
        $tProcessor->cloneRowAndSetValues('used_part_id', $order_parts);

        $tempFile = tempnam(sys_get_temp_dir(), 'document');
        $tProcessor->saveAs($tempFile);

        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: attachment; filename="document.docx"');

        readfile($tempFile);

        unlink($tempFile);
    }
}
