<template>
    <div class="card">
        <div class="card-header">
            <p class="card-header-title">
                Progresso
            </p>
        </div>
        <div class="card-content">
            <canvas id="week-prints" width="400" height="200"></canvas>
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
            axios.get( _api + '/api/users/'+ this.user.id +'/requests').then(
                response => {
                    this.createChart(response.data.data, response.data.labels)
                }).catch(
                error => {
                    console.log(error)
                })
        },
        methods: {
            createChart(data, labels) {
                var ctx = document.getElementById("week-prints");
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: '# Pedidos',
                            data: data,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            }
        }
    }
</script>