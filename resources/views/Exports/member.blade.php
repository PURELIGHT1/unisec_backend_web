<table style="border: 1px solid; width: 100%;">
    <thead>
        <tr>
            <th style="font-style: bold;">No</th>
            <th style="font-weight: bolder;">Nama</th>
            <th style="font-weight: bolder;">NPM</th>
            <th style="font-weight: bolder;">Email</th>
            <th style="font-weight: bolder;">Nomor Handphone</th>
            <th style="font-weight: bolder;">ID Line</th>
            <th style="font-weight: bolder;">Angkatan</th>
            <th style="font-weight: bolder;">Program Studi</th>
            <th style="font-weight: bolder;">Divisi</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach($members as $item)
        <tr>
            <td style="text-align: center;">{{ $no++ }}</td>
            <td style="text-align: center;">{{ $item->name }}</td>
            <td style="text-align: center;">{{ $item->npm }}</td>
            <td style="text-align: center;">{{ $item->emailStudents }}</td>
            <td style="text-align: center;">{{ $item->noHp }}</td>
            <td style="text-align: center;">{{ $item->line }}</td>
            <td style="text-align: center;">{{ $item->angkatan }}</td>
            <td style="text-align: center;">{{ $item->prodi_name }}</td>
            <td style="text-align: center;">{{ $item->div_name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>