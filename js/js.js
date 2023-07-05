


$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
    });
    
});


function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }


  $(document).ready(function() {
    // Get the modal element
    var modal = $("#myModal");
  
    // Get the <span> element that closes the modal
    var closeBtn = $(".close");
  
    // When the button or link is clicked
    $(".open-modal").click(function(e) {
      e.preventDefault(); // Prevent default behavior (e.g., form submission, anchor click)
  
      // Show the modal
      modal.show();
    });
  
    // When the user clicks on the close button, close the modal
    closeBtn.click(function() {
      modal.hide();
    });
    window.stop();
  });

