<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import {FwbInput} from "flowbite-vue";

const props = defineProps({
    entity: Object,
});

const quantity = ref(1);
</script>

<template>
    <div class="h-full flex-col">
        <div>
            <div>
                <img :src="`https://loremflickr.com/640/360/store?random=${entity.id}`" alt="Product image">
            </div>
            <span class="block text-xl font-extrabold mt-2">{{ entity.price }} ₽</span>
            <h2 class="text-xl font-bold mt-2">{{ entity.name }}</h2>
            <p>{{ entity.description }}</p>
        </div>
        <div class="product_add_to_cart">
            <div class="flex flex-wrap justify-between items-center">
                <div class="w-1/4 product_add_to_cart__quantity">
                    <span>
                        <fwb-input v-model.number="quantity" min="1" type="number" size="sm" />
                    </span>
                </div>
                <div class="w-3/4 product_add_to_cart__button">
                    <form class="product__add-to-cart-form ml-4">
                        <Link class="rounded-lg bg-blue-500 text-white px-3 py-2 inline-flex items-center" :href="route('cart.add')" method="post" :data="{ entity_id: entity.id, quantity: quantity }" as="button" type="button">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                            <span class="ml-4">{{ $t('shop.add_to_cart') }}</span>
                        </Link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
