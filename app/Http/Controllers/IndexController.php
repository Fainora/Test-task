<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Introvert\ApiClient;
use Introvert\Configuration;

class IndexController extends Controller
{
    public function index() {
        require_once base_path() . '/vendor/autoload.php';

        Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR KEY');
        $api = new ApiClient();

        try {
            $result = $api->account->info();
            $account_name = $result['result']['name'];
            $account_id = $result['result']['id'];
        } catch (\Exception $e) {
            echo 'Exception when calling AccountApi->info: ', $e->getMessage(), PHP_EOL;
        }

        $pipelines = (new PipelineController)->getPipeline($api);
        $status = (new StatusController)->getStatus($api);
        $users = (new UserController)->getUser($api);
        $companies = (new CompanyController)->getCompany($api);
        //$leads = (new LeadController)->getLead($api);

        return view('index', compact('account_name', 'account_id'));
    }
}
