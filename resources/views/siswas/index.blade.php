<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DataSiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: rgb(250, 247, 247)">

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        
                        <a href="{{ route('siswa.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nis</th>
                                <th scope="col">Nisn</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">JK</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Hobi</th>
                                <th scope="col">Warna</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($siswas as $siswa)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/siswas/').$siswa->image }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $siswa->nama }}</td>
                                    <td>{{ $siswa->nis }}</td>
                                    <td>{{ $siswa->relasinisn->nisn }}</td>
                                    <td>{{ $siswa->tempatlahir }}</td>
                                    <td>{{ $siswa->tanggallahir }}</td>
                                    <td>{{ $siswa->alamat }}</td>
                                    <td>{{ $siswa->jeniskelamin }}</td>
                                    <td>{{ $siswa->agama }}</td>
                                    <td>{{ $siswa->email }}</td>
                                    <td>{{ $siswa->hobi }}</td> 
                                    <td>
                                        
                                        <div style="background-color:{{ $siswa->warna }}" >{{ $siswa->warna }} </div>
                                    </td> 

                                    <td class="text-center">
                                        
                                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('siswa.destroy', $siswa->id) }} " method="post" >
                                    

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $siswas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>