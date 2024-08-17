<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import RequestAnalysis from '@/Pages/RequestAnalysis/Create.vue';

// Props yang diterima dari backend (Laravel)
const props = defineProps({
    requestAnalysisUrl: String,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <!-- Header dengan logo dan judul dashboard -->
            <div class="flex items-center">
                <!-- Judul Dashboard -->
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
            </div>
        </template>

        <!-- Konten utama dashboard -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Pesan setelah login -->
                        You're logged in!

                        <!-- Tambahkan form Request Analysis -->
                        <div class="mt-6">
                            <RequestAnalysis />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>