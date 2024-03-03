<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from '@inertiajs/vue3';

defineProps({
    cart: {
        type: Object,
        default: () => {},
    },
    quantity: {
        type: Number,
        default: 0.00,
    },
    sum: {
        type: Number,
        default: 0.00,
    },
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $t('shop.cart') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <ul v-if="cart">
                        <li v-for="item in cart">
                            <div class="flex flex-wrap items-center">
                                <div class="w-full md:w-1/3 p-4">
                                    <h2 class="font-extrabold text-xl mb-2">{{ item.name }}</h2>
                                    <p class="p-2">{{ item.description }}</p>
                                    <span class="font-extrabold text-lg p-2">{{ item.price }} ₽</span>
                                </div>
                                <div class="w-full md:w-1/3 p-4">
                                    <span class="font-extrabold text-lg">{{ item.quantity }}</span>
                                </div>
                                <div class="w-full md:w-1/3 p-4">
                                    <span class="font-extrabold text-lg">{{ item.sum }} ₽</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div v-else>
                        <span class="block font-extrabold font-2xl p-8">Корзина пуста</span>
                    </div>
                    <hr class="border">
                    <div class="flex flex-wrap items-center justify-end">
                        <div class="w-full md:w-1/3 p-4">
                            <span class="font-extrabold">Итого:</span>
                        </div>
                        <div class="w-full md:w-1/3 p-4">
                            <span class="font-extrabold">{{ quantity }}</span>
                        </div>
                        <div class="w-full md:w-1/3 p-4">
                            <span class="font-extrabold font-lg">{{ sum }} ₽</span>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex justify-end">
                    <Link class="rounded-lg px-3 py-2 bg-blue-700 text-white" as="button" method="post" :href="route('orders.store')">Оформить заказ</Link>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
