<script setup>
import ProductsListItem from "@/Components/ProductsListItem.vue";

const props = defineProps({
    entities: Object,
});
</script>

<template>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
        <template v-for="entity in entities.data">
            <ProductsListItem :entity="entity" />
        </template>
    </div>
</template>
