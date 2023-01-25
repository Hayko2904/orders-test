<template>
    <v-btn
            @click="() => dialog = true"
            color="lighten-2"
            dark
            v-bind="attrs"
            v-on="on"
    >Create Order</v-btn>
    <v-row>
        <v-col
                cols="2"
                sm="2"
        >
            <v-text-field
                    v-model="filterName"
                    @keypress="getFilterName"
                    color="purple darken-2"
                    label="Product name"
            ></v-text-field>
        </v-col>
        <v-col
                cols="2"
                sm="2"
        >
            <v-text-field
                    v-model="filterPrice"
                    @keydown="getFilterPrice"
                    color="purple darken-2"
                    label="Price"
            ></v-text-field>
        </v-col>
    </v-row>
    <v-table theme="light">
        <thead>
        <tr>
            <th class="text-left">
                Name
            </th>
            <th class="text-left">
                Weight
            </th>
            <th class="text-left">
                Decription
            </th>
            <th class="text-left">
                Price
            </th>
            <th class="text-left">
                Created at
            </th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="order in orders.data">
            <td>{{order.product_name}}</td>
            <td>{{order.weight}}</td>
            <td>{{order.decription}}</td>
            <td>{{order.total_price}}</td>
            <td>{{order.created_at}}</td>
            <td>
                <v-btn @click="editOrder(order)">Edit</v-btn>
                <v-btn @click="deletePost(order)">Delete</v-btn>
            </td>
        </tr>
        </tbody>
    </v-table>
    <div class="text-center">
        <v-pagination
                v-model="page"
                @click="getPaginateRes"
                :length="Math.round(this.orders.total / 2)"
                circle
        ></v-pagination>
    </div>
    <Create
        :create-dialog="dialog"
        @close="() => dialog = false"
    />
    <Edit
        :edit-dialog="editDialog"
        :order="editOrderData"
        @close="() => editDialog = false"
    />
</template>

<script>
    import { mapGetters } from 'vuex'
    import Create from './Create.vue'
    import Edit from './Edit.vue'

    export default {
        name: "Orders",

        components: {
            Edit,
            Create
        },

        data: () => ({
            dialog: false,
            editDialog: false,
            editOrderData: {},

            page: 1,
            filterPrice: null,
            filterName: null
        }),

        mounted() {
            this.$store.dispatch('fetchOrders', this.page)
        },

        methods: {
            getPaginateRes() {
                this.$store.dispatch('fetchOrders', this.page)
            },
            getFilterName() {
                this.$store.dispatch('fetchOrdersFilterName', this.filterName)
            },
            getFilterPrice() {
                this.$store.dispatch('fetchOrdersFilterPrice', this.filterPrice)
            },
            editOrder(order) {
                this.editDialog = true
                this.editOrderData = {...order}
            },
            deletePost(order) {
                this.$store.dispatch('deleteOrder', order)
            }
        },

        computed: {
            ...mapGetters([
                'orders'
            ])
        }
    }
</script>

<style scoped>

</style>