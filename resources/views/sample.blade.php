<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <button id="viewBtn" class="btn btn-primary">View File</button>
    <div id="fileContent" style="display: none;"></div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="script.js"></script>

  <script>
    $(document).ready(function() {
  $('#viewBtn').click(function() {
    // Simulate fetching file content from the server
    var fileContent = "This is the content of the file.";

    // Display the file content
    $('#fileContent').text(fileContent).show();
  });
});

  </script>
</body>
</html>
