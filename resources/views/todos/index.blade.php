<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
</head>
<body>
    <h1>Daftar Todo</h1>

    <ul>
        @foreach($todos as $todo)
            <li>{{ $todo->title }} - {{ $todo->is_done ? 'Selesai' : 'Belum' }}</li>
        @endforeach
    </ul>
</body>
</html> 
