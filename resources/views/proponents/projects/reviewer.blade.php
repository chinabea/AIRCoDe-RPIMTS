<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

</head>
<body>

    <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal content here -->
            <div class="modal-content">
                <div class="modal-body">
                  <select class="selectpicker" data-mdb-container="#myModal">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                    <!-- Add more options as needed -->
                  </select>
                </div>
              </div>

          </div>
        </div>
      </div>
      <script>
        $(document).ready(function() {
          $('.selectpicker').selectpicker();
        });
      </script>



</body>
</html>
