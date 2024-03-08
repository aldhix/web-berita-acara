<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";

const modalClear = ref(false);
const formClearData = useForm({});

const konfirmasiClear = () => {
  modalClear.value = true;
};

const clearData = () => {
  formClearData.delete(route("tools.clear"), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
  });
};

const closeModal = () => {
  modalClear.value = false;
  formClearData.reset();
};
</script>

<template>
  <Transition
    enter-active-class="transition ease-in-out"
    enter-from-class="opacity-0"
    leave-active-class="transition ease-in-out"
    leave-to-class="opacity-0"
  >
    <div
      v-if="formClearData.recentlySuccessful"
      class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
      role="alert"
    >
      <span class="font-medium">Berhasil dikosongkan!</span> Data telah berhasil
      dikosongkan pada database.
    </div>
  </Transition>

  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-4 bg-white shadow sm:rounded-lg">
      <button
        @click="konfirmasiClear"
        type="button"
        class="px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
      >
        Kosong Data
      </button>

      <Modal :show="modalClear" @close="closeModal">
        <div class="p-6">
          <h2 class="text-lg font-medium text-gray-900">
            Apakah yakin data akan dikosongkan?
          </h2>

          <p class="mt-1 text-sm text-gray-600">
            Mengkosongkan data berarti menghapus seluruh data Berita Acara,
            Kehadiran Peserta dan Ketidak Hadiran Peserta Ujian.
          </p>

          <div class="mt-6 flex justify-end">
            <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

            <DangerButton
              class="ms-3"
              :class="{ 'opacity-25': formClearData.processing }"
              :disabled="formClearData.processing"
              @click="clearData"
            >
              Ya, Kosongkan Data!
            </DangerButton>
          </div>
        </div>
      </Modal>
    </div>
  </div>
</template>