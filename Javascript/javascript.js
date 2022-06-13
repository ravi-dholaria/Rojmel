
setTimeout(function () {
    // Closing the alert
    document.getElementById("alert").style.display = 'none';
}, 2000);

function datapass(e,name,amount,date) {

       document.getElementById("edit_date").value = date; 
       document.getElementById("edit_amount").value = amount; 
       document.getElementById("edit_name").innerText = name; 
       document.getElementById("edit_name").value = name; 
       document.getElementById("Edit_Submit").value = e; 
    }