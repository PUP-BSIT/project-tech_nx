document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const hamburgerMenu = document.getElementById('hamburgerMenu');

    hamburgerMenu.addEventListener('click', function() {
        sidebar.classList.toggle('show');
    });

    fetch('get_users.php')
        .then(response => response.json())
        .then(data => {
            const userList = document.getElementById('userList');
            const searchInput = document.getElementById('searchInput');

            function renderUsers(users) {
                userList.innerHTML = '';
                users.forEach(user => {
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

            renderUsers(data);

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase();
                const filteredUsers = data.filter(user => (user.Firstname + 
                    ' ' + user.Lastname).toLowerCase().includes(searchTerm));
                renderUsers(filteredUsers);
            });

            document.querySelector('.modal .close').addEventListener('click', 
                function() {
                document.getElementById('userModal').style.display = 'none';
            });

            window.addEventListener('click', function(event) {
                const modal = document.getElementById('userModal');
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            });
        });
});