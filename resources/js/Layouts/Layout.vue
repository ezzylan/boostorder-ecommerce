<script setup lang="ts">
import Cart from "@/Components/Cart.vue";
import { useCartStore } from "@/store";
import { Link } from "@inertiajs/vue3";

const cart = useCartStore().cart;
</script>

<template>
    <div class="drawer drawer-end">
        <input id="cart-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <div class="flex min-h-screen flex-col">
                <div class="container mx-auto flex-grow px-4">
                    <div class="navbar bg-base-100">
                        <div class="navbar-start">
                            <Link href="/" class="btn btn-ghost text-xl"
                                >PRIME</Link
                            >
                        </div>

                        <div class="navbar-end">
                            <label
                                tabindex="0"
                                role="button"
                                class="btn btn-circle btn-ghost"
                                for="cart-drawer"
                            >
                                <div class="indicator">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                        />
                                    </svg>
                                    <span
                                        v-if="cart.length > 0"
                                        class="badge indicator-item badge-primary badge-sm"
                                        >{{ cart.length }}</span
                                    >
                                </div>
                            </label>
                            <div class="dropdown dropdown-end">
                                <div
                                    tabindex="0"
                                    role="button"
                                    class="avatar btn btn-circle btn-ghost"
                                >
                                    <div class="w-10 rounded-full">
                                        <img
                                            alt="Tailwind CSS Navbar component"
                                            src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg"
                                        />
                                    </div>
                                </div>
                                <ul
                                    tabindex="0"
                                    class="menu dropdown-content menu-sm z-[1] mt-3 w-32 rounded-box bg-base-100 p-2 shadow"
                                >
                                    <!-- <li>
                                        <Link :href="route('profile.edit')"
                                            >Profile</Link
                                        >
                                    </li>
                                    <li>
                                        <Link
                                            :href="route('logout')"
                                            method="post"
                                            as="button"
                                            >Logout</Link
                                        >
                                    </li> -->
                                    <li>
                                        <Link
                                            :href="route('order.index')"
                                            as="button"
                                            >My Orders</Link
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <main class="py-8">
                        <slot />
                    </main>
                </div>

                <footer
                    class="footer footer-center bg-base-300 p-4 font-bold text-base-content"
                >
                    <aside>
                        <p>© 2024 Prime Hydration</p>
                    </aside>
                </footer>
            </div>
        </div>
        <Cart />
    </div>
</template>
