<!DOCTYPE html>
<html>

<head>
  <title>Berita Acara</title>
</head>

<body>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Ruang</th>
        <th>Kelas</th>
        <th>Mata Pelajaran</th>
        <th>Tanggal</th>
        <th>Waktu</th>
        <th>Nama Peserta Tidak Hadir</th>
        <th>Jumlah Peserta Hadir</th>
        <th>Jumlah Peserta Tidak Hadir</th>
        <th>Pengawas 1</th>
        <th>Pengawas 2</th>
        <th>Catatan Selama Pelaksanaan Ujian</th>
      </tr>
    </thead>
    <tbody>
      @php
        $no = 1;
      @endphp
      @foreach ($peserta as $row)
        <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $row->berita_acara->ruang->nama_ruang }}</td>
          <td>{{ $row->berita_acara->ruang->kelas }}</td>
          <td>{{ $row->berita_acara->jadwal->nama_mapel }}</td>
          <td>{{ $row->berita_acara->jadwal->tanggal }}</td>
          <td>{{ substr($row->berita_acara->jadwal->waktu_mulai, 0, 5) }}-{{ substr($row->berita_acara->jadwal->waktu_selesai, 0, 5) }}</td>
          <td>{{ $row->nama }}</td>
          <td>{{ $row->berita_acara->peserta_hadir->count() }}</td>
          <td>{{ $row->berita_acara->peserta_absen->count() }}</td>
          <td>{{ $row->berita_acara->pengawas1 ? $row->berita_acara->pengawas1->nama : "-" }}</td>
          <td>{{ $row->berita_acara->pengawas2 ? $row->berita_acara->pengawas2->nama : "-" }}</td>
          <td>{{ $row->berita_acara->catatan }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>