<x-admin.layout>
    <div class="row">
        <div class="card mb-4">
            <h5 class="card-header text-center">Data Arsip</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-striped" id="arsipTable">
                        <thead>
                            <tr>
                                @foreach($rows[0] as $header)
                                <th style="font-size: small;">{{ $header }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(array_slice($rows, 1) as $row)
                            <tr>
                                @foreach($row as $cell)
                                <td style="font-size: small;">{{ $cell }}</td>
                                @endforeach
                            </tr>
                            @empty
                            <tr>
                                <td colspan="13" class="text-center">Tidak ada data Arsip!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('script')
    <script>
        $(document).ready(function() {
            $('#arsipTable').DataTable();
        });
    </script>
    @endpush
</x-admin.layout>