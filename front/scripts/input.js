//window.onload = function() {
//  fetchData(1);
//};

document.getElementById("myForm").addEventListener("submit", function(e) {
  e.preventDefault(); 
  fetchDataByID(); 
});

function InsertUpdateData(){
  let form = document.querySelector("form");
  let ID = form.elements["ID"].value;
  let Place = form.elements["Place"].value;
  let Age = form.elements["Age"].value;
  let Description = form.elements["Description"].value;

  let data = {
    ID: ID,
    Place: Place,
    Age: Age,
    Description: Description
  }; 
fetch("http://localhost:90/unknown-info/back/input-api.php", {
  method: "POST",
  headers: {
    "Content-Type": "application/json" 
  },
  body: JSON.stringify(data), 
  credentials: "include" 
})
    .then(response => response.text()) 
    .then(text => {
      alert(text);
    })
    .catch(error => {
      console.error(error);
    });
};



function fetchDataByID() {
  
  let inputID = document.getElementById("ID");

  let id = inputID.value;

  fetchData(id);
}


function fetchData() {
    let id = document.getElementById("ID");
    let idVal = id.value;
  fetch("http://localhost:90/unknown-info/back/fetch.php?id=" + idVal)
    .then(response => response.json()) 
    .then(data => {
      let inputID = document.getElementById("ID");
      let inputPlace = document.getElementById("Place");
      let inputAge = document.getElementById("Age");
      let inputDescription = document.getElementById("Description");

      inputID.value = data.ID;
      inputPlace.value = data.Place;
      inputAge.value = data.Age;
      inputDescription.value = data.Description;
    })
    .catch(error => {
      console.error(error);
    });
}

function deleteDataByID() {
  
  let inputID = document.getElementById("ID");

  let id = inputID.value;

  fetch("http://localhost:90/unknown-info/back/delete.php?id=" + id, {
    method: "DELETE", 
    credentials: "include" 
  })
    .then(response => response.text()) 
    .then(text => {
      
      alert(text);
    })
    .catch(error => {
      console.error(error);
    });
}