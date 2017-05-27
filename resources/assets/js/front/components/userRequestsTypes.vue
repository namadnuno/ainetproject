<template>
    <div class="card">
        <div class="card-header">
            <p class="card-header-title">
                Cores
            </p>
        </div>
        <div class="card-content">
            <canvas id="user-colors" width="400" height="200"></canvas>
        </div>
    </div>
</template>
<script>
    import Chart from 'chart.js'
    export default {
        props: ['user'],
        data() {
            return {
                data: [],
                labels: []
            }
        },
        mounted() {
            console.log(this.user);
            axios.get( _api + '/api/users/' + this.user.id + '/colors/').then(
                response => {
                    this.createChart(response.data.data, response.data.labels)
                }).catch(
                error => {
                    console.log(error)
                })
        },
        methods: {
            createChart(data, labels) {
                var ctx = document.getElementById("user-colors");
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