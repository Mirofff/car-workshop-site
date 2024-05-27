<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\TemplateProcessor;

class ReportsController extends Controller
{
    public function Static()
    {
        $usedConsumablesData = DB::table('marks as ma')
                                 ->join('models as m', 'm.mark_id', '=', 'ma.id')
                                 ->join('vehicles as v', 'm.id', '=', 'v.model_id')
                                 ->leftJoin('statements as s', 'v.id', '=', 's.vehicle_id')
                                 ->join('used_consumables as uc', 'uc.statement_id', '=', 's.id')
                                 ->join('consumables as co', 'co.id', '=', 'uc.consumable_id')
                                 ->select(
                                     'ma.name as mark_name',
                                     DB::raw('co.price * uc.quantity AS full_sum'),
                                     DB::raw('SUM(co.price * uc.quantity) AS final_price'),
                                     'co.price as consumable_price',
                                     'uc.quantity as used_consumable_quantity',
                                     'co.name as consumable_name'
                                 )
                                 ->groupBy('co.id', 'ma.id')
                                 ->orderBy('ma.id')
                                 ->get();

        $usedServicesData = $query = DB::table('marks as ma')
                                       ->join('models as m', 'm.mark_id', '=', 'ma.id')
                                       ->join('vehicles as v', 'm.id', '=', 'v.model_id')
                                       ->leftJoin('statements as s', 'v.id', '=', 's.vehicle_id')
                                       ->join('used_services as us', 'us.statement_id', '=', 's.id')
                                       ->join('services as se', 'se.id', '=', 'us.service_id')
                                       ->select(
                                           'ma.name as mark_name',
                                           DB::raw('se.price * us.quantity as full_sum'),
                                           DB::raw('sum(se.price * us.quantity) as final_price'),
                                           'se.price as service_price',
                                           'us.quantity as used_service_quantity',
                                           'se.name as service_name'
                                       )
                                       ->groupBy('se.id', 'ma.id')
                                       ->orderBy('ma.id')
                                       ->get();

        Settings::setZipClass(Settings::PCLZIP);

        $templateProcessor = new TemplateProcessor(public_path('templates/statistic.docx'));

        $marks = array_unique(array_map(fn($mark) => $mark->mark_name, $usedConsumablesData->toArray()));


        $consumablesReplacements = array();
        $i = 0;
        foreach ($marks as $mark) {
            $final_price = 0;
            foreach ($usedConsumablesData as $row) {
                if ($row->mark_name == $mark) $final_price += $row->full_sum;
            }

            $consumablesReplacements[] = array(
                'mark' => $mark,
                'consumable_name' => '${consumable_name_' . $i . '}',
                'consumable_full_sum' => '${consumable_full_sum_' . $i . '}',
                'consumable_price' => '${consumable_price_' . $i . '}',
                'consumable_quantity' => '${consumable_quantity_' . $i . '}',
                'consumable_final_price' => $final_price,
            );
            $i++;
        }

        $servicesReplacements = array();
        $i = 0;
        foreach ($marks as $mark) {
            $final_price = 0;
            foreach ($usedServicesData as $row) {
                if ($row->mark_name == $mark) $final_price += $row->full_sum;
            }

            $servicesReplacements[] = array(
                'mark' => $mark,
                'service_name' => '${service_name_' . $i . '}',
                'service_full_sum' => '${service_full_sum_' . $i . '}',
                'service_price' => '${service_price_' . $i . '}',
                'service_quantity' => '${service_quantity_' . $i . '}',
                'service_final_price' => $final_price,
            );
            $i++;
        }

        $templateProcessor->cloneBlock(
            'consumables_block',
            count($marks),
            true,
            false,
            $consumablesReplacements
        );

        $templateProcessor->cloneBlock(
            'services_block',
            count($marks),
            true,
            false,
            $servicesReplacements
        );

        $i = 0;
        foreach ($marks as $mark) {
            $servicesValues = array();
            foreach ($usedServicesData as $row) {
                if ($row->mark_name == $mark) {
                    $servicesValues[] = array(
                        "service_name_{$i}" => $row->service_name,
                        "service_full_sum_{$i}" => $row->full_sum,
                        "service_price_{$i}" => $row->service_price,
                        "service_quantity_{$i}" => $row->used_service_quantity,
                        "service_final_price_{$i}" => $row->final_price,
                    );
                }
            }
            $templateProcessor->cloneRowAndSetValues("service_name_{$i}", $servicesValues);

            $consumablesValues = array();
            foreach ($usedConsumablesData as $row) {
                if ($row->mark_name == $mark) {
                    $consumablesValues[] = array(
                        "consumable_name_{$i}" => $row->consumable_name,
                        "consumable_full_sum_{$i}" => $row->full_sum,
                        "consumable_price_{$i}" => $row->consumable_price,
                        "consumable_quantity_{$i}" => $row->used_consumable_quantity,
                        "consumable_final_price_{$i}" => $row->final_price,
                    );
                }
            }
            $templateProcessor->cloneRowAndSetValues("consumable_name_{$i}", $consumablesValues);
            $i++;
        }

        $templateProcessor->saveAs('statistic_report.docx');

        return response()->download(
            'statistic_report.docx',
            "statistic_report.docx",
            [
                'Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'Content-Disposition: attachment; filename=statistic_report.docx'
            ]
        );
    }

    public function Dynamic(Request $req)
    {
        $startDate = $req->query('start_date');
        $endDate = $req->query('end_date');
        $usedConsumablesData = DB::table('used_consumables as u')
                                 ->rightJoin('consumables as co', 'u.consumable_id', '=', 'co.id')
                                 ->rightJoin('statements as s', 'u.statement_id', '=', 's.id')
                                 ->rightJoin('clients as cl', 's.client_id', '=', 'cl.id')
                                 ->rightJoin('vehicles as v', 's.vehicle_id', '=', 'v.id')
                                 ->rightJoin('models as m', 'v.model_id', '=', 'm.id')
                                 ->rightJoin('marks as ma', 'm.mark_id', '=', 'ma.id')
                                 ->select(
                                     DB::raw(
                                         "CONCAT_WS(' ', cl.last_name, cl.first_name, cl.second_name, ma.name, m.name, v.registration_plate) as usedConsumablesStatementInfo"
                                     ),
                                     'co.name as consumableName',
                                     's.id as statementId',
                                     's.execution_date as usedConsumablesStatementExecutionDate',
                                     'co.price as consumablePrice',
                                     'u.quantity as consumableQuantity',
                                 )
                                 ->whereBetween('s.execution_date', [$startDate, $endDate])
                                 ->orderBy('s.execution_date')
                                 ->get();

        $usedServicesData = DB::table('used_services as u')
                              ->rightJoin('services as co', 'u.service_id', '=', 'co.id')
                              ->rightJoin('statements as s', 'u.statement_id', '=', 's.id')
                              ->rightJoin('clients as cl', 's.client_id', '=', 'cl.id')
                              ->rightJoin('vehicles as v', 's.vehicle_id', '=', 'v.id')
                              ->rightJoin('models as m', 'v.model_id', '=', 'm.id')
                              ->rightJoin('marks as ma', 'm.mark_id', '=', 'ma.id')
                              ->select(
                                  DB::raw(
                                      "CONCAT_WS(' ', cl.last_name, cl.first_name, cl.second_name, ma.name, m.name, v.registration_plate) as usedServicesStatementInfo"
                                  ),
                                  'co.name as serviceName',
                                  's.id as statementId',
                                  's.execution_date as usedServicesStatementExecutionDate',
                                  'co.price as servicePrice',
                                  'u.quantity as serviceQuantity',
                              )
                              ->whereBetween('s.execution_date', [$startDate, $endDate])
                              ->orderBy('s.execution_date')
                              ->get();


        Settings::setZipClass(Settings::PCLZIP);
        $templateProcessor = new TemplateProcessor(public_path('templates/dynamic.docx'));

        $statements = array_unique(array_map(fn($state) => $state->statementId, $usedConsumablesData->toArray()));

        $consumablesReplacements = array();
        $servicesReplacements = array();
        $i = 0;
        $allConsumablesFinalPrice = 0;
        $allServicesFinalPrice = 0;
        foreach ($statements as $statement) {
            $consumableFinalPrice = 0;
            foreach ($usedConsumablesData as $row) {
                if ($row->statementId == $statement) {
                    $row->consumableFullPrice = $row->consumablePrice * $row->consumableQuantity;
                    $allConsumablesFinalPrice += $row->consumableFullPrice;
                }
                if ($row->statementId == $statement) {
                    $consumableFinalPrice += $row->consumableFullPrice;
                }
            }
            foreach ($usedConsumablesData as $row) {
                if ($row->statementId == $statement) {
                    $row->consumableFinalPrice = $consumableFinalPrice;
                }
            }

            $serviceFinalPrice = 0;
            foreach ($usedServicesData as $row) {
                if ($row->statementId == $statement) {
                    $row->serviceFullPrice = $row->servicePrice * $row->serviceQuantity;
                    $allServicesFinalPrice += $row->serviceFullPrice;
                }
                if ($row->statementId == $statement) {
                    $serviceFinalPrice += $row->serviceFullPrice;
                }
            }
            foreach ($usedServicesData as $row) {
                if ($row->statementId == $statement) {
                    $row->serviceFinalPrice = $serviceFinalPrice;
                }
            }

            $consumablesReplacements[] = array(
                'consumableName' => '${consumableName_' . $i . '}',
                'consumableQuantity' => '${consumableQuantity_' . $i . '}',
                'consumablePrice' => '${consumablePrice_' . $i . '}',
                'consumableFullPrice' => '${consumableFullPrice_' . $i . '}',
                'consumableFinalPrice' => '${consumableFinalPrice_' . $i . '}',
                'usedConsumablesStatementId' => $statement,
                'usedConsumablesStatementInfo' => '${usedConsumablesStatementInfo_' . $i . '}',
                'usedConsumablesStatementExecutionDate' => '${usedConsumablesStatementExecutionDate_' . $i . '}',
            );

            $servicesReplacements[] = array(
                'serviceName' => '${serviceName_' . $i . '}',
                'serviceQuantity' => '${serviceQuantity_' . $i . '}',
                'servicePrice' => '${servicePrice_' . $i . '}',
                'serviceFullPrice' => '${serviceFullPrice_' . $i . '}',
                'serviceFinalPrice' => '${serviceFinalPrice_' . $i . '}',
                'usedServicesStatementId' => $statement,
                'usedServicesStatementInfo' => '${usedServicesStatementInfo_' . $i . '}',
                'usedServicesStatementExecutionDate' => '${usedServicesStatementExecutionDate_' . $i . '}',
            );

            $i++;
        }
        $templateProcessor->cloneBlock(
            'consumablesBlock',
            count($statements),
            true,
            false,
            $consumablesReplacements,
        );

        $templateProcessor->cloneBlock(
            'servicesBlock',
            count($statements),
            true,
            false,
            $servicesReplacements,
        );

        $i = 0;
        foreach ($statements as $statement) {
            $servicesValues = array();
            foreach ($usedServicesData as $row) {
                if ($row->statementId == $statement) {
                    $servicesValues[] = array(
                        "serviceName_{$i}" => $row->serviceName,
                        "serviceQuantity_{$i}" => $row->serviceQuantity,
                        "servicePrice_{$i}" => $row->servicePrice,
                        "serviceFullPrice_{$i}" => $row->serviceFullPrice,
                    );
                    try {
                        $templateProcessor->setValues(["serviceFinalPrice_{$i}" => $row->serviceFinalPrice]);
                        $templateProcessor->setValues(
                            [
                                "usedServicesStatementInfo_{$i}" =>
                                    $row->usedServicesStatementInfo
                            ]
                        );
                        $templateProcessor->setValues(
                            [
                                "usedServicesStatementExecutionDate_{$i}" =>
                                    $row->usedServicesStatementExecutionDate
                            ]
                        );
                    } catch (Exception) {

                    }
                }
            }
            $templateProcessor->cloneRowAndSetValues("serviceName_{$i}", $servicesValues);

            $consumablesValues = array();
            foreach ($usedConsumablesData as $row) {
                if ($row->statementId == $statement) {
                    $consumablesValues[] = array(
                        "consumableName_{$i}" => $row->consumableName,
                        "consumableQuantity_{$i}" => $row->consumableQuantity,
                        "consumablePrice_{$i}" => $row->consumablePrice,
                        "consumableFullPrice_{$i}" => $row->consumableFullPrice,
                    );
                    try {
                        $templateProcessor->setValues(["consumableFinalPrice_{$i}" => $row->consumableFinalPrice]);;
                        $templateProcessor->setValues(
                            [
                                "usedConsumablesStatementInfo_{$i}" =>
                                    $row->usedConsumablesStatementInfo
                            ]
                        );
                        $templateProcessor->setValues(
                            [
                                "usedConsumablesStatementExecutionDate_{$i}" =>
                                    $row->usedConsumablesStatementExecutionDate
                            ]
                        );
                    } catch (Exception) {

                    }
                }
            }
            $templateProcessor->cloneRowAndSetValues("consumableName_{$i}", $consumablesValues);
            $i++;
        }

        $templateProcessor->setValues(
            [
                "startDate" => $startDate,
                "endDate" => $endDate,
                'allConsumablesFinalPrice' => $allConsumablesFinalPrice,
                'allServicesFinalPrice' => $allServicesFinalPrice,
            ]
        );

        $templateProcessor->saveAs('dynamic_report.docx');

        return response()->download(
            'dynamic_report.docx',
            "dynamic_report.docx",
            [
                'Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'Content-Disposition: attachment; filename=dynamic_report.docx'
            ]
        );
    }
}
