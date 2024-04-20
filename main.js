const handleEdit = (event) =>{
    event.preventDefault(); // Prevent form submission
  
    document.getElementById("editModal").style.display = "flex";

    // Get the clicked button's form
    const form = event.target.form;


    // Get the patient ID from the form
    const patientId = form.querySelector('input[name="patient_id"]').value;
    const name = form.querySelector('input[name="name"]').value;
    const address = form.querySelector('input[name="address"]').value;

    // Get the form within the modal
    // const modalForm = document.querySelector('#editModal form');

    // Set the action attribute of the modal form
    // modalForm.action = form.querySelector('input[name="post-method"]').value;

    // Set the patient ID input value in the modal
    document.querySelector('#editModal input[name="id"]').value = patientId;
    document.querySelector('#editModal input[name="name"]').value = name;
    document.querySelector('#editModal input[name="address"]').value = address;
   
}


const handleAddPatient = () => {
    // document.getElementById("pt-id").value = "";
    // document.getElementById("pt-name").value = "";
    // document.getElementById("pt-add").value = "";
    document.getElementById("myModal").style.display = "flex";
    
    
}

const handleModalExit = () => {
    document.getElementById("myModal").style.display = "none";
    document.getElementById("editModal").style.display = "none";
}

// Closing modal for adding patient
window.onclick = (event) => {
    const modal = document.getElementById("myModal");
    const modalContent = modal.querySelector(".modal-content");

    if (event.target == modal && !modalContent.contains(event.target)) {
        modal.style.display = "none";
        document.getElementById("patient-id").style.display = "none";
        
    }
}
// Closing modal for editing patient
window.onclick = (event) => {
    const modal = document.getElementById("editModal");
    const modalContent = modal.querySelector(".modal-content");

    if (event.target == modal && !modalContent.contains(event.target)) {
        modal.style.display = "none";
        
    }
}

// Added this to avoid modal keep closing
window.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('#edit');
    editButtons.forEach(function(button) {
      button.addEventListener('click', handleEdit);
    });
  })


