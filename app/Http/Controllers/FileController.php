<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {


        return view('submission-details.project-teams.teams');
    }


    public function loadContent()
    {
        // Fetch the content from the file or any other data source
        $content = file_get_contents('/path/to/your/file'); // Replace with the actual path to your file

        return $content;
    }

}
