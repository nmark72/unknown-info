
fetch("http://localhost:90//unknown-info/back/api.php")
  .then(response => response.json()) // Convert the response to JSON
  .then(data => {
    let tableBody = document.querySelector("#table-body");

    for (let row of data) {
      let tr = document.createElement("tr");

      let tdID = document.createElement("td");
      let tdPlace = document.createElement("td");
      let tdAge = document.createElement("td");
      let tdDescription = document.createElement("td");

      tdID.textContent = row.ID;
      tdPlace.textContent = row.Place;
      tdAge.textContent = row.Age;
      tdDescription.textContent = row.Description;

      tr.appendChild(tdID);
      tr.appendChild(tdPlace);
      tr.appendChild(tdAge);
      tr.appendChild(tdDescription);

      tableBody.appendChild(tr);
    }
  })
  .catch(error => {
    console.error(error);
  });
