<script setup lang="ts">
import Layout from "@/Layouts/Layout.vue";
import { useCartStore } from "@/store";
import { useForm } from "@inertiajs/vue3";
import { Product } from "@/store";
import { ref } from "vue";

defineProps<{ products: Product[]; searchWord: string }>();

const cart = useCartStore();
const searchForm = useForm({ product: null });
const isHidden = ref(true);

function addToCart(product: Product) {
    cart.addToCart(product);
    isHidden.value = false;

    setTimeout(() => {
        isHidden.value = true;
    }, 2000);
}
</script>

<template>
    <Layout>
        <div class="flex items-center justify-between pb-4">
            <h1 class="pb-4 text-2xl font-bold">
                <span v-if="searchWord"> Searching for {{ searchWord }}: </span>
                <span v-else>All Products</span>
            </h1>

            <form class="flex-end" @submit.prevent="searchForm.get('/')">
                <label class="input input-bordered flex items-center gap-2">
                    <input
                        name="search"
                        type="text"
                        class="input px-0"
                        placeholder="Search products..."
                        v-model="searchForm.product"
                    />
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 16 16"
                        fill="currentColor"
                        class="h-4 w-4 opacity-70"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </label>
            </form>
        </div>
        <div
            class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5"
        >
            <div v-for="product in products" :key="product.id">
                <div class="card bg-base-100 shadow-xl">
                    <figure class="pt-4">
                        <img :src="product.image" :alt="product.name" />
                    </figure>
                    <div class="card-body items-center text-center">
                        <h2 class="card-title">{{ product.name }}</h2>
                        <p>12PK / ${{ product.price }}</p>
                        <div class="card-actions">
                            <button
                                class="btn btn-primary"
                                @click="addToCart(product)"
                            >
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="toast" :class="{ hidden: isHidden }">
            <div class="alert alert-success">
                <span>Added to cart 👍🏻</span>
            </div>
        </div>
    </Layout>
</template>
