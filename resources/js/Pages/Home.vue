<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { FwbInput, FwbButton } from 'flowbite-vue';
import AppLayout from "@/Layouts/AppLayout.vue";
import ProductsList from "@/Components/ProductsList.vue";

defineProps({
    entities: Object,
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <AppLayout title="Home">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="mt-16">
                    <ProductsList :entities="entities" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
