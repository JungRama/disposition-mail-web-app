function clickopenInstansi() {
  var x = document.getElementById("edit-instansi");
  var z = document.getElementById("info-data");
  if (x.style.display === "none") {
      x.style.display = "block";
      z.style.display = "none";
  } else {
      x.style.display = "none";
      z.style.display = "block";
  }
}
function backInstansi(){
  var x = document.getElementById("edit-instansi");
  var z = document.getElementById("info-data");
  if (z.style.display === "none") {
      x.style.display = "none";
      z.style.display = "block";
  } else {
      x.style.display = "block";
      z.style.display = "none";
  }
}

function openForm(){
  var x = document.getElementById("form-content");
  var z = document.getElementById("table-content");
  if (z.style.display === "none") {
      x.style.display = "none";
      z.style.display = "block";
  } else {
      x.style.display = "block";
      z.style.display = "none";
  }
}

function filterData(){
  var isiFilter = document.getElementById('search-data').onkeyup;
  var filter = document.getElementById('search-data').value.toLowerCase();
  var table = document.getElementById('isi-table');
  var tr = table.getElementsByTagName('tr');

  for (var i = 0; i < tr.length; i++) {
    if(tr[i].innerHTML.toLowerCase().indexOf(filter) > -1){
      tr[i].style.display = "";
    }else {
      tr[i].style.display = "none";
    }
  }
}
