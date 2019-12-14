<template>
    <div>
        <button @click="addToCart" type="button" class="btn btn-primary">Add to Cart</button>
        <p class="text-green-600">{{message}}</p>
    </div>
</template>

<script>
export default {
    props: [
        'productId'
    ],
    data() {
        return {
            message: ''
        }
    },
    mounted() {
    },
    methods: {
        addToCart() {
            axios
                .get(`/cart/${this.productId}`)
                .then(({data}) => {
                    let product = data.data
                    this.message = `successfully added ${product.name}`;
                });
        }
    }
}
</script>

<style scoped>

</style>
