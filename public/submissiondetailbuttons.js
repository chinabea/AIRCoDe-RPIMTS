$(document).ready(function() {
    // Button click event handlers
    $('#details-btn').click(function() {
      $('#details-form').show();
      $('#status-form, #reviewer-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#status-btn').click(function() {
      $('#status-form').show();
      $('#details-form, #reviewer-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

      $('#reviewer-btn').click(function() {
      $('#reviewer-form').show();
      $('#status-form, #details-form, #files-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
      });

    $('#files-btn').click(function() {
      $('#files-form').show();
      $('#details-form, #reviewer-form, #status-form, #messages-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#messages-btn').click(function() {
      $('#messages-form').show();
      $('#details-form, #reviewer-form, #status-form, #files-form, #lib-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    // Add event handlers for other buttons here

    $('#actions-btn').click(function() {
      $('#actions-form').show();
      $('#details-form, #reviewer-form, #status-form, #files-form, #messages-form, #lib-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#lib-btn').click(function() {
      $('#lib-form').show();
      $('#details-form, #reviewer-form, #status-form, #files-form, #messages-form, #actions-form, #classifications-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#classifications-btn').click(function() {
      $('#classifications-form').show();
      $('#details-form, #reviewer-form, #status-form, #files-form, #messages-form, #actions-form, #lib-form, #project-team-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#project-team-btn').click(function() {
      $('#project-team-form').show();
      $('#details-form, #reviewer-form, #status-form, #files-form, #messages-form, #actions-form, #lib-form, #classifications-form, #cash-program-form, #reprogramming-status-form').hide();
    });

    $('#cash-program-btn').click(function() {
      $('#cash-program-form').show();
      $('#details-form, #reviewer-form, #status-form, #files-form, #messages-form, #actions-form, #lib-form, #classifications-form, #project-team-form, #reprogramming-status-form').hide();
    });

    $('#reprogramming-status-btn').click(function() {
      $('#reprogramming-status-form').show();
      $('#details-form, #status-form, #reviewer-form, #files-form, #messages-form, #actions-form, #lib-form, #classifications-form, #project-team-form, #cash-program-form').hide();
    });
  });