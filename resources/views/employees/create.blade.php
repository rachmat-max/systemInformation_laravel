<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employee</title>
</head>
<body>
    <h1>Create New Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="position">Position:</label>
        <input type="text" name="position" id="position" required><br>

        <label for="salary">Salary:</label>
        <input type="text" name="salary" id="salary" required><br>

        <button type="submit">Create Employee</button>
    </form>
</body>
</html>
