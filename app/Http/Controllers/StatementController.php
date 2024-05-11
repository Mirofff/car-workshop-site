<?php

namespace App\Http\Controllers;

use App\Enums\StatementStatus;
use App\Http\Requests\GetStatementRequest;
use App\Http\Requests\PostStatement;
use App\Http\Requests\SaveStatementRequest;
use App\Models\Statement;
use App\Models\UsedConsumable;
use App\Models\UsedService;
use Illuminate\Support\Facades\Schema;
use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\TemplateProcessor;

class StatementController extends Controller
{
    public function __invoke()
    {
        return view('components.table',
            [
                'items' => Statement::all(),
                'columns' => Schema::getColumnListing('statements'),
                'get_route' => 'statement.get',
                'id_column' => 'uuid',
            ]);
    }

    public function save(string $uuid, SaveStatementRequest $req)
    {
        $statement = Statement::whereUuid($uuid)->firstOrFail();
        $statement->status = StatementStatus::Complete;
        $statement->update($req->validated());
        $statement->save();

        return to_route('pages.admin.requests.index');
    }

    public function print(string $uuid)
    {
        $statement = Statement::whereUuid($uuid)->firstOrFail();

        Settings::setZipClass(Settings::PCLZIP);
        try {
            $templateProcessor = new TemplateProcessor(public_path('templates/statement.docx'));
        } catch (CopyFileException $e) {
            dd($e);
        } catch (CreateTemporaryFileException $e) {
            dd($e);
        }


        $uservices = [];
        $full_uservice_sum = 0;
        for ($i = 0; $i < count($statement->uservices); ++$i) {
            $full_uservice_sum += $statement->uservices[$i]->quantity * $statement->uservices[$i]->service->price;
            $uservices[] = ['uservice_index' => $i + 1,
                'service_uuid' => $statement->uservices[$i]->service->uuid,
                'name' => $statement->uservices[$i]->service->name,
                'quantity' => $statement->uservices[$i]->quantity,
                'price' => $statement->uservices[$i]->service->price,
            ];
        }

        $uconsumables = [];
        $full_uconsumables_sum = 0;
        for ($i = 0; $i < count($statement->uconsumables); ++$i) {
            $full_uconsumables_sum += $statement->uconsumables[$i]->quantity * $statement->uconsumables[$i]->consumable->price;
            $uconsumables[] = ['uconsumable_index' => $i + 1,
                'consumable_uuid' => $statement->uconsumables[$i]->consumable->uuid,
                'name' => $statement->uconsumables[$i]->consumable->name,
                'quantity' => $statement->uconsumables[$i]->quantity,
                'price' => $statement->uconsumables[$i]->consumable->price,
            ];
        }


        $templateProcessor->setValues([
            "registration_plate" => $statement->vehicle->registration_plate,
            "uuid" => $statement->uuid,
            "datetime" => $statement->created_at,
            "mark" => $statement->vehicle->model->mark->name,
            "model" => $statement->vehicle->model->name,
            "comment" => $statement->comment,
            "full_uservices_sum" => $full_uservice_sum,
            "full_uconsumables_sum" => $full_uconsumables_sum,
            "full_sum" => $full_uconsumables_sum + $full_uservice_sum,
            "client_fio" => sprintf("%s %s %s",
                $statement->client->last_name,
                $statement->client->first_name,
                $statement->client->second_name),
            "tech_passport" => $statement->vehicle->tech_passport,
            "vin" => $statement->vehicle->vin,
            "year_of_manufacture" => $statement->vehicle->year_of_manufacture,
            "mileage" => $statement->vehicle->mileage,
            "color" => $statement->vehicle->color,
            "engine" => $statement->vehicle->engine,
        ]);
        $templateProcessor->cloneRowAndSetValues('uservice_index', $uservices);
        $templateProcessor->cloneRowAndSetValues('uconsumable_index', $uconsumables);

        $templateProcessor->saveAs("wtf.docx");
        return response()->download('wtf.docx',
            "statement_" . $statement->uuid,
            ['Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'Content-Disposition: attachment; filename="' . "statement_" . $statement->uuid . '.docx"']);
    }


    public function post(PostStatement $request)
    {
        $statement = Statement::create($request->validated());

        return to_route('statement.get', ['uuid' => $statement->uuid]);
    }

    public function get(GetStatementRequest $request)
    {
        $statement = Statement::whereUuid($request->statement_uuid)->firstOrFail();
        $uconsumables = UsedConsumable::where(['statement_uuid' => $statement->uuid])->get();
        $uservices = UsedService::where(['statement_uuid' => $statement->uuid])->get();

        return view('pages.admin.statements.index',
            [
                'request' => $statement->request,
                'client' => $statement->client,
                'statement' => $statement,
                'vehicle' => $statement->vehicle,
                'uconsumables' => $uconsumables,
                'uservices' => $uservices,
            ]);
    }
}
