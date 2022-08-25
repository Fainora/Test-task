<?php

namespace App\Http\Controllers;

use App\Models\Pipeline;
use Illuminate\Http\Request;

class PipelineController extends Controller
{
    public function index()
    {
        $pipelines = Pipeline::paginate(30);

        return view('pipeline.index', compact('pipelines'));
    }

    function getPipeline($api) {
        try {
            $result = $api->account->pipelines()['result'];
            foreach($result as $key => $pipeline) {
                Pipeline::firstOrCreate(
                    ['id' =>  $key],
                    ['name' => $pipeline]
                );
            }
        } catch (\Exception $e) {
            echo 'Exception when calling AccountApi->pipelines: ', $e->getMessage(), PHP_EOL;
        }
    }
}
