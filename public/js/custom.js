  // auto-expand-textarea.js
  // Function to automatically resize the textarea based on its content
  // function autoResizeTextarea() {
  // var textarea = document.getElementById('contribution_to_knowledge');
  // textarea.style.height = 'auto'; // Reset the height
  // textarea.style.height = (textarea.scrollHeight) + 'px'; // Set the height to the scrollHeight
  // }

  // // Run the autoResizeTextarea function when the page loads and whenever the textarea content changes
  // window.addEventListener('load', autoResizeTextarea);
  // document.getElementById('contribution_to_knowledge').addEventListener('input', autoResizeTextarea);


  //   tinymce.init({
  //     selector: "#authors, #introduction, #aims_and_objectives, #background, #workplan, #expected_research_contribution, #proposed_methodology, #resources, #references",
  //     plugins: "link image code table", // Add "table" to the list of plugins
  //     toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | link image | code table",
  //     images_upload_url: '/your-image-upload-route', // Replace with your Laravel route to handle image uploads
  //     images_upload_base_path: '/uploads', // Optional: Set the base path for image uploads
  //     height: 200, // Set the height (in pixels) as desired
  //     width: "100%",
  // });


// $(function () {
//     // Summernote
//     $('#summernote').summernote()

//     // CodeMirror
//     CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
//       mode: "htmlmixed",
//       theme: "monokai"
//     });
//   })

    // $(document).ready(function () {
    //     $(".accomplish-button").click(function () {
    //         // Toggle the button status and appearance
    //         if ($(this).data("status") === "in_progress") {
    //             $(this).removeClass("btn-warning").addClass("btn-success");
    //             $(this).html('<i class="fas fa-check"></i> Accomplished');
    //             $(this).data("status", "accomplished");
    //         } 
    //         else {
    //             $(this).removeClass("btn-success").addClass("btn-warning");
    //             $(this).html('<i class="fas fa-spinner"></i> In Progress');
    //             $(this).data("status", "in_progress");
    //         }
    //     });
    // });

    // if(session('error'))
    //     $(document).ready(function () {
    //         $('#errorModal').modal('show');
    //     });
    // endif



    

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