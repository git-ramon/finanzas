

    const ctx = document.getElementById('myChart');
    var barColors = ["#00a65a", "#00c0ef","#dd4b39","#f39c12"];
    var title = ['Abonos', 'Añadir Depositos', 'Retiros', 'Añadir Retiros']
    var yValues = [20, 31, 44, 24];

    new Chart(ctx, {
        type: 'bar',
        data: {
        labels: ['Abonos', 'Añadir Depositos', 'Retiros', 'Añadir Retiros'],
        datasets: [{
            data: yValues,
            label: 'Abonos',
           /* borderWidth: 1,*/
            borderColor: barColors,
            backgroundColor: barColors,
            },]
        },
        options: {
            plugins: {
              legend: {
                display: false
              },
            }
        }
    });

    /*retiros: #dd4b39
    abonos: #00a65a !important
    anadir retiros; #f39c12 !important
    anadir abonos: #00c0ef !important*/
