<template>
    <div class="container mt-5">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-center">Request Analysis</h2>
            </div>

            <!-- Pesan Sukses atau Error -->
            <div v-if="successMessage" class="alert alert-success">
                {{ successMessage }}
            </div>
            <div v-if="errorMessage" class="alert alert-danger">
                {{ errorMessage }}
            </div>
            <div v-if="form.errors.samples" class="alert alert-danger">
                <ul>
                    <li v-for="(error, index) in form.errors.samples" :key="index">{{ error }}</li>
                </ul>
            </div>

            <form @submit.prevent="submitForm">
                <button class="btn btn-primary mb-3" id="addSampleBtn" type="button" @click="addSample">Add Sample</button>

                <table class="table table-bordered" id="sampleTable">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Tipe Sampel</th>
                            <th>Batch/Lot</th>
                            <th>Deskripsi</th>
                            <th>Nama</th>
                            <th>Timestamp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(sample, index) in samples" :key="index">
                            <td><input type="date" class="form-control" v-model="sample.date" required></td>
                            <td>
                                <select class="form-select" v-model="sample.type_sample" required>
                                    <option value="DMT Line 1">DMT Line 1</option>
                                    <option value="DMT Line 2">DMT Line 2</option>
                                    <option value="DMT Line 3">DMT Line 3</option>
                                    <option value="DMT Line 4">DMT Line 4</option>
                                    <option value="DMT Line 5">DMT Line 5</option>
                                    <option value="DMT Line 6">DMT Line 6</option>
                                    <option value="DMT Line 7">DMT Line 7</option>
                                    <option value="DMT Line 8">DMT Line 8</option>
                                    <option value="DMT Mixing">DMT Mixing</option>
                                    <option value="MTS Reaksi akhir">MTS Reaksi akhir</option>
                                    <option value="MTS Settle">MTS Settle</option>
                                    <option value="MTS Drying">MTS Drying</option>
                                    <option value="MTS Filtrasi">MTS Filtrasi</option>
                                    <option value="MTS Sir. storage">MTS Sir. storage</option>
                                    <option value="MTS Drumming">MTS Drumming</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control" v-model="sample.batch_lot" placeholder="Input Batch/Lot" required></td>
                            <td><textarea class="form-control" v-model="sample.description" placeholder="Tambahkan Deskripsi Jika ada"></textarea></td>
                            <td><input type="text" class="form-control" v-model="sample.name" placeholder="Nama operator / Staff" required></td>
                            <td class="timestamp">Auto</td>
                            <td><button type="button" class="btn btn-danger btn-delete" @click="removeSample(index)">Hapus</button></td>
                        </tr>
                    </tbody>
                </table>

                <button type="submit" class="btn btn-success">Send request</button>
            </form>
        </div>
    </div>
</template>


<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

// Deklarasikan variabel successMessage dan errorMessage
const successMessage = ref(null);
const errorMessage = ref(null);

const samples = ref([
    {
        date: '',
        type_sample: '',
        batch_lot: '',
        description: '',
        name: '',
    },
]);

const form = useForm({
    samples: samples.value,
});

const addSample = () => {
    samples.value.push({
        date: '',
        type_sample: '',
        batch_lot: '',
        description: '',
        name: '',
    });
};

const removeSample = (index) => {
    samples.value.splice(index, 1);
};

const submitForm = () => {
    form.post(route('request.analysis.store'), {
        onSuccess: () => {
            successMessage.value = "Request berhasil disimpan!";
            samples.value = [{
                date: '',
                type_sample: '',
                batch_lot: '',
                description: '',
                name: '',
            }]; // Reset form
        },
        onError: (errors) => {
            errorMessage.value = "Terjadi kesalahan saat menyimpan request.";
        }
    });
};
</script>

<style scoped>
.container {
    max-width: 800px;
    margin: 0 auto;
}

.logo img {
    width: 150px;
}
</style>
