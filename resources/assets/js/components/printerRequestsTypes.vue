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
        props: ['printer'],
        data() {
            return {
                data: [],
                labels: []
            }
        },
        mounted() {
            console.log(this.printer.id)
            axios.get( _api + '/api/printers/'+ this.printer.id +'/requests').then(
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
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Cores',
                            data: data,
                            backgroundColor: [
                                '#ff6384',
                                '#2b2a31'
                            ],
                            borderWidth: 1
                        }]
                    }
                });
            }
        }
    }
</script>