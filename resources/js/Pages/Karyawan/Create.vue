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
                        <a class="nav-link" href="/pekerjaan">Tabel Pekerjaan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-3 mb-3">
        <h1>Tambah Data Karyawan</h1>
        <form @submit.prevent="form.post('/karyawan')">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input v-model="form.nama" type="text" class="form-control" id="nama" placeholder="Masukkan nama karyawan">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input v-model="form.email" type="email" class="form-control" id="email" placeholder="Masukkan email karyawan">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input v-model="form.alamat" type="text" class="form-control" id="alamat" placeholder="Masukkan alamat karyawan">
            </div>
            <div class="mb-3">
                <label for="divisi" class="form-label">Divisi</label>
                <select class="form-select" v-model="form.divisi" id="divisi">
                    <option value="HRD">HRD</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Production">Production</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="pekerjaan_id" class="form-label">Pekerjaan</label>
                <select class="form-select" v-model="form.pekerjaan_id" id="pekerjaan">
                    <option v-for="pekerjaan in props.pekerjaan" :value="pekerjaan.id">{{ pekerjaan.nama }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <div class="form-check">
                    <input class="form-check-input" v-model="form.status" type="radio" name="status" id="status" value="Aktif">
                    <label class="form-check-label" for="status">
                        Aktif
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" v-model="form.status" type="radio" name="status" id="status" value="Tidak Aktif">
                    <label class="form-check-label" for="status">
                        Tidak Aktif
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-circle-check"></i> Simpan</button>
            <Link href="/karyawan" class="btn btn-primary ms-2"><i class="fa-solid fa-circle-left"></i> Kembali</Link>
        </form>
    </div>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3'

const props = defineProps({
    pekerjaan: Object
})

const form = useForm({
    nama: null,
    email: null,
    alamat: null,
    divisi: null,
    pekerjaan_id: null,
    status: null
})
</script>