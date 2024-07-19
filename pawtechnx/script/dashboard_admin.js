document.addEventListener('DOMContentLoaded', () => {
    loadSchedules();

    const submitButton = document.getElementById('submit');
    submitButton.addEventListener('click', submitForm);
});

async function loadSchedules() {
    try {
        const response = await fetch('../php/fetch_schedule.php');
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const schedules = await response.json();
        const scheduleTable = document.getElementById('scheduleTable').getElementsByTagName('tbody')[0];
        scheduleTable.innerHTML = '';

        schedules.forEach(schedule => {
            const row = scheduleTable.insertRow();
            row.insertCell().textContent = schedule.schedule_ID;
            row.insertCell().textContent = schedule.name;
            row.insertCell().textContent = schedule.date;
            row.insertCell().textContent = schedule.type;
            row.insertCell().textContent = schedule.status;
        });
    } catch (error) {
        console.error('Error loading schedules:', error);
    }
}

async function submitForm() {
    try {
        const schedule_ID = document.getElementById('schedule_ID').value;
        const name = document.getElementById('name').value;
        const date = document.getElementById('date').value;
        const type = document.getElementById('type').value;
        const status = document.getElementById('status').value;
        const adoption_ID = document.getElementById('adoption_ID').value;

        if (!schedule_ID || !name || !date || !type || !status || !adoption_ID) {
            alert('Please fill out all fields.');
            return;
        }

        const response = await fetch('../php/insert_data_admin.php', {
            method: 'POST',
            body: JSON.stringify({ schedule_ID, name, date, type, status, adoption_ID }),
            headers: {
                'Content-Type': 'application/json'
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const result = await response.json();
        if (result.success) {
            alert(result.message);
            document.getElementById('schedule_ID').value = '';
            document.getElementById('name').value = '';
            document.getElementById('date').value = '';
            document.getElementById('type').value = '';
            document.getElementById('status').value = '';
            document.getElementById('adoption_ID').value = '';
            loadSchedules();
        } else {
            alert(result.message);
        }
    } catch (error) {
        console.error('Error:', error);
    }
}
