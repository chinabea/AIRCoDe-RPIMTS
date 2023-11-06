

  //   tinymce.init({
  //     selector: "#authors, #introduction, #aims_and_objectives, #background, #workplan, #expected_research_contribution, #proposed_methodology, #resources, #references",
  //     plugins: "link image code table", // Add "table" to the list of plugins
  //     toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | link image | code table",
  //     images_upload_url: '/your-image-upload-route', // Replace with your Laravel route to handle image uploads
  //     images_upload_base_path: '/uploads', // Optional: Set the base path for image uploads
  //     height: 200, // Set the height (in pixels) as desired
  //     width: "100%",
  // });

  $(document).ready(function() {
    // Button click event handlers
    $('#review-btn').click(function() {
      $('#review-form').show();
      $('#details-form, #tasks-form, #status-form, #reviewer-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });
    $('#details-btn').click(function() {
      $('#details-form').show();
      $('#review-form, #tasks-form, #status-form, #reviewer-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#tasks-btn').click(function() {
      $('#tasks-form').show();
      $('#review-form, #details-form, #status-form, #reviewer-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#status-btn').click(function() {
      $('#status-form').show();
      $('#review-form, #tasks-form, #details-form, #reviewer-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#reviewer-btn').click(function() {
      $('#reviewer-form').show();
      $('#review-form, #tasks-form, #status-form, #details-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#files-btn').click(function() {
      $('#files-form').show();
      $('#review-form, #tasks-form, #details-form, #reviewer-form, #status-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#messages-btn').click(function() {
      $('#messages-form').show();
      $('#review-form, #tasks-form, #details-form, #reviewer-form, #status-form, #files-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#actions-btn').click(function() {
      $('#actions-form').show();
      $('#review-form, #tasks-form, #details-form, #reviewer-form, #status-form, #files-form, #messages-form, #lib-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#lib-btn').click(function() {
      $('#lib-form').show();
      $('#review-form, #tasks-form, #details-form, #reviewer-form, #status-form, #files-form, #messages-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#classifications-btn').click(function() {
      $('#classifications-form').show();
      $('#tasks-form, #details-form, #reviewer-form, #status-form, #files-form, #messages-form, #actions-form, #lib-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#project-team-btn').click(function() {
      $('#project-team-form').show();
      $('#review-form, #tasks-form, #details-form, #reviewer-form, #status-form, #files-form, #messages-form, #actions-form, #lib-form, #classifications-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#cash-program-btn').click(function() {
      $('#cash-program-form').show();
      $('#review-form, #tasks-form, #details-form, #reviewer-form, #status-form, #files-form, #messages-form, #actions-form, #lib-form, #classifications-form, #project-team-form, #reprogramming-status-form').hide();
    });

    $('#reprogramming-status-btn').click(function() {
      $('#reprogramming-status-form').show();
      $('#review-form, #tasks-form, #details-form, #status-form, #reviewer-form, #files-form, #messages-form, #actions-form, #lib-form, #classifications-form, #project-team-form, #cash-program-form').hide();
    });
  });
