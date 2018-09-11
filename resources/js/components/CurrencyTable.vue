<template>
    <div class="row">

        <div class="col-10">
            <div class="card">
                <div class="card-body" style="overflow-y: scroll; height:440px">

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Имя</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Количество</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-if="currency"
                            v-for="(item, i) in show">
                            <td>{{ currency[i].name }}</td>
                            <td>{{ currency[i].price.amount.toFixed(2) }}</td>
                            <td>{{ currency[i].volume }}</td>
                        </tr>
                        <tr v-if="!currency">
                            <td>Loading...</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-2">
            <div class="card">
                <div class="card-body">
                    <div class="btn-group">
                    <button :disabled="isLoading"
                            @click="fetchCurrency"
                            class="btn btn-sm btn-secondary">
                        Update
                    </button>

                    <button @click="show += 10"
                            class="btn btn-primary">
                        Load more..
                    </button>
                    </div>

                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import axios from 'axios'

    const fetchUrl = `/api/currency`;

    export default {
        name: "CurrencyTable",
        data() {
            return {
                isLoading: false,
                currency: null,
                show: 10,
            }
        },
        mounted() {
            this.fetchCurrency();
            setInterval(() => {
                this.fetchCurrency();
            }, 15000)
        },
        methods: {
            async fetchCurrency() {
                this.isLoading = true;
                const response = await axios.get(fetchUrl);
                this.currency = response.data.stock;
                this.isLoading = false;
            }
        }
    }
</script>

<style scoped>
    td {
        height: 50px;
    }
</style>