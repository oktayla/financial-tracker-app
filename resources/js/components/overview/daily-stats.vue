<template>
    <div class="h-48">
        <Line :data="data" :options="options" />
    </div>
</template>

<script>
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
} from 'chart.js'
import { Line } from 'vue-chartjs'
import {mapState} from "vuex";

ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
)

export default {
    name: 'DailyStats',
    components: {
        Line
    },
    computed: mapState('auth', ['user']),
    data() {
        return {
            data: {
                labels: [],
                datasets: [
                    {
                        label: 'Income',
                        backgroundColor: '#2ed573',
                        data: []
                    },
                    {
                        label: 'Expense',
                        backgroundColor: '#ff4757',
                        data: []
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                pointBorderColor: '#fff',
                pointRadius: 6,
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        }
    },
    methods: {
        updateChartData() {
            this.data.labels =  Object.keys(this.user.daily_stats);

            const incomeData = this.data.datasets.find(item => item.label === 'Income');
            const expenseData = this.data.datasets.find(item => item.label === 'Expense');

            incomeData.data = Object.values(this.user.daily_stats).map(item => item.total_income);
            expenseData.data = Object.values(this.user.daily_stats).map(item => item.total_expense);
        },
    },
    created() {
        this.updateChartData();
    }
}
</script>
