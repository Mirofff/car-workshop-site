<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExportOrderDocx;
use App\Http\Requests\OperatorAddOrder;
use App\Models\Order;
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
            ->select('*')
            ->get();
        $cars = DB::table('cars')->join('models', 'cars.id', '=', 'models.id')->join('marks', 'models.mark_id', '=', 'marks.id')->select('*')->get();
        $users = DB::table('users')->get();
        return view($table, array_merge(['rows' => $rows, 'cars' => $cars, 'users' => $users, 'title' => $table]));
    }

    public function add_order(OperatorAddOrder $request)
    {
        $user = Order::create($request->validated());

        return redirect(config('constants.ORDERS_TABLE_URL'))->with('success', 'Account successfully registered!');
    }

    public function delete_order(OperatorDeleteOrder $request)
    {
        $user = Order::create($request->validated());

        return redirect(config('constants.ORDERS_TABLE_URL'))->with('success', 'Account successfully registered!');
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
