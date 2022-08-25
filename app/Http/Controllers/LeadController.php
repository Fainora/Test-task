<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Introvert\ApiClient;
use Introvert\Configuration;


class LeadController extends Controller
{
    public function index()
    {
        require_once base_path() . '/vendor/autoload.php';

        Configuration::getDefaultConfiguration()->setApiKey('key', '23bc075b710da43f0ffb50ff9e889aed');
        $api = new ApiClient();
        $this->getLead($api);

        $leads = Lead::paginate(30);

        return view('lead.index', compact('leads'));
    }

    public function getLead($api) {
        $crm_user_id = null; // int[] | фильтр по id ответственного
        //$status = (new StatusController)->getIdStatuses($api); // фильтр по ВСЕМ ID статусам
        $status = [47787259, 44970358]; // фильтр по выбранным ID статусам
        $id = null; // int[] | фильтр по id
        $ifmodif = null; // string | фильтр по дате изменения. timestamp или строка в формате 'D, j M Y H:i:s'
        $count = 0; // int | Количество запрашиваемых элементов
        $offset = 0; // int | смещение, относительно которого нужно вернуть элементы

        //Получаем общее кол-во сделок
        $total_count = $api->lead->getAll($crm_user_id, $status, $id, $ifmodif, $count, $offset)['count'];
        $count = 50;

        try {
            do {
                //Получаем все сделки
                $result = $api->lead->getAll($crm_user_id, $status, $id, $ifmodif, $count, $offset);

                for($i = 0; $i < $result['count']; $i++) {
                    try {
                        $lead = Lead::firstOrCreate(
                            [
                                'name' => $result['result'][$i]['name'],
                            ],
                            [
                                'id' => $result['result'][$i]['id'],
                                'date_create' => $result['result'][$i]['date_create'],
                                'last_modified' => $result['result'][$i]['last_modified'],
                                'price' => $result['result'][$i]['price'],
                                'responsible_user_id' => $result['result'][$i]['responsible_user_id'],
                                'linked_company_id' => (int) $result['result'][$i]['linked_company_id'],
                                'pipeline_id' => $result['result'][$i]['pipeline_id'],
                                'date_close' => $result['result'][$i]['date_close'],
                                'status_id' => $result['result'][$i]['status_id']
                            ]
                        );
                    } catch (\Exception $e) {
                        echo 'Что-то пошло не так ' . $e . '<br>' . '<br>';
                    }
                }

                $offset += 250;
            } while ($count > 300/*$offset < $total_count*/);
        } catch (\Exception $e) {
            echo 'Exception when calling LeadApi->getAll: ', $e->getMessage(), PHP_EOL;
        }
    }
}
