// import { defineStore } from "pinia";

// export type Product = {
//     id: number;
//     name: string;
//     price: number;
//     image: string;
//     quantity: number;
// };

// export const useCartStore = defineStore("cart", {
//     state: () => ({ cart: [] as Product[] }),
//     getters: {
//         subtotal: (state) => {
//             let total = 0;
//             state.cart.forEach((product) => {
//                 total += product.price * product.quantity;
//             });
//             return total;
//         },
//     },
//     actions: {
//         addToCart(product: Product) {
//             if (!this.cart.some((prod) => prod.id === product.id)) {
//                 this.cart.push({
//                     id: product.id,
//                     name: product.name,
//                     price: product.price,
//                     image: product.image,
//                     quantity: 1,
//                 });
//             } else {
//                 this.cart.forEach((prod) => {
//                     if (prod["id"] === product.id) {
//                         prod["quantity"] += 1;
//                     }
//                 });
//             }
//         },
//         increment(productId: number) {
//             this.cart.forEach((prod) => {
//                 if (prod["id"] === productId) {
//                     prod["quantity"]++;
//                 }
//             });
//         },
//         decrement(productId: number) {
//             let quantity = -1;

//             this.cart.forEach((prod) => {
//                 if (prod["id"] === productId) {
//                     prod["quantity"]--;
//                     quantity = prod["quantity"];
//                 }
//             });

//             console.log(quantity);
//             if (quantity === 0) {
//                 this.cart = this.cart.filter(
//                     (prod) => prod["id"] !== productId,
//                 );
//             }
//             // console.log(this.cart);
//         },
//         removeFromCart(productId: number) {
//             // console.log(productId);

//             this.cart = this.cart.filter((prod) => prod.id !== productId);
//             //             const updatedProducts = this.cart.filter((product) => product.id !== productId);
//             //             this.cart = updatedProducts

//             // console.log(updatedProducts);
//         },
//     },
// });

import { defineStore } from "pinia";

export type Product = {
    id: number;
    name: string;
    price: number;
    image: string;
    quantity: number;
};

export const useCartStore = defineStore("cart", {
    state: () => ({ cart: [] as Product[] }),
    getters: {
        subtotal: (state) => {
            return state.cart.reduce(
                (total, product) => total + product.price * product.quantity,
                0,
            );
        },
    },
    actions: {
        addToCart(product: Product) {
            const existingProduct = this.cart.find(
                (prod) => prod.id === product.id,
            );
            
            if (existingProduct) {
                existingProduct.quantity++;
            } else {
                this.cart.push({
                    id: product.id,
                    name: product.name,
                    price: product.price,
                    image: product.image,
                    quantity: 1,
                });
            }
        },
        increment(productId: number) {
            const product = this.cart.find((prod) => prod.id === productId);

            if (product) {
                product.quantity++;
            }
        },
        decrement(productId: number) {
            const product = this.cart.find((prod) => prod.id === productId);

            if (product) {
                product.quantity--;
                if (product.quantity === 0) {
                    this.removeFromCart(productId);
                }
            }
        },
        removeFromCart(productId: number) {
            this.cart = this.cart.filter((prod) => prod.id !== productId);
        },
    },
});
