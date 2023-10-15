<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExportOrderDocx;
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
        $rows = DB::table($table)->get();
        return view($table, array_merge(['rows' => $rows, 'title' => $table]));
    }

    public function OrderDocx(ExportOrderDocx $request)
    {
        $order_id = $request->validated()['id'];
        $order = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('cars', 'orders.car_id', '=', 'cars.id')
            ->join('models', 'cars.model_id', '=', 'models.id')
            ->join('marks', 'models.mark_id', '=', 'marks.id')
            ->select('orders.id as order_id', 'orders.date as order_date', 'orders.recommendations', 'orders.reason', 'cars.mileage')
            ->where('orders.id', $order_id)
            ->get()[0];
        // $query =
        //     '
        // select
        // o.`date` "order_date",
        // o.reason,
        // o.recommendations,
        // o.id "order_id",
        // c.vin,
        // c.`year`,
        // c.mileage,
        // c.register_sign,
        // mk.mark,
        // md.model
        // from
        // orders o
        // join users u on
        // o.user_id = u.id
        // join cars c on
        // o.car_id = c.id
        // join models m on
        // c.model_id = m.id
        // join models md on
        // c.model_id = md.id
        // join marks mk on
        // mk.id = m.mark_id
        // where o.id = ' . $order_id;
        // $order = DB::select($request, [1]);

        $tProcessor = new TemplateProcessor('/home/user/colledge/car-workshop-site/public/template.docx');
        $tProcessor->setValue('order_id', $order->order_id);
        $tProcessor->setValue('mileage', $order->mileage);
        $tProcessor->setValue('order_date', $order->order_date);
        $tProcessor->setValue('recomendation', $order->recommendations);
        $tProcessor->setValue('reason', $order->reason);

        $tempFile = tempnam(sys_get_temp_dir(), 'document');
        $tProcessor->saveAs($tempFile);

        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: attachment; filename="document.docx"');

        readfile($tempFile);

        unlink($tempFile);
    }
}
