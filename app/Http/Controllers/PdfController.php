<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\ProjectsModel;
use Illuminate\Http\Request;

class PdfController extends Controller
{

    public function generatePDF($data_id)
    {
        $data = ProjectsModel::findOrFail($data_id);
        $pdf = PDF::loadView('exports.report', ['data' => $data]);

        $filename = Str::slug($data->projname) . '.pdf';

        return $pdf->download($filename);
    }


}

