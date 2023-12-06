

// IMAGE SUBMISSION
    $(document).ready(function () {
        $('#content, #research_group, #introduction, #aims_and_objectives, #background, #workplan, #expected_research_contribution, #proposed_methodology, #resources, #references').summernote({
            callbacks: {
                onInit: function () {
                    // Get the Summernote editor instance
                    var summernote = $('#content, #research_group, #introduction, #aims_and_objectives, #background, #workplan, #expected_research_contribution, #proposed_methodology, #resources, #references').summernote();

                    // Attach an event listener to the image button
                    summernote.summernote('toolbar').find('.note-icon-picture').on('click', function () {
                        // Your custom action when the image button is clicked
                        handleImageSubmission();
                    });
                }
            }
        });
    });

    function handleImageSubmission() {
        // Perform actions for image submission
        var imageUrl = prompt("Enter the URL of the image:");
        
        if (imageUrl) {
            // Insert the image into the Summernote editor
            $('#content, #research_group, #introduction, #aims_and_objectives, #background, #workplan, #expected_research_contribution, #proposed_methodology, #resources, #references').summernote('editor.insertImage', imageUrl);
        }
    }

// ADD SUMMERNOTE TEXT EDITOR
// Variable to track whether the content is wrapped
 var isContentWrapped = false;

$(function () {
    // Initialize Summernote for each element separately
    $('#content, #research_group, #introduction, #aims_and_objectives, #background, #workplan, #expected_research_contribution, #proposed_methodology, #resources, #references').each(function () {
        $(this).summernote({
            callbacks: {
                onChange: function (contents) {
                    // Check if the content already starts with a <p> tag
                    isContentWrapped = contents.startsWith('<p>');
                }
            }
        });
    });

    // Submit form
    $('#message,#project').submit(function () {
        // Check if the content is not wrapped
        if (!isContentWrapped) {
            // Wrap content in <p></p> tags for each element separately
            $('#content, #research_group, #introduction, #aims_and_objectives, #background, #workplan, #expected_research_contribution, #proposed_methodology, #resources, #references').each(function () {
                var contents = '<p>' + $(this).summernote('code') + '</p>';
                $(this).summernote('code', contents);
            });
        }
    });
});


  $(document).ready(function() {
    // Button click event handlers
    $('#review-btn').click(function() {
      $('#review-form').show();
      $('#versions-form, #details-form, #tasks-form, #status-form, #reviewer-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });
    $('#versions-btn').click(function() {
      $('#versions-form').show();
      $('#details-form, #tasks-form, #status-form, #reviewer-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });
    $('#details-btn').click(function() {
      $('#details-form').show();
      $('#versions-form, #review-form, #tasks-form, #status-form, #reviewer-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#tasks-btn').click(function() {
      $('#tasks-form').show();
      $('#versions-form, #review-form, #details-form, #status-form, #reviewer-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#status-btn').click(function() {
      $('#status-form').show();
      $('#versions-form, #review-form, #tasks-form, #details-form, #reviewer-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#reviewer-btn').click(function() {
      $('#reviewer-form').show();
      $('#versions-form, #review-form, #tasks-form, #status-form, #details-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#files-btn').click(function() {
      $('#files-form').show();
      $('#versions-form, #review-form, #tasks-form, #details-form, #reviewer-form, #status-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#messages-btn').click(function() {
      $('#messages-form').show();
      $('#versions-form, #review-form, #tasks-form, #details-form, #reviewer-form, #status-form, #files-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#actions-btn').click(function() {
      $('#actions-form').show();
      $('#versions-form, #review-form, #tasks-form, #details-form, #reviewer-form, #status-form, #files-form, #messages-form, #lib-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#lib-btn').click(function() {
      $('#lib-form').show();
      $('#versions-form, #review-form, #tasks-form, #details-form, #reviewer-form, #status-form, #files-form, #messages-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#classifications-btn').click(function() {
      $('#classifications-form').show();
      $('#versions-form, #tasks-form, #details-form, #reviewer-form, #status-form, #files-form, #messages-form, #actions-form, #lib-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#project-team-btn').click(function() {
      $('#project-team-form').show();
      $('#versions-form, #review-form, #tasks-form, #details-form, #reviewer-form, #status-form, #files-form, #messages-form, #actions-form, #lib-form, #classifications-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#cash-program-btn').click(function() {
      $('#cash-program-form').show();
      $('#review-form, #tasks-form, #details-form, #reviewer-form, #status-form, #files-form, #messages-form, #actions-form, #lib-form, #classifications-form, #project-team-form, #reprogramming-status-form').hide();
    });

    $('#reprogramming-status-btn').click(function() {
      $('#reprogramming-status-form').show();
      $('#versions-form, #review-form, #tasks-form, #details-form, #status-form, #reviewer-form, #files-form, #messages-form, #actions-form, #lib-form, #classifications-form, #project-team-form, #cash-program-form').hide();
    });
  });

  $(document).ready(function() {
    // Button click event handlers
    $('#pdf-btn').click(function() {
      $('#pdf-form').show();
      $('#pdf-btn').hide();
    });
  });
