<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\ProjectsModel;
use Illuminate\Http\Request;

class PdfController extends Controller
{

    public function generatePDF($data_id)
    {
        // Retrieve data based on the $data_id
        $data = ProjectsModel::findOrFail($data_id);

        // Load the PDF view and pass the data
        $pdf = PDF::loadView('pdf.report', ['data' => $data]);

        return $pdf->download('report.pdf');
    }

}
