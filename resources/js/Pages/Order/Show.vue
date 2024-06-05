<script setup lang="ts">
import Layout from "@/Layouts/Layout.vue";
import { Link } from "@inertiajs/vue3";
import { Order } from "@/Pages/Order/Index.vue";
import { Product } from "@/store";

defineProps<{ order: Order; products: Product[] }>();
const statuses = ["To Ship", "To Receive", "Completed", "Cancelled"];
</script>

<template>
    <Layout>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><Link href="/orders">Orders</Link></li>
                <li>Order #{{ order.id }}</li>
            </ul>
        </div>
        <div class="flex justify-between">
            <h1 class="pb-4 text-2xl font-bold">Order #{{ order.id }}</h1>

            <div class="flex items-center gap-2">
                <p class="font-bold">Status:</p>
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn m-1">
                        {{ order.status }}
                    </div>
                    <ul
                        tabindex="0"
                        class="menu dropdown-content z-[1] rounded-box bg-base-100 p-2 shadow"
                    >
                        <div v-for="status in statuses" :key="status">
                            <li>
                                <Link
                                    :href="`/orders/${order.id}`"
                                    method="post"
                                    as="button"
                                    :data="{ status }"
                                    >{{ status }}</Link
                                >
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
            <div v-for="product in products" :key="product.id">
                <div class="card bg-base-100 shadow-xl">
                    <figure class="pt-4">
                        <img :src="product.image" :alt="product.name" />
                    </figure>
                    <div class="card-body items-center text-center">
                        <h2 class="card-title">{{ product.name }}</h2>
                        <p>12PK / ${{ product.price }}</p>
                        <p>Quantity: {{ product.quantity }}</p>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
