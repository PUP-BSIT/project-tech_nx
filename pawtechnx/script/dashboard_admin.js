document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const hamburgerMenu = document.getElementById('hamburgerMenu');
    const searchInput = document.getElementById('searchInput');
    const submitButton = document.getElementById('submit');
    const scheduleTable = document.getElementById('scheduleTable').getElementsByTagName('tbody')[0];

    if (!sidebar || !hamburgerMenu || !searchInput || !submitButton || !scheduleTable) return;

    hamburgerMenu.addEventListener('click', function() {
        sidebar.classList.toggle('show');
    });

    async function loadSchedules() {
        try {
            const response = await fetch('../php/fetch_schedule.php');
            const schedules = await response.json();

            // Clear existing rows
            scheduleTable.innerHTML = '';

            schedules.forEach(schedule => {
                const row = scheduleTable.insertRow();
                row.insertCell().textContent = schedule.id;
                row.insertCell().textContent = schedule.schedule_ID;
                row.insertCell().textContent = schedule.adoption_ID;
                row.insertCell().textContent = schedule.name;
                row.insertCell().textContent = schedule.date;
                row.insertCell().textContent = schedule.type;
                row.insertCell().textContent = schedule.status;
            });
        } catch (error) {
            console.error('Error loading schedules:', error);
        }
    }

    submitButton.addEventListener('click', async function() {
        try {
            const schedule_ID = document.getElementById('schedule_ID').value;
            const adoption_ID = document.getElementById('adoption_ID').value;
            const name = document.getElementById('name').value;
            const date = document.getElementById('date').value;
            const type = document.getElementById('type').value;
            const status = document.getElementById('status').value;

            const response = await fetch('../php/insert_data_admin.php', {
                method: 'POST',
                body: JSON.stringify({schedule_ID, adoption_ID, name, date, type, status }),
                headers: {
                    'Content-Type': 'application/json'
                }
            });

            const result = await response.json();

            if (result.success) {
                alert(result.message);
                document.getElementById('schedule_ID').value = '';
                document.getElementById('adoption_ID').value = '';
                document.getElementById('name').value = '';
                document.getElementById('date').value = '';
                document.getElementById('type').value = '';
                document.getElementById('status').value = '';

                loadSchedules(); // Refresh the table
            } else {
                alert(result.message);
            }
        } catch (error) {
            console.error('Error:', error);
        }
    });

    loadSchedules(); // Load the initial data
});
