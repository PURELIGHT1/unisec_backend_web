<table border="2" width="100%">
    <thead>
        <tr>
            <th style="background-color: #000000; color: #ffffff; text-align:center;">No.</th>
            <th style="background-color: #000000; color: #ffffff; text-align:center;">Nama</th>
            <th style="background-color: #000000; color: #ffffff; text-align:center;">NPM</th>
            <th style="background-color: #000000; color: #ffffff; text-align:center;">Divisi</th>

            <th style="background-color: #000000; color: #ffffff; text-align:center;">Pertemuan</th>
            <th style="background-color: #000000; color: #ffffff; text-align:center;">Status</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach($absensis as $item)
        <tr>
            <td style="background-color: #d3d3d3; text-align:center;">{{ $no++ }}</td>
            <td style="background-color: #d3d3d3; text-align:center;">{{ $item->nama_mhs }}</td>
            <td style="background-color: #d3d3d3; text-align:center;">{{ $item->npm }}</td>
            <td style="background-color: #d3d3d3; text-align:center;">{{ $item->div_nama }}</td>

            <td style="background-color: #d3d3d3; text-align:center;">{{ $item->name }}</td>
            <td style="background-color: #d3d3d3; text-align:center;">{{ $item->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>