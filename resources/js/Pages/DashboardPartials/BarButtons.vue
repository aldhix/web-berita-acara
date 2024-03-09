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
      class="alert-green"
      role="alert"
    >
      <span class="font-medium">Berhasil dikosongkan!</span> Data telah berhasil
      dikosongkan pada database.
    </div>
  </Transition>

  <div class="content-box p-4">
    <button @click="konfirmasiClear" type="button" class="btn btn-red">
      Kosong Data
    </button>

    <Modal :show="modalClear" @close="closeModal">
      <div class="p-6">
        <h2 class="modal-title">
          Apakah yakin data akan dikosongkan?
        </h2>

        <p class="modal-content">
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
</template>