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
        {% for item in items %}
        <li>{{ item }}</li>
        {% endfor %}
    </ul>

    <!-- Create a new item form -->
    <h2>Create New Item</h2>
    <form action="/items" method="POST">
        <label for="item_name">Name:</label>
        <input type="text" id="item_name" name="name" required><br>

        <label for="item_description">Description:</label>
        <textarea id="item_description" name="description" required></textarea><br>

        <input type="submit" value="Create">
    </form>

    <!-- Update an existing item form -->
    <h2>Update Item</h2>
    <form action="/items/{{ item_id }}" method="POST">
        <label for="item_name">Name:</label>
        <input type="text" id="item_name" name="name" value="{{ item.name }}" required><br>

        <label for="item_description">Description:</label>
        <textarea id="item_description" name="description" required>{{ item.description }}</textarea><br>

        <input type="submit" value="Update">
    </form>

    <!-- Delete an item -->
    <h2>Delete Item</h2>
    <form action="/items/{{ item_id }}" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Delete">
    </form>
</body>
</html>
