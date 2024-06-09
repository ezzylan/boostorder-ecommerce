<script setup lang="ts">
import Layout from "@/Layouts/Layout.vue";
import { Link } from "@inertiajs/vue3";

export type Order = {
    id: number;
    status: string;
    total_price: number;
    created_at: Date;
};

defineProps<{ orders: Order[] }>();
</script>

<template>
    <Layout>
        <h1 class="pb-4 text-2xl font-bold">Orders</h1>
        <div v-if="orders.length > 0" class="flex flex-col gap-6">
            <div v-for="order in orders" :key="order.id">
                <Link :href="`/orders/${order.id}`">
                    <div class="card bg-base-100 shadow-xl hover:bg-base-200">
                        <div
                            class="flex flex-row items-center justify-between p-8"
                        >
                            <div class="flex items-center gap-2">
                                <h2 class="card-title">
                                    Order #{{ order.id }}
                                </h2>
                                <p>(Total Price: ${{ order.total_price }})</p>
                            </div>
                            <div
                                class="badge"
                                :class="{
                                    'badge-info': order.status === 'To Ship',
                                    'badge-warning':
                                        order.status === 'To Receive',
                                    'badge-success':
                                        order.status === 'Completed',
                                    'badge-error': order.status === 'Cancelled',
                                }"
                            >
                                {{ order.status }}
                            </div>
                        </div>
                    </div>
                </Link>
            </div>
        </div>
        <h1 v-else>
            You have no orders at the moment. Go back to the home page to
            purchase products.
        </h1>
    </Layout>
</template>
