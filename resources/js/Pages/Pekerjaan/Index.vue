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
    <div class="container mt-3">
        <h1>Daftar Pekerjaan</h1>
    </div>

    <div class="container mt-3">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th width="200px">Nama</th>
                    <th>Job</th>
                    <th width="150px">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(pekerjaan, index) in pekerjaan" :key="pekerjaan.id">
                    <td>{{ index + 1 }}</td>
                    <td>{{ pekerjaan.nama }}</td>
                    <td>{{ pekerjaan.job }}</td>
                    <td>
                        <Link :href="`/pekerjaan/${pekerjaan.id}/edit`" class="btn btn-warning"><i class="fa-solid fa-file-pen"></i></Link>
                        <button @click="destroy(pekerjaan.id)" class="btn btn-danger ms-2"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <Link href="/pekerjaan/create" class="btn btn-primary"><i class="fa-solid fa-briefcase"></i> Tambah Pekerjaan</Link>
    </div>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3'
const props = defineProps({
    pekerjaan: Object
})
const destroy = (id) => {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        form.delete(`/pekerjaan/${id}`)
    }
}
const form = useForm({});
const deletePost = (id) => {
    form.delete(`pekerjaan/${id}`);
};
</script>