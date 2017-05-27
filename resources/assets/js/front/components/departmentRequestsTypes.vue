<template>
    <div class="card">
        <div class="card-header">
            <p class="card-header-title">
                Cores
            </p>
        </div>
        <div class="card-content">
            <canvas id="department-colors" width="400" height="200"></canvas>
        </div>
    </div>
</template>
<script>
    import Chart from 'chart.js'
    export default {
        props: ['department'],
        data() {
            return {
                data: [],
                labels: []
            }
        },
        mounted() {
            console.log(this.department);
            axios.get( _api + '/api/departments/colors/' + this.department.id ).then(
                response => {
                    console.log(response.data.labels)
                    this.createChart(response.data.data, response.data.labels)
                }).catch(
                error => {
                    console.log(error)
                })
        },
        methods: {
            createChart(data, labels) {
                var ctx = document.getElementById("department-colors");
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Tipos de pedidos',
                            data: data,
                            backgroundColor: [
                                '#ff6384',
                                '#2b2a31'
                            ],
                            borderWidth: 1
                        }],
                    },
                });
            }
        }
    }
</script>