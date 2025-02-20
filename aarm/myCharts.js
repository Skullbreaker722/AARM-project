const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ['Active', 'Inactive'],
    datasets: [{
      label: '',
      data: [25, 75],
      borderWidth: 1,
      backgroundColor: ['#7e80e7', '#d2c7ff']
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    },
    responsive: true,
  }
});
const gtx = document.getElementById('CoPg');

new Chart(gtx, {
  type: 'bar',
  data: {
    labels: ['English', 'Math', 'Science'],
    datasets: [{
      label: 'Course Progress',
      data: [80, 20, 40],
      backgroundColor: ['#7e80e7', '#7e80e7', '#7e80e7'],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    },
    responsive: true,
    indexAxis: 'y',
  }
});
const rtx = document.getElementById('weekly');
new Chart(rtx, {
  type: 'line',
  data: {
    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'], // 7 days
    datasets: [{
      label: 'Active Minutes',
      data: [10, 60, 30, 40, 50, 25, 5], // Example data for each day
      borderColor: '#7e80e7',
      backgroundColor: 'rgba(126, 128, 231, 0.2)',
      borderWidth: 2,
      tension: 0.3, // Smooth curves
      fill: true,
      pointBackgroundColor: '#7e80e7'
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
        ticks: {
          stepSize: 7.5 // Scale of 15-minute intervals
        },
        title: {
          display: true,
          text: 'Minutes'
        }
      }
    },
    responsive: true,
    plugins: {
      legend: {
        display: true,
        position: 'top'
      }
    }
  }
});
