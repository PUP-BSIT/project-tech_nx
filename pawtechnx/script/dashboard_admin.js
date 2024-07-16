document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const hamburgerMenu = document.getElementById('hamburgerMenu');
    const userList = document.getElementById('userList');
    const searchInput = document.getElementById('searchInput');
    const userModal = document.getElementById('userModal');
    const closeModal = document.querySelector('.modal .close');
    const submitButton = document.getElementById('submit');
  
    if (!sidebar || !hamburgerMenu || !userList || !searchInput || !userModal || !closeModal || !submitButton) return;
  
    hamburgerMenu.addEventListener('click', function() {
      sidebar.classList.toggle('show');
    });
  
    fetch('get_users.php')
      .then(response => response.json())
      .then(data => {
        renderUsers(data);
  
        searchInput.addEventListener('input', function() {
          const searchTerm = searchInput.value.toLowerCase();
          const filteredUsers = data.filter(user => (user.Firstname + ' ' + user.Lastname).toLowerCase().includes(searchTerm));
          renderUsers(filteredUsers);
        });
  
        closeModal.addEventListener('click', function() {
          userModal.style.display = 'none';
        });
  
        window.addEventListener('click', function(event) {
          if (event.target === userModal) {
            userModal.style.display = 'none';
          }
        });
      });

  
    submitButton.addEventListener('click', async function(event) {
      event.preventDefault();
  
      try {
        let id = document.querySelector('#id').value;
        let name = document.querySelector('#name').value;
        let date = document.querySelector('#date').value;
        let type = document.querySelector('#type').value;
        let status = document.querySelector('#status').value;
  
        const res = await fetch('php/insert_data_admin.php', {
          method: 'POST',
          body: JSON.stringify({ name, id, date, type, status }),
          headers: {
            'Content-Type': 'application/json',
          },
        });
  
        const output = await res.json();
  
        if (output.success) {
          alert(output.message);
          document.querySelector('#name').value = '';
          document.querySelector('#id').value = '';
          document.querySelector('#date').value = '';
          document.querySelector('#type').value = '';
          document.querySelector('#status').value = '';
        } else {
          alert(output.message);
        }
      } catch (error) {
        console.log('error ' + error.message);
      }
    });
  });
  