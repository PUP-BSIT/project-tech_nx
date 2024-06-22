document.getElementById('meetingForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const petId = document.getElementById('petId').value;
    const date = document.getElementById('date').value;
    const type = document.getElementById('type').value;
    const status = document.getElementById('status').value;

    const table = document.getElementById('meetingsTable').getElementsByTagName('tbody')[0];
    const newRow = table.insertRow();

    const nameCell = newRow.insertCell(0);
    const petIdCell = newRow.insertCell(1);
    const dateCell = newRow.insertCell(2);
    const typeCell = newRow.insertCell(3);
    const statusCell = newRow.insertCell(4);

    nameCell.textContent = name;
    petIdCell.textContent = petId;
    dateCell.textContent = date;
    typeCell.textContent = type;
    statusCell.textContent = status;

    document.getElementById('meetingForm').reset();
});
