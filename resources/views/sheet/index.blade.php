<x-layout>
<h2 class="mb-4">📊 Data dari Google Spreadsheet</h2>
        <div class="card shadow rounded-3">
            <a href="{{route('sheet.add')}}" class="text-primary">Add</a>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            @foreach($rows[0] as $header)
                                <th>{{ $header }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(array_slice($rows, 1) as $row)
                            <tr>
                                @foreach($row as $cell)
                                    <td>{{ $cell }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</x-layout>
        