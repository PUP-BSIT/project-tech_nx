function submitUser() {
    let fname = document.querySelector('#fname').value.trim();
    let lname = document.querySelector('#lname').value.trim();
    let contact = document.querySelector('#contact').value.trim();
    let email = document.querySelector('#email').value.trim();
    let password = document.querySelector('#password').value;
    let confirm_password = document.querySelector('#confirm').value;

    fetch("./registration.php", {
        method: "POST",
        headers: {
          "Content-type": "application/x-www-form-urlencoded",
        },
        body: `Firstname=${fname}&Lastname=${lname}&Contact=${contact}
          &Email=${email}&Password=${password}
          &Confirm_Password=${confirm_password}}`,
      })
        .then((response) => response.text())
        .then((responseText) => {
          alert(responseText);
        });

    if (fname === '' || lname === '' || contact === '' || email === '' 
        || password === '' || confirm_password === '') {
        alert("All fields are required");
        return false; 
    }

    if (password !== confirm_password) {
        alert("Password and confirm password do not match");
        return false; 
    }

}