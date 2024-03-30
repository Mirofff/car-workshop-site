<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\TemplateProcessor;

class ReportsController extends Controller
{
    public function statistic()
    {
        $conn = mysqli_connect('127.0.0.1', 'root', 'password', 'car-workshop');
        $result = mysqli_query($conn,
            "select m2.name, count(m2.name) as 'vehicles_count', (select sum(used_consumables.quantity * consumables.price) from vehicles join used_consumables on statements.uuid = used_consumables.statement_uuid join used_services on statements.uuid = used_services.statement_uuid join consumables on used_consumables.consumable_uuid = consumables.uuid join services on used_services.service_uuid = services.uuid group by vehicle_uuid) as 'full_sum' from vehicles join statements on statements.vehicle_uuid = vehicles.uuid join models m on vehicles.model_id = m.id join marks m2 on m.mark_id = m2.id group by m2.name");

        $data = [];
        for ($i = 0; $statistic_report_data = mysqli_fetch_row($result); ++$i) {
            $data [] = ['index' => $i,
                        'mark' => $statistic_report_data['name'],
                        'vehicles_count' => $statistic_report_data['vehicles_count'],
                        'full_sum' => $statistic_report_data['full_sum']];
        }
        Settings::setZipClass(Settings::PCLZIP);
        $template_processor = new TemplateProcessor(public_path('templates/statistic.docx'));
        $template_processor->cloneRowAndSetValues('index', $data);

        $template_processor->saveAs('statistic_report.docx');

        return response()->download('statistic_report.docx',
            "statistic_report",
            ['Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document',
             'Content-Disposition: attachment; filename=statistic_report.docx']);

    }

    public function Dynamic(Request $req)
    {
        $conn = mysqli_connect('127.0.0.1', 'root', 'password', 'car-workshop');
        $request = "select sum(services.price * used_services.quantity) as used_services_sum, sum(consumables.price * used_consumables.quantity) as used_consumables_sum from statements join used_services on statements.uuid = used_services.statement_uuid join used_consumables on statements.uuid = used_consumables.statement_uuid join consumables on used_consumables.consumable_uuid = consumables.uuid join services on used_services.service_uuid = services.uuid where statements.status = 'complete' and (statements.created_at between " . "'" . $req->query('start_date') . "'" . " and " . "'" . $req->query('end_date') . "'" . ")";
        $result = mysqli_query($conn, $request);
        $data = mysqli_fetch_assoc($result);

        Settings::setZipClass(Settings::PCLZIP);
        $template_processor = new TemplateProcessor(public_path('templates/dynamic.docx'));
        $template_processor->setValues(
            ['start_date' => $req->query('start_date'),
             'end_date' => $req->query('end_date'),
             'used_services_sum' => $data['used_services_sum'],
             'used_consumables_sum' => $data['used_consumables_sum']]);

        $template_processor->saveAs('statistic_report.docx');

        return response()->download('statistic_report.docx',
            "statistic_report",
            ['Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document',
             'Content-Disposition: attachment; filename=statistic_report.docx']);

    }
}
