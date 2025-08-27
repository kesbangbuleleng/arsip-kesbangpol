<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
</head>
<body>
    <h1>Todo List</h1>

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Tambah todo">
        <button type="submit">Tambah</button>
    </form>

    <ul>
        @foreach($todos as $todo)
            <li>
                {{ $todo->title }}
                @if(!$todo->is_done)
                    <form action="{{ route('todos.update', $todo) }}" method="POST" style="display:inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit">Selesai</button>
                    </form>
                @endif
                <form action="{{ route('todos.destroy', $todo) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
