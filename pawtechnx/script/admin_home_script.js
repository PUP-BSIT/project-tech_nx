document.addEventListener('DOMContentLoaded', function() {
    const monthlyData = {
      summary: {
        text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam hendrerit ultrices ornare.",
        chartData: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
          values: [65, 59, 80, 81, 56, 55] 
        }
      }
    };
  
    function updateMonthlyRecap(data) {
      const summaryText = document.querySelector('.monthly-recap .summary p');
      const chartCanvas = document.getElementById('monthlyChart');
  
      summaryText.textContent = data.summary.text;
  
      const ctx = chartCanvas.getContext('2d');
      const monthlyChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: data.summary.chartData.labels,
          datasets: [{
            label: 'Monthly Data',
            data: data.summary.chartData.values,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    }
  
    updateMonthlyRecap(monthlyData);
  
    const updateButton = document.getElementById('updateButton');
    updateButton.addEventListener('click', function() {
      monthlyData.summary.text = "Updated summary text.";
      monthlyData.summary.chartData.values = [70, 65, 75, 70, 60, 58];
      updateMonthlyRecap(monthlyData);
    });
  });
  