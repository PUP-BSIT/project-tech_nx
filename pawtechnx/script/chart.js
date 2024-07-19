document.addEventListener('DOMContentLoaded', function() {
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
        drawSpeciesCountChart();
        drawAdoptedSpeciesChart();
        drawAvailablePetsChart();
        drawOnlineChoicesChart();
        drawAdoptionStatusChart();
        drawScheduleStatusChart();
        
        setInterval(drawSpeciesCountChart, 30000);
        setInterval(drawAdoptedSpeciesChart, 30000);
        setInterval(drawAvailablePetsChart, 30000);
        setInterval(drawOnlineChoicesChart, 30000);
        setInterval(drawAdoptionStatusChart, 30000);
        setInterval(drawScheduleStatusChart, 30000);
    }

    function drawSpeciesCountChart() {
        fetch('../php/chart.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(jsonData => {
                if (!Array.isArray(jsonData) || jsonData.length === 0) {
                    document.getElementById('pie_chart').innerText = 'No data available for this month';
                    return;
                }

                let dataTable = new google.visualization.DataTable();
                dataTable.addColumn('string', 'Species');
                dataTable.addColumn('number', 'Count');

                jsonData.forEach(row => dataTable.addRow([row.Species, parseInt(row.count)]));

                let options = {
                    title: 'Number of Species Added This Month',
                    pieHole: 0.4,
                    legend: { position: 'bottom' }
                };

                let chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
                chart.draw(dataTable, options);
            })
            .catch(error => {
                console.error('Fetch error:', error);
                document.getElementById('pie_chart').innerText = 'Error fetching data';
            });
    }

    function drawAdoptedSpeciesChart() {
        fetch('../php/species_availability.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(jsonData => {
                if (!Array.isArray(jsonData) || jsonData.length === 0) {
                    document.getElementById('adopted_species_chart').innerText = 'No adopted species data available for this month';
                    return;
                }

                let dataTable = new google.visualization.DataTable();
                dataTable.addColumn('string', 'Species');
                dataTable.addColumn('number', 'Count');

                jsonData.forEach(row => dataTable.addRow([row.Species, parseInt(row.count)]));

                let options = {
                    title: 'Number of Adopted Species This Month',
                    pieHole: 0.4,
                    legend: { position: 'bottom' }
                };

                let chart = new google.visualization.PieChart(document.getElementById('adopted_species_chart'));
                chart.draw(dataTable, options);
            })
            .catch(error => {
                console.error('Fetch error:', error);
                document.getElementById('adopted_species_chart').innerText = 'Error fetching data';
            });
    }

    function drawAvailablePetsChart() {
        fetch('../php/available_pets.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(jsonData => {
                if (!Array.isArray(jsonData) || jsonData.length === 0) {
                    document.getElementById('available_pets_chart').innerText = 'No available pets data available for this month';
                    return;
                }

                let dataTable = new google.visualization.DataTable();
                dataTable.addColumn('string', 'Species');
                dataTable.addColumn('number', 'Count');

                jsonData.forEach(row => dataTable.addRow([row.Species, parseInt(row.count)]));

                let options = {
                    title: 'Number of Available Pets This Month',
                    pieHole: 0.4,
                    legend: { position: 'bottom' }
                };

                let chart = new google.visualization.PieChart(document.getElementById('available_pets_chart'));
                chart.draw(dataTable, options);
            })
            .catch(error => {
                console.error('Fetch error:', error);
                document.getElementById('available_pets_chart').innerText = 'Error fetching data';
            });
    }

    function drawOnlineChoicesChart() {
        fetch('../php/schedule_type.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(jsonData => {
                if (!Array.isArray(jsonData) || jsonData.length === 0) {
                    document.getElementById('online_choices_chart').innerText = 'No online choices data available for this month';
                    return;
                }

                let dataTable = new google.visualization.DataTable();
                dataTable.addColumn('string', 'Type');
                dataTable.addColumn('number', 'Count');

                jsonData.forEach(row => dataTable.addRow([row.type, parseInt(row.count)]));

                let options = {
                    title: 'Number of Online Choices This Month',
                    pieHole: 0.4,
                    legend: { position: 'bottom' }
                };

                let chart = new google.visualization.PieChart(document.getElementById('online_choices_chart'));
                chart.draw(dataTable, options);
            })
            .catch(error => {
                console.error('Fetch error:', error);
                document.getElementById('online_choices_chart').innerText = 'Error fetching data';
            });
    }

    function drawAdoptionStatusChart() {
        fetch('../php/status_adoption.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(jsonData => {
                if (!Array.isArray(jsonData) || jsonData.length === 0) {
                    document.getElementById('adoption_status_chart').innerText = 'No adoption status data available for this month';
                    return;
                }

                let dataTable = new google.visualization.DataTable();
                dataTable.addColumn('string', 'Status');
                dataTable.addColumn('number', 'Count');

                jsonData.forEach(row => dataTable.addRow([row.status, parseInt(row.count)]));

                let options = {
                    title: 'Adoption Form Statuses for This Month',
                    pieHole: 0.4,
                    legend: { position: 'bottom' }
                };

                let chart = new google.visualization.PieChart(document.getElementById('adoption_status_chart'));
                chart.draw(dataTable, options);
            })
            .catch(error => {
                console.error('Fetch error:', error);
                document.getElementById('adoption_status_chart').innerText = 'Error fetching data';
            });
    }

    function drawScheduleStatusChart() {
        fetch('../php/status_schedule.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(jsonData => {
                if (!Array.isArray(jsonData) || jsonData.length === 0) {
                    document.getElementById('schedule_status_chart').innerText = 'No schedule status data available for this month';
                    return;
                }

                let dataTable = new google.visualization.DataTable();
                dataTable.addColumn('string', 'Status');
                dataTable.addColumn('number', 'Count');

                jsonData.forEach(row => dataTable.addRow([row.status, parseInt(row.count)]));

                let options = {
                    title: 'Schedule Statuses for This Month',
                    pieHole: 0.4,
                    legend: { position: 'bottom' }
                };

                let chart = new google.visualization.PieChart(document.getElementById('schedule_status_chart'));
                chart.draw(dataTable, options);
            })
            .catch(error => {
                console.error('Fetch error:', error);
                document.getElementById('schedule_status_chart').innerText = 'Error fetching data';
            });
    }
});
