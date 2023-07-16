<!DOCTYPE html>
<html>
<head>
    <title>Project Team</title>
</head>
<body>
    <h1>CRUD Operation</h1>

    <!-- Display the list of items -->
    <h2>Items</h2>
    <ul>
    </ul>


    <!-- Update an existing item form -->
    <h2>Update Item</h2>
    
    

    <!-- Delete an item -->
    <h2>Delete Item</h2>
    <form action="{{ route('proponents.projects.approved-projects.destroy') }}" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Delete">
    </form>
</body>
</html>
