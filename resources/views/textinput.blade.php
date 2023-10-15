@extends('layouts.template')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
  </section>
    <div class="container mt-5">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="introduction">Introduction</label>
                    <textarea id="introduction" name="introduction" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="aims_and_objectives">Aims and Objectives</label>
                    <textarea id="aims_and_objectives" name="aims_and_objectives" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="background">Background</label>
                    <textarea id="background" name="background" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="expected_research_contribution">Expected Research Contribution</label>
                    <textarea id="expected_research_contribution" name="expected_research_contribution" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="proposed_methodology">The Proposed Methodology</label>
                    <textarea id="proposed_methodology" name="proposed_methodology" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    tinymce.init({
        selector: "#introduction",
        plugins: "link image code table", // Add "table" to the list of plugins
        toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | link image | code table",
        images_upload_url: '/your-image-upload-route', // Replace with your Laravel route to handle image uploads
        images_upload_base_path: '/uploads', // Optional: Set the base path for image uploads
        height: 200, // Set the height (in pixels) as desired
        width: "100%",
    });

</script>


    
@endsection