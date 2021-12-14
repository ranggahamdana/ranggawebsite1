<?php
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $query = mysqli_query($konek,"DELETE FROM anggota where id = '$id'");
    if($query)
    {
        ?>
        <div class="alert alert-danger">
            Data Berhasil Dihapus!
        </div>
        <?php
    header('refresh:3; URL=http://localhost/rangga/admin.php?page=anggota');
    }
} 
if (isset($_POST['save'])) {

    $nis        = $_POST['nis'];
    $nama       = $_POST['nama'];
    $kelas      = $_POST['kelas'];
    $jurusan    = $_POST['jurusan'];
    $tgl_lahir  = $_POST['tgl_lahir'];
    $tlp        = $_POST['tlp'];
    $alamat     = $_POST['alamat'];
    $gender     = $_POST['gender'];
    $query_insert = mysqli_query($konek,"INSERT INTO anggota VALUES('','$nis','$nama','$kelas','$jurusan','$tgl_lahir','$tlp','$alamat','$gender')");
    if($query_insert)
    {
        ?>
        <div class="alert alert-success">
            Data Berhasil Disimpan!
        </div>
        <?php
    header('refresh:3; URL=http://localhost/rangga/admin.php?page=anggota');
    }
  
    
}
?>
<center><h1 class="mt-4 mb-3">Data Anggota</h1></center>
<button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#tambahanggota">
  Tambah Data
</button>
<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Tanggal Lahir</th>
        <th>Telepon</td>
        <th>alamat</th>
        <th>Gender</th>
        <th>--Action--</th>
    </tr>
    <?php
        $no=1;
        $query = mysqli_query($konek,"SELECT * FROM anggota");
        foreach ($query as $row) {
    ?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row['nis']; ?></td>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['kelas']; ?></td>
        <td><?php echo $row['jurusan']; ?></td>
        <td><?php echo $row['tgl_lahir']; ?></td>
        <td><?php echo $row['tlp']; ?></td>
        <td><?php echo $row['alamat']; ?></td>
        <td>
            <?php echo $row['gender']=='L'?'Laki-Laki':'Perempuan'; ?>
        </td>
        <td>
            <a href="?page=anggota&delete=&id=<?php echo $row['id'];?>">
                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </a>
            <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
        </td>
    </tr>
    <?php
    $no++;
    }
    ?>
</table>

<!-- Modal -->
<div class="modal fade" id="tambahanggota" tabindex="-1" aria-labelledby="tambahanggotaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tambahanggotaLabel">Form Tambah Anggota</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="form-group mt-3">
                    <input class="form-control" type="text" name="nis" placeholder="Nomor Induk Siswa" required>
                </div>
                <div class="form-group mt-3">
                    <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group mt-3">
                    <select class="form-control" name="kelas" id="">
                        <option value="">--Pilih Kelas--</option>
                        <option value="XIIRPL1">XII RPL 1</option>
                        <option value="XIIRPL2">XII RPL 2</option>
                        <option value="XIIRPL3">XII RPL 3</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                   <select class="form-control" name="jurusan">
                        <option value="">--Pilih Jurusan--</option>
                        <option value="RPL">Rekayasa Perangkat Lunak</option>
                        <option value="TAV">Teknik Audio Vidio</option>
                        <option value="TKR">Teknik Kendaraan Ringan</option>
                        <option value="TITL">Teknik Instalasi Tenaga Listrik</option>
                   </select>
                </div>
                <div class="form-group mt-3">
                    <input class="form-control" type="date" name="tgl_lahir">
                </div>
                <div class="form-group mt-3">
                    <input class="form-control" type="text" name="tlp" placeholder="Nomor Telepon">
                </div>
                <div class="form-group mt-3">
                    <textarea name="alamat" id="" class="form-control" placeholder="Alamat Lengkap"></textarea>
                </div>
                <div class="form-group mt-3">
                   <select class="form=control" name="gender">
                        <option value="">--Pilih Jenis Kelamin--</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                   </select>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-primary">Save changes</button>
            </form>
        </div>
        </div>
    </div>
</div>