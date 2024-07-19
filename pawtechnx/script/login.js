document.getElementById('login-form').addEventListener('submit', function(e) {
  e.preventDefault();

  const username = document.querySelector('input[name="username"]').value;
  const password = document.querySelector('input[name="password"]').value;

  const body = `username=${username.replace(/ /g, '+')}&password=${password.replace(/ /g, '+')}`;

  fetch('../php/login_process.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: body
  })
  .then(response => response.json()) 
  .then(data => {
      if (data.status === 'success') {
          alert('Login successful');
          window.location.href = data.redirect; 
      } else if (data.status === 'error') {
          alert(data.message); 
      }
  })
  .catch(error => console.error('Error:', error));
});

document.getElementById('show-password').addEventListener('change', function() {
  const passwordField = document.getElementById('password');
  passwordField.type = this.checked ? 'text' : 'password';
});
