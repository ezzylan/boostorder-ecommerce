<script setup lang="ts">
import { useCartStore } from "@/store";
import { Link } from "@inertiajs/vue3";
import { Trash2 } from "lucide-vue-next";

const cart = useCartStore().cart;
</script>

<template>
    <div class="drawer-side">
        <label
            for="cart-drawer"
            aria-label="close sidebar"
            class="drawer-overlay"
        ></label>
        <div
            class="menu min-h-full min-w-96 max-w-[500px] bg-base-200 p-4 text-base-content"
        >
            <div class="flex items-center justify-between">
                <p></p>
                <h1 class="text-xl font-bold">CART</h1>
                <label for="cart-drawer" class="btn btn-square btn-ghost">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </label>
            </div>

            <div class="divider"></div>

            <div v-if="cart.length > 0">
                <div class="flex max-h-[40rem] flex-col gap-6 overflow-auto">
                    <div v-for="product in cart" :key="product.id">
                        <div class="card card-side bg-base-100 shadow-xl">
                            <figure>
                                <img :src="product.image" :alt="product.name" />
                            </figure>
                            <div class="card-body">
                                <h2 class="card-title">{{ product.name }}</h2>
                                <p>${{ product.price }}</p>
                                <!-- <button
                                    class="btn btn-square btn-error"
                                    @click="
                                        useCartStore().removeFromCart(
                                            product.id,
                                        )
                                    "
                                >
                                    <Trash2 />
                                </button> -->
                                <div class="card-actions justify-end">
                                    <div class="join">
                                        <button
                                            class="btn join-item btn-neutral btn-sm"
                                            @click="
                                                useCartStore().decrement(
                                                    product.id,
                                                )
                                            "
                                        >
                                            −
                                        </button>
                                        <button
                                            class="btn join-item no-animation btn-sm"
                                        >
                                            {{ product.quantity }}
                                        </button>
                                        <button
                                            class="btn join-item btn-neutral btn-sm"
                                            @click="
                                                useCartStore().increment(
                                                    product.id,
                                                )
                                            "
                                        >
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="divider"></div>

                <div class="flex justify-between font-bold">
                    <p>SUBTOTAL ({{ cart.length }} ITEMS)</p>
                    <p>${{ useCartStore().subtotal }}</p>
                </div>
                <Link
                    href="/orderProducts"
                    method="post"
                    :data="{ cart }"
                    as="button"
                    class="btn btn-primary btn-block fixed bottom-4 mx-auto"
                    @click="useCartStore().$reset()"
                >
                    CHECKOUT</Link
                >
            </div>
            <h2 v-else class="text-center text-lg font-bold">
                YOUR CART IS EMPTY
            </h2>
        </div>
    </div>
</template>
