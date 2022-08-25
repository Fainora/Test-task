<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::paginate(30);

        return view('status.index', compact('statuses'));
    }

    function getStatus($api) {
        try {
            $result = $api->account->allStatuses()['result'];
            foreach($result as $value) {
                foreach($value as $key => $status) {
                    Status::firstOrCreate(
                        ['id' =>  $status['id']],
                        [
                            'name' => $status['name'],
                            'pipeline_id' => $status['pipeline_id']
                        ]
                    );
                }
            }
        } catch (\Exception $e) {
            echo 'Exception when calling AccountApi->allStatuses: ', $e->getMessage(), PHP_EOL;
        }
    }

    function getIdStatuses($api) {
        try {
            $statuses = $api->account->allStatuses()['result'];
            $statuses_id = [];
            foreach($statuses as $value) {
                foreach($value as $key => $status) {
                    $statuses_id[] += $status['id'];
                }
            }
        } catch (\Exception $e) {
            echo 'Exception when calling AccountApi->allStatuses: ', $e->getMessage(), PHP_EOL;
        }
        //Получаем ID статусов
        return array_unique($statuses_id);
    }
}
