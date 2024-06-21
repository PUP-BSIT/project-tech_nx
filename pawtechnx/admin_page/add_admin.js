function submitAdmin() {
    let fname = document.querySelector('#firstname').value.trim();
    let lname = document.querySelector('#lastname').value.trim();
    let admin_code = document.querySelector('#admin_code').value.trim();
    let password = document.querySelector('#password').value;


    fetch("./add_admin.php", {
        method: "POST",
        headers: {
          "Content-type": "application/x-www-form-urlencoded",
        },
        body: `Firstname=${fname}&Lastname=${lname}&Admin_Code=${admin_code}
          &Email=${email}&Password=${password}`,
      })
        .then((response) => response.text())
        .then((responseText) => {
          alert(responseText);
        });

    if (fname === '' || lname === '' || admin_code === '' || password === '') {
        alert("All fields are required");
        return false; 
    }

    if (password !== confirm_password) {
        alert("Password and confirm password do not match");
        return false; 
    }

}