<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import OrdersList from "@/Components/OrdersList.vue";

defineProps({
    entities: Object,
    sum: String,
});
</script>

<template>
    <AppLayout title="Home">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $t('shop.orders') }}
            </h2>
        </template>

        <div class="relative sm:flex sm:justify-center sm:items-center bg-gray-100 dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div>
                    <span class="font-bold text-2xl mb-4">Общая стоимость всех заказов: {{ sum }} ₽</span>
                </div>
                <div>
                    <OrdersList :entities="entities" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
