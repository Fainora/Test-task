<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Introvert\ApiClient;
use Introvert\Configuration;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(30);

        return view('company.index', compact('companies'));
    }

    function getCompany($api) {
        $id = null; // int[] | фильтр по id
        $ifmodif = null; // string | фильтр по дате изменения. timestamp или строка в формате 'D, j M Y H:i:s'
        $count = 0; // int | Количество запрашиваемых элементов
        $offset = 0; // int | смещение, относительно которого нужно вернуть элементы

        //Получаем общее кол-во компаний
        $company_count = $api->company->getAll($id, $ifmodif, $count, $offset)['count'];
        $count = 250;

        try {
            do {
                //Получаем все компании
                $result = $api->company->getAll($id, $ifmodif, $count, $offset);

                for($i = 0; $i < $result['count']; $i++) {
                    foreach ($result['result'] as $key => $company) {
                        Company::firstOrCreate(
                            [
                                'name' => $company['name']
                            ],
                            [
                                'id' =>  $company['id'],
                                'date_create' => $company['date_create'],
                                //'created_user_id' => $company['created_user_id'],
                                'responsible_user_id' => $company['responsible_user_id']
                            ]
                        );
                    }
                }

                $offset += 250;
                // Поставила ограничение временно, т.к. слишком много данных
            } while ($count > 300/*$offset < $company_count*/);
        } catch (\Exception $e) {
            echo 'Exception when calling CompanyApi->getAll: ', $e->getMessage(), PHP_EOL;
        }
    }
}
