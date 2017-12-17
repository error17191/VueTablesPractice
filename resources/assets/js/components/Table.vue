<template>
    <div class="data-table">
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th v-for="column in columns" @click="orderBy(column.name)"
                    :class="column.size + ' sort-th'">
                        {{column.title || column.name || column}}
                    <button v-if="orderColumn == column.name" type="button" class="btn btn-primary btn-circle ">
                        <i :class="{'fa':true,'fa-arrow-up':orderType == 'asc','fa-arrow-down' : orderType == 'desc'}"></i>
                    </button>
                </th>
            </tr>
            </thead>
            <tbody>
            <h1 class="text-center" v-if="loading">Now Loading</h1>
            <tr v-for="record in records">
                <td v-for="column in columns">{{record[column.name]}}</td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
    export default {
        props: ['columns', 'url'],
        data() {
            return {
                records: [],
                loading: true,
                searchToken: null,
                orderColumn: null,
                orderType: null,
            }
        },
        mounted() {
            axios.get(this.url).then(response => {
                this.records = response.data.data;
                this.loading = false;
            });
        },
        methods: {
            orderBy(columnName) {
                this.loading = true;
                if(columnName == this.orderColumn){
                    this.orderType = this.orderType == 'asc' ? 'desc' : 'asc';
                }else{
                    this.orderColumn = columnName;
                    this.orderType = 'asc';
                }
                let url = this.url + `?orderBy=${this.orderColumn}&orderType=${this.orderType}`;
                axios.get(url).then(response => {
                    this.records = response.data.data;
                    this.loading = false;
                });
            }
        }
    }
</script>
<style lang="scss">
    @media (max-width: 767px) {
        .data-table > .table > thead > tr > th, .data-table > .table > tbody > tr > th, .data-table > .table > tfoot > tr > th, .data-table > .table > thead > tr > td, .data-table > .table > tbody > tr > td, .data-table > .table > tfoot > tr > td {
            white-space: pre-wrap;
        }
    }

    @media (min-width: 768px) {
        .data-table {
            width: 100%;
            margin-bottom: 15px;
            overflow-x: scroll;
            overflow-y: hidden;
        }

        th span {
            line-height: 2;
        }

        .large-text p {
            min-width: 120px;
            font-size: 15px;

        }

    }

    .large-text {
        min-width: 30em;
        /* height: 43px; */
    }

    .sort-th {
        cursor: pointer;
    }

    .sort-th:hover {
        background-color: #f4f3f3;
    }

    thead {
        color: #19b5ff;
        font-size: 15px;
        text-transform: capitalize;
    }

    .table > thead > tr > td.success,
    .table > tbody > tr > td.success,
    .table > tfoot > tr > td.success,
    .table > thead > tr > th.success,
    .table > tbody > tr > th.success,
    .table > tfoot > tr > th.success,
    .table > thead > tr.success > td,
    .table > tbody > tr.success > td,
    .table > tfoot > tr.success > td,
    .table > thead > tr.success > th,
    .table > tbody > tr.success > th,
    .table > tfoot > tr.success > th {
        background-color: #c8f9c5;
    }

    .table > thead > tr > td.info,
    .table > tbody > tr > td.info,
    .table > tfoot > tr > td.info,
    .table > thead > tr > th.info,
    .table > tbody > tr > th.info,
    .table > tfoot > tr > th.info,
    .table > thead > tr.info > td,
    .table > tbody > tr.info > td,
    .table > tfoot > tr.info > td,
    .table > thead > tr.info > th,
    .table > tbody > tr.info > th,
    .table > tfoot > tr.info > th {
        background-color: #dcf1ff;
    }

    .table > thead > tr > td.warning,
    .table > tbody > tr > td.warning,
    .table > tfoot > tr > td.warning,
    .table > thead > tr > th.warning,
    .table > tbody > tr > th.warning,
    .table > tfoot > tr > th.warning,
    .table > thead > tr.warning > td,
    .table > tbody > tr.warning > td,
    .table > tfoot > tr.warning > td,
    .table > thead > tr.warning > th,
    .table > tbody > tr.warning > th,
    .table > tfoot > tr.warning > th {
        background-color: #fff1c8;
    }

    .table > thead > tr > td.danger,
    .table > tbody > tr > td.danger,
    .table > tfoot > tr > td.danger,
    .table > thead > tr > th.danger,
    .table > tbody > tr > th.danger,
    .table > tfoot > tr > th.danger,
    .table > thead > tr.danger > td,
    .table > tbody > tr.danger > td,
    .table > tfoot > tr.danger > td,
    .table > thead > tr.danger > th,
    .table > tbody > tr.danger > th,
    .table > tfoot > tr.danger > th {
        background-color: #ffcece;
    }

    .table-striped > tbody > tr td:last-child {
        max-width: 40px;
    }

    .table-striped > tbody > tr td:first-child p {
        width: 100%;
    }

    .table-striped > tbody > tr td:first-child {
        width: 1em !important;
        min-width: 1em !important;
        /* overflow: hidden; */
    }

    .medium {
        min-width: 11em;
    }

    .small {
        min-width: 2em;
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        padding: 6px 0;
        border-radius: 15px;
        text-align: center;
        font-size: 12px;
        line-height: 1.428571429;
    }

    .btn-circle.btn-lg {
        width: 50px;
        height: 50px;
        padding: 10px 16px;
        border-radius: 25px;
        font-size: 18px;
        line-height: 1.33;
    }

    .btn-circle.btn-xl {
        width: 70px;
        height: 70px;
        padding: 10px 16px;
        border-radius: 35px;
        font-size: 24px;
        line-height: 1.33;
    }


</style>