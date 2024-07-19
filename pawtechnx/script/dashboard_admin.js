document.getElementById('hamburgerMenu').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    sidebar.style.display = sidebar.style.display === 'none' ? 'block' : 'none';
});

document.getElementById('searchInput').addEventListener('input', function() {
    const searchValue = this.value.toLowerCase();
    const tableRows = document.querySelectorAll('#scheduleTable tbody tr');
    tableRows.forEach(row => {
        const cells = row.getElementsByTagName('td');
        let match = false;
        for (let i = 0; i < cells.length; i++) {
            if (cells[i].textContent.toLowerCase().includes(searchValue)) {
                match = true;
                break;
            }
        }
        row.style.display = match ? '' : 'none';
    });
});

fetch('../php/monthly_chart.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        console.log('Data received:', data); // Add this line for debugging

        const labels = [
            'January', 'February', 'March', 'April', 'May', 'June', 
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        const values = new Array(12).fill(0); 

        data.forEach(item => {
            const monthName = item.month;
            const monthIndex = labels.indexOf(monthName);
            if (monthIndex !== -1) {
                values[monthIndex] = parseInt(item.count, 10);
            }
        });

        console.log('Labels:', labels); // Add this line for debugging
        console.log('Values:', values); // Add this line for debugging

        const ctx = document.getElementById('adoptedSpeciesChart').getContext('2d');
        new Chart(ctx, {
            type: 'scatter',
            data: {
                datasets: [{
                    label: 'Species Adopted',
                    data: labels.map((label, index) => ({
                        x: index, // X-axis: Month index
                        y: values[index] // Y-axis: Count of species
                    })),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    showLine: true // This will connect the dots with lines if you want a line graph appearance
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        },
                        ticks: {
                            callback: function(value, index, values) {
                                return labels[value]; // Display month names on the x-axis
                            }
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Number of Species'
                        },
                        beginAtZero: true,
                        ticks: {
                            stepSize: 10
                        }
                    }
                }
            }
        });
    })
    .catch(error => {
        console.error('Error fetching chart data:', error.message);
        console.error('Stack trace:', error.stack);
    });