<div class="container mt-5">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <!-- Hal. List Nama Mahasiswa Panel -->
    <div class="row">
        <div class="col-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Mahasiswa
            </button><br><br>
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach($data['mhs'] as $mhs): ?>
                    <li class="list-group-item">
                        <?= $mhs['nama'] ?>
                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['idMahasiswa'] ?>" class="badge text-bg-danger" style="float:right; margin-left: 1%;" onclick="return confirm('Yakin?');">hapus</a>
                        <!-- data modal dan #formModal copas sini biar jalan pop-up editnya -->
                        <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['idMahasiswa'] ?>"       class="badge text-bg-warning tampilModalUbah" style="float:right; margin-left: 1%;" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['idMahasiswa']; ?>">ubah</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['idMahasiswa'] ?>"       class="badge text-bg-primary" style="float:right;">detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<<<<<<< HEAD
<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Data Mahasiswa</h1>
=======
<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="judulModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalLabel">Tambah Data Mahasiswa</h1>
>>>>>>> phpmvc11_1_updateData_AjaxTuning
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- actionnya ke views/mahasiswa/tambah (gpp kalau belum punya dulu hal. nya), utk methodnya POST -->
                <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="POST">
                    <!-- Nama -->
                    <div class="mb-3">
                        <!-- Untuk input, name (alias name property) itu wajib, agar bisa diambil oleh assoc array phpnya. -->
                        <!-- type text, class biaarkan form-data, id nama. -->
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Input nama panjang anda">
                    </div>
                    <!-- NRP -->
                    <div class="mb-3">
                        <label for="nrp" class="form-label">NRP</label>
                        <input type="number" class="form-control" id="nrp" name="nrp" placeholder="Input Nomor Mahasiswa ID">
                    </div>
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Input email anda">
                    </div>
                    <!-- Jurusan (combobox) -->
                    <div class="mb-3">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Manajemen Bisnis">Manajemen Bisnis</option>
                            <option value="Hukum">Hukum</option>
                            <option value="Psikologi">Psikologi</option>
                            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                            <option value="Ilmu Politik">Ilmu Politik</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>