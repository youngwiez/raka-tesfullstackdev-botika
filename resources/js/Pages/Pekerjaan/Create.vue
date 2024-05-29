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
                        <Link class="nav-link" href="/karyawan">Tabel Karyawan</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link active" href="/pekerjaan">Tabel Pekerjaan</Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-3 mb-3">
        <h1>Tambah Data Pekerjaan</h1>
        <form @submit.prevent="form.post('/pekerjaan')">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input v-model="form.nama" type="text" class="form-control" id="nama" placeholder="Masukkan nama pekerjaan">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Job</label>
                <input v-model="form.job" type="text" class="form-control" id="job" placeholder="Masukkan job pekerjaan">
            </div>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-circle-check"></i> Simpan</button>
            <Link href="/pekerjaan" class="btn btn-primary ms-2"><i class="fa-solid fa-circle-left"></i> Kembali</Link>
        </form>
    </div>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3'
const form = useForm({
    nama: null,
    job: null
})
</script>