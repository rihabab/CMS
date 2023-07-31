/*

/// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


*/
















// Create a "close" button and append it to each list item


// var myNodelist = document.getElementsByClassName("produit");
// var i;
// for (i = 0; i < myNodelist.length; i++) {
//   var span = document.createElement("SPAN");
//   var txt = document.createTextNode("\u00D7");
//   span.className = "close";
//   span.appendChild(txt);
//   myNodelist[i].appendChild(span);
// }



// Click on a close button to hide the current list item



// var close = document.getElementsByClassName("close");
// var i;
// for (i = 0; i < close.length; i++) {
//   close[i].onclick = function() {
//     var div = this.parentElement;
//     div.style.display = "none";
//   }
// }

// Add a "checked" symbol when clicking on a list item



// var list = document.querySelector('ul');
// list.addEventListener('click', function(ev) {
//   if (ev.target.tagName === 'LI') {
//     ev.target.classList.toggle('checked');
//   }
// }, false);




var counter=1;
function newElement() {
  
  var li = document.createElement("div");
 
  var t = document.createElement("div");


  var htmlCode = '<div class="row mb-3 produit">' +'<div class="col-md-5">' +
  '<label for="post_tags">Produit label</label>' +
  '<div class="input-group mb-3">' +
  '<input type="text" class="form-control" name="facture_label_produit'+counter + '">' +
  '</div>' +
  '</div>' +
  '<div class="col-md-2">' +
  '<label for="users">Prix du produit</label>' +
  '<div class="input-group mb-3">' +
  '<input type="int" class="form-control" name="facture_produit_prix'+counter + '">' +
  '</div>' +
  '</div>' +
  '<div class="col-md-2">' +
    '<label for="users">Quantité du produit</label>' +
    '<div class="input-group mb-3">' +
    '<input type="int" class="form-control" name="facture_q'+counter + '">' +
    '</div>' +
  '</div>' + '<div class="col-md-2">'+
  '<label for="users">unité</label>'+
  '<select name="facture_q_type'+counter + '" id="" class="form-control" aria-label="Default select example" aria-describedby="basic-addon1">'+
      '<option value="unité">unité</option>' +
      '<option value="Kg">Kg</option>' +
      '<option value="L">L</option>'+
  '</select>'+
'</div>'+'</div>';


  counter++;

  li.innerHTML += htmlCode;





  
  document.getElementById("myUL").appendChild(li);
  




}

function printFile(source,tva,description) {
  w = window.open('template.php?f_id='+source+'&tva=' + tva + '&description=' + description);
  w.print();
}


function printFiledev(source) {
  w = window.open('templatedev.php?d_id='+source+'&tva=' + tva + '&description=' + description);
  w.print();
}