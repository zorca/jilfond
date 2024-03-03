<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    entities: Object,
});
</script>

<template>
    <div>
        <template v-for="entity in entities.data">
            <div class="border p-8 mb-4 bg-white">
                <h2 class="font-bold font-2xl">Номер заказа: {{ entity.id }}</h2>
                <span class="font-bold font-xl">Дата заказа: {{ new Date(entity.created_at).toLocaleDateString('ru-ru', { weekday:"long", year:"numeric", month:"short", day:"numeric"}) }}</span>
                <ul>
                    <li v-for="item in entity.items">{{ item.name }} ({{ item.quantity }}), </li>
                </ul>
                <span class="font-bold font-2xl">Сумма заказа: {{ entity.sum }} ₽</span>
            </div>
        </template>

        <div class="mt-8">
            <div class="flex justify-between">
                <!-- Previous Button -->
                <Link :href="entities.prev_page_url" class="flex items-center justify-center px-4 h-10 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Пред.
                </Link>

                <!-- Next Button -->
                <Link :href="entities.next_page_url" class="flex items-center justify-center px-4 h-10 ms-3 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    След.
                </Link>
            </div>
        </div>
    </div>
</template>
