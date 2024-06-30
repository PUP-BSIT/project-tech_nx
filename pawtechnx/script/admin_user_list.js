document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const hamburgerMenu = document.getElementById('hamburgerMenu');
    const userList = document.getElementById('userList');
    const searchInput = document.getElementById('searchInput');
    const userModal = document.getElementById ('userModal');
    const closeModal = document.querySelector('.modal .close');

    if (!sidebar || !hamburgerMenu || !userList || !searchInput || !userModal
        || !closeModal) return;

    hamburgerMenu.addEventListener('click', function() {
        sidebar.classList.toggle('show');
    });

    fetch('get_users.php')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            renderUsers (data);

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase();
                const filteredUsers = data.filter(function(user) {
                    return (user.Firstname + ' ' + user.Lastname).toLowerCase
                    ().includes(searchTerm);
                });
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

        function renderUsers(users) {
            userList.innerHTML = '';
            users.forEach(function(user){
                const userItem = document.createElement('div');
                userItem.classList.add('user-item');
                userItem.innerHTML = `
                    <img src="${user.profile_image}" 
                    alt="${user.Firstname} ${user.Lastname}">
                    <span>${user.Firstname} ${user.Lastname}</span>
                `;
                userList.appendChild(userItem);

                userItem.addEventListener('click', function() {
                    document.getElementById('modalProfileImage').innerHTML
                     = `<img src="${user.profile_image}" 
                     alt="${user.Firstname} ${user.Lastname}">`;
                    document.getElementById('modalName').textContent = 
                        `${user.Firstname} ${user.Lastname}`;
                    document.getElementById('modalEmail').textContent = 
                        user.Email;
                    document.getElementById('modalPhone').textContent = 
                        user.Contact;
                    document.getElementById('modalAddress').textContent =
                        user.Address;
                    document.getElementById('modalCreatedAt').textContent
                        = user.created_at;
                    document.getElementById('userModal').style.display =
                     'block';
                });
            });
        }
});