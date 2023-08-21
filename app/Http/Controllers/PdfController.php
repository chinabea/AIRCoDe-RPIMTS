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
        // Retrieve data based on the $data_id
        $data = ProjectsModel::findOrFail($data_id);

        // Load the PDF view and pass the data
        $pdf = PDF::loadView('exports.report', ['data' => $data]);

        // Add a header to each page using the header view
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isPhpEnabled' => true]);
        $pdf->setOption('header-html', view('generate.pdf')->render());

        // Generate a filename using the project name
        $filename = Str::slug($data->projname) . '.pdf'; // Using Str::slug to create a URL-friendly filename


        return $pdf->download($filename);
    }

}
