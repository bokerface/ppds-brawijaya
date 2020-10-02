<?php

namespace App\Controllers;

use App\Models\LogbookModel;

class Logbook extends BaseController
{
    protected $logbook_model;

    public function __construct()
    {
        $this->logbook_model = new LogbookModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Logbook',
            'page_header' => 'Logbook PPDS',
            'query' => $this->logbook_model->getLogbook()
        ];

        return view('logbook/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Logbook',
            'page_header' => 'Logbook PPDS',
        ];

        return view('logbook/tambah', $data);
    }

    public function post()
    {
        dd($this->request->getVar());
    }
}
