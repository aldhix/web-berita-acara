<script setup>
import BarButtons from "./DashboardPartials/BarButtons.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

const props = defineProps({
  jadwals: {
    type: Array,
  },
  linkDownloadDaftarHadir: {
    type: String,
  },
  linkDownloadBeritaAcara: {
    type: String,
  },
  linkUpdateAktif: {
    type: String,
  },
});

const formAktif = useForm({
  aktif: null,
});

function setUrlDownloadDaftarHadir(id) {
  return props.linkDownloadDaftarHadir.replace(":jadwal", id);
}

function setUrlDownloadBeritaAcara(id) {
  return props.linkDownloadBeritaAcara.replace(":jadwal", id);
}

function updateAktif(id, aktif) {
  let url = props.linkUpdateAktif.replace(":jadwal", id);
  formAktif.aktif = aktif;
  formAktif.put(url);
}
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="title">Dashboard</h2>
    </template>
    <div class="py-12">
      <div class="content">
        <BarButtons />
        <div class="content-box">
          <table class="table">
            <thead class="thead">
              <tr>
                <th scope="col" class="cell-title">#</th>
                <th scope="col" class="cell-title">Hari</th>
                <th scope="col" class="cell-title">Waktu</th>
                <th scope="col" class="cell-title"></th>
                <th scope="col" class="cell-title">Mata Pelajaran</th>
                <th scope="col" class="cell-title"></th>
              </tr>
            </thead>
            <tbody>
              <template v-for="(row, index) in jadwals" :key="row.id">
                <tr class="row-hover">
                  <td class="cell" v-html="index + 1"></td>
                  <td class="cell" v-html="row.hari"></td>
                  <td class="cell">
                    {{ row.waktu_mulai.substring(0, 5) }} s.d
                    {{ row.waktu_selesai.substring(0, 5) }}
                  </td>
                  <td class="cell">
                    <button
                      @click="updateAktif(row.id, row.aktif)"
                      v-if="row.aktif"
                      type="button"
                      class="btn-sm btn-green"
                    >
                      Aktif
                    </button>
                    <button
                      @click="updateAktif(row.id, row.aktif)"
                      v-else
                      type="button"
                      class="btn-sm btn-red"
                    >
                      Off
                    </button>
                  </td>
                  <th
                    class="cell font-medium text-gray-900 dark:text-white"
                    v-html="row.nama_mapel"
                  ></th>
                  <td class="cell">
                    <a
                      target="_blank"
                      :href="setUrlDownloadDaftarHadir(row.id)"
                      class="btn-sm btn-blue"
                    >
                      Daftar Hadir
                    </a>
                    <a
                      target="_blank"
                      :href="setUrlDownloadBeritaAcara(row.id)"
                      class="ms-1 btn-sm btn-green"
                    >
                      Berita Acara
                    </a>
                  </td>
                </tr>
              </template>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
