
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

async function drawChart() {
  // Fetch data from server
  const response = await fetch('/data');
  const jsonData = await response.json();

  // Transform data into the format Google Charts expects
  const data = new google.visualization.DataTable();
  data.addColumn('number', 'Price');
  data.addColumn('number', 'Size');
  jsonData.forEach(row => data.addRow([row.price, row.size]));

  // Set Options
  const options = {
    title: 'House Prices vs Size',
    hAxis: {title: 'Square Meters'},
    vAxis: {title: 'Price in Millions'},
    legend: 'none'
  };

  // Draw Chart
  const chart = new google.visualization.LineChart(document.getElementById('myChart'));
  chart.draw(data, options);
}


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
  
let create=document.querySelector("#create");
let model=document.querySelector("#create-client");
let close=document.querySelector("#close");
let save = document.querySelector("#save");

create.addEventListener("click", () => {
    model.style.display = "flex";
})

close.addEventListener("click", () => {
    model.style.display = "none";
})

 save.addEventListener("click",async() => {
try {
  let name = document.querySelector("#name").value;
  let id = document.querySelector("#id").value;
  let date = document.querySelector("#date").value;
  let type = document.querySelector("#type").value;
  let status = document.querySelector("#status").value;
  const res=await fetch("php/admin_homepage.php", {
      method: "POST",
      body: JSON.stringify({"name": name, "id": id, "date": date, 
        "type": type, "status": status}),
      headers: {
          "Content-Type": "appliaction/json"
      }
  });
  const output = await res.json();

  if (output.success){
    alert(output.message);
    name = "";
    id = "";
    date = "";
    type = "";
    status = "";
    model.style.display = "none";
  } else {
    alert(output.message);
  }
  console.log(output)
} catch (error) {
      console.log("error " + error.message)
}
});