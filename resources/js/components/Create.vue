<template>
    <v-dialog
        v-model="dialog"
        width="500"
        dark
    >
        <v-card flat>
            <v-form
                    ref="form"
                    @submit.prevent="create(order)"
            >
                <v-container fluid>
                    <v-row>
                        <v-col
                                cols="12"
                                sm="6"
                        >
                            <v-text-field
                                    v-model="order.product_name"
                                    :rules="nameRules"
                                    color="purple darken-2"
                                    label="Product name"
                                    required
                            ></v-text-field>
                        </v-col>
                        <v-col
                                cols="12"
                                sm="6"
                        >
                            <v-text-field
                                    v-model="order.weight"
                                    color="blue darken-2"
                                    label="Weight"
                                    type="number"
                            ></v-text-field>
                        </v-col>
                        <v-col
                                cols="12"
                                sm="6"
                        >
                            <v-textarea
                                    v-model="order.decription"
                                    color="purple darken-2"
                                    label="Description"
                            ></v-textarea>
                        </v-col>
                        <v-col
                                cols="12"
                                sm="6"
                        >
                            <v-text-field
                                    v-model="order.total_price"
                                    color="blue darken-2"
                                    label="Price"
                                    type="number"
                                    required
                            ></v-text-field>
                        </v-col>
                    </v-row>
                </v-container>
                <v-card-actions>
                    <v-btn
                            text
                            @click="resetForm"
                    >
                        Cancel
                    </v-btn>
                    <v-spacer></v-spacer>
                    <v-btn
                            :disabled="!valid"
                            text
                            color="primary"
                            type="submit"
                    >
                        Create
                    </v-btn>
                </v-card-actions>
            </v-form>
        </v-card>
    </v-dialog>
</template>

<script>
    export default {
        name: "Create",

        props: {
            createDialog: false
        },

        data: () => ({
            order: {
                product_name: '',
                weight: '',
                decription: '',
                total_price: '',
            },
            valid: true,
            nameRules: [
                v => !!v || 'Name is required',
                v => (v && v.length <= 10) || 'Name must be less than 10 characters',
            ],
            priceRules: [
                v => !!v || 'Price is required',
                v => (v && v.length <= 10) || 'Price required',
            ],
        }),

        computed:{
            dialog: {
                get() { return this.createDialog },
            }
        },

        methods: {
            resetForm() {
                this.$emit('close');
                this.$refs.form.reset()
            },
            create(order) {
                this.$store.dispatch('createOrder', order)
                this.$refs.form.reset()
                this.$emit('close');
            }
        }
    }
</script>

<style scoped>

</style>