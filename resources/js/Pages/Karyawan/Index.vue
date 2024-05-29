<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">PT. Wisesa</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/karyawan">Tabel Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="/pekerjaan">Tabel Pekerjaan</Link>
                    </li>
                </ul>
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Filter by">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>
    <div class="container mt-3">
        <h1>Daftar Karyawan</h1>
    </div>

    <div class="container mt-3 mb-3">
        <div class="row mb-3 align-items-center">
            <div class="col-sm-3">
                <label for="status" class="form-label">Filter Divisi</label>
                <select class="form-select" v-model="form.divisi" id="divisi">
                    <option value="">Tampilkan Semua</option>
                    <option value="HRD">HRD</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Production">Production</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label for="status" class="form-label">Filter Status</label>
                <select class="form-select" v-model="form.status" id="status">
                    <option value="">Tampilkan Semua</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>
            <!-- <div class="col-sm-3">
                <label for="pekerjaan_id" class="form-label">Pekerjaan</label>
                <select class="form-select" v-model="form.pekerjaan_id" id="pekerjaan">
                    <option v-for="pekerjaan in props.pekerjaan" :value="pekerjaan.id">{{ pekerjaan.nama }}</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" v-model="form.status" id="status">
                    <option value="">Tampilkan Semua</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>
            <div class="col-sm-2">
                <button @click="applyFilter" class="btn btn-primary">Filter</button>
            </div> -->
        </div>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th width="150px">Nama</th>
                    <th>Email</th>
                    <th width="250px">Alamat</th>
                    <th>Divisi</th>
                    <th>Pekerjaan</th>
                    <th>Status</th>
                    <th width="150px">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(karyawan, index) in karyawan" :key="karyawan.id">
                    <td>{{ index + 1 }}</td>
                    <td>{{ karyawan.nama }}</td>
                    <td>{{ karyawan.email }}</td>
                    <td>{{ karyawan.alamat }}</td>
                    <td>{{ karyawan.divisi }}</td>
                    <td>{{ karyawan.pekerjaan_nama }}</td>
                    <td>{{ karyawan.status }}</td>
                    <td>
                        <Link :href="`/karyawan/${karyawan.id}/edit`" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></Link>
                        <button @click="destroy(karyawan.id)" class="btn btn-danger ms-2"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <Link href="/karyawan/create" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> Tambah Karyawan</Link>
    </div>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3'

const props = defineProps({
    karyawan: Object,
    pekerjaan: Object
})

const destroy = (id) => {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        form.delete(`/karyawan/${id}`)
    }
}
const form = useForm({});

const deletePost = (id) => {
    form.delete(`karyawan/${id}`);
};

// applyFilter('all')
// const applyFilter = (x) => {
//     var x, i
//     x = document.getElementById('status')
//     if (x == 'all') x = ''
//     for (i = 0; i < x.length; i++) {
//         removeClass(x[i], 'show')
//         if (x[i].className.indexOf('x') > -1) addClass(x[i], 'show')
//     }
// }
// function addClass(element, name) {
//     var i, arr1, arr2
//     arr1 = element.className.split(' ')
//     arr2 = name.split(' ')
//     for (i = 0; i < arr2.length; i++) {
//         if (arr1.indexOf(arr2[i]) == -1) {
//             element.className += ' ' + arr2[i]
//         }
//     }
// }
// function removeClass(element, name) {
//     var i, arr1, arr2
//     arr1 = element.className.split(' ')
//     arr2 = name.split(' ')
//     for (i = 0; i < arr2.length; i++) {
//         while (arr1.indexOf(arr2[i]) > -1) {
//             arr1.splice(arr1.indexOf(arr2[i]), 1)
//         }
//     }
//     element.className = arr1.join(' ')
// }
</script>