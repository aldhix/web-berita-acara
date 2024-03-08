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
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <BarButtons />
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <table
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
          >
            <thead
              class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
              <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Hari</th>
                <th scope="col" class="px-6 py-3">Waktu</th>
                <th scope="col" class="px-6 py-3"></th>
                <th scope="col" class="px-6 py-3">Mata Pelajaran</th>
                <th scope="col" class="px-6 py-3"></th>
              </tr>
            </thead>
            <tbody>
              <template v-for="(row, index) in jadwals" :key="row.id">
                <tr
                  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                >
                  <td class="px-6 py-4" v-html="index + 1"></td>
                  <td class="px-6 py-4" v-html="row.hari"></td>
                  <td class="px-6 py-4">
                    {{ row.waktu_mulai.substring(0, 5) }} s.d
                    {{ row.waktu_selesai.substring(0, 5) }}
                  </td>
                  <td class="px-6 py-4">
                    <button
                      @click="updateAktif(row.id, row.aktif)"
                      v-if="row.aktif"
                      type="button"
                      class="px-3 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                    >
                      Aktif
                    </button>
                    <button
                      @click="updateAktif(row.id, row.aktif)"
                      v-else
                      type="button"
                      class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                    >
                      Off
                    </button>
                  </td>
                  <th
                    class="px-6 py-4 font-medium text-gray-900 dark:text-white"
                    v-html="row.nama_mapel"
                  ></th>
                  <td class="px-6 py-4">
                    <a
                      target="_blank"
                      :href="setUrlDownloadDaftarHadir(row.id)"
                      class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                      Daftar Hadir
                    </a>
                    <a
                      target="_blank"
                      :href="setUrlDownloadBeritaAcara(row.id)"
                      class="ms-1 px-3 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-blue-800"
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
