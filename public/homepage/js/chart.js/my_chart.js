const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['SANGAT BAIK', 'BURUK', 'SEDANG', 'BAIK'],
        datasets: [{
            label: 'Jumlah Kasus',
            data: [74,350, 431, 258],
            backgroundColor: [
                'rgba(37, 84, 245)',
                'rgba(37, 84, 245)',
                'rgba(37, 84, 245)',                
                'rgba(37, 84, 245)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',                
                'rgba(255, 159, 64, 1)'
            ],
            // borderWidth: 1
        }]
    },
    options: {
        responsive: true, 

    }
});