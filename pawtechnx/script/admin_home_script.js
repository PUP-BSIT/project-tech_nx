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

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

async function drawChart() {
  const response = await fetch('/data');
  const jsonData = await response.json();

  const data = new google.visualization.DataTable();
  data.addColumn('number', 'Price');
  data.addColumn('number', 'Size');
  jsonData.forEach(row => data.addRow([row.price, row.size]));

  const options = {
    title: 'House Prices vs Size',
    hAxis: {title: 'Square Meters'},
    vAxis: {title: 'Price in Millions'},
    legend: 'none'
  };

  const chart = new google.visualization.LineChart(document.getElementById('myChart'));
  chart.draw(data, options);
}
  
let create=document.querySelector("#create");
let model=document.querySelector("#create-client");
let close=document.querySelector("#close");
let save = document.querySelector("#save");

create.addEventListener("click", () => {
    model.style.display = "flex";
})

close.addEventListener("click", () => {
    model.style.display = "none";
})

 save.addEventListener("click",async() => {
try {
  let name = document.querySelector("#name").value;
  let id = document.querySelector("#id").value;
  let date = document.querySelector("#date").value;
  let type = document.querySelector("#type").value;
  let status = document.querySelector("#status").value;
  const res=await fetch("php/admin_homepage.php", {
      method: "POST",
      body: JSON.stringify({"name": name, "id": id, "date": date, 
        "type": type, "status": status}),
      headers: {
          "Content-Type": "appliaction/json"
      }
  });
  const output = await res.json();

  if (output.success){
    alert(output.message);
    name = "";
    id = "";
    date = "";
    type = "";
    status = "";
    model.style.display = "none";
  } else {
    alert(output.message);
  }
  console.log(output)
} catch (error) {
      console.log("error " + error.message)
}
});