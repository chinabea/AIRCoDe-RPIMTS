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

    <!-- Create a new item form -->
    <h2>Create New Item</h2>
    <form action="{{ route('projectteam.store') }}" method="POST">
        <label for="member_name">Name:</label>
        <input type="text" id="member_name" name="name" required><br>

        <label for="role">Role:</label>
        <textarea id="role" name="role" required></textarea><br>

        <input type="submit" value="Create">
    </form>

    <!-- Update an existing item form -->
    <h2>Update Item</h2>
    
    <form action="{{ route('proponents.projects.approved-projects.update') }}" method="POST">
                @method('PUT')
                    @csrf
        <label for="member_name">Name:</label>
        <input type="text" id="member_name" name="member_name" value="{{ $project_teams->member_name }}" required><br>

        <label for="role">Role:</label>
        <textarea id="role" name="role" required>{{ $project_teams->role }}</textarea><br>

        <input type="submit" value="Update">
    </form>

    <!-- Delete an item -->
    <h2>Delete Item</h2>
    <form action="{{ route('proponents.projects.approved-projects.destroy') }}" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Delete">
    </form>
</body>
</html>
