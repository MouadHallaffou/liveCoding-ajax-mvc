$(document).ready(function() {
    // Fonction pour afficher tous les utilisateurs
    function showAllUsers() {
        $.ajax({
            url: "action.php", // Envoie la requête à action.php
            type: "POST", // Utilisation de la méthode POST
            data: {
                action: "view" // Envoie "view" comme action pour récupérer les utilisateurs
            },
            success: function(response) {
                $("#showUser").html(response); // Injecte la réponse dans l'élément avec l'ID "showUser"
                $("#usersTable").DataTable(); // Initialise le tableau avec DataTables (plugin jQuery)
            },
        });
    }
    showAllUsers(); // Appel initial pour afficher les utilisateurs dès le chargement de la page

    // Gestion de l'ajout d'un utilisateur
    $("#form-data").submit(function(e) {
        e.preventDefault(); // Empêche la soumission classique du formulaire
        
        var formData = $(this).serialize() + "&action=insert"; 
        // Sérialise les données du formulaire et ajoute "action=insert" pour spécifier l'insertion
        
        $.ajax({
            url: "action.php",
            type: "POST",
            data: formData, // Envoie les données du formulaire à action.php
            success: function(response) {
                Swal.fire({
                    title: "Utilisateur ajouté!",
                    icon: "success",
                    draggable: true
                });
                $('#addModal').modal('hide'); // Ferme la modale d'ajout
                $('#form-data')[0].reset(); // Réinitialise le formulaire après soumission
                showAllUsers(); // Rafraîchit la liste des utilisateurs
            }
        });
    });

    // Gestion de l'édition d'un utilisateur
    $("body").on("click", ".editBtn", function(e) {
        e.preventDefault();
        var edit_id = $(this).attr('id'); // Récupère l'ID de l'utilisateur à modifier
        
        $.ajax({
            url: "action.php",
            type: "POST",
            data: {
                edit_id: edit_id // Envoie l'ID de l'utilisateur à action.php
            }, 
            success: function(response) {
                var data = JSON.parse(response); // Convertit la réponse JSON en objet JavaScript
                
                // Remplit les champs du formulaire d'édition avec les données récupérées
                $("#id").val(data.id);
                $("#fname").val(data.fName);
                $("#lname").val(data.lName);
                $("#ed-email").val(data.email);
                $("#ed-phone").val(data.phone);
            }
        });
    });

    // Gestion de la mise à jour d'un utilisateur après modification
    $("#edit-form-data").submit(function(e) {
        e.preventDefault();
        
        var formData = $(this).serialize() + "&action=update"; 
        // Sérialise les données du formulaire et ajoute "action=update" pour spécifier la mise à jour

        $.ajax({
            url: "action.php",
            type: "POST",
            data: formData,
            success: function(response) {
                Swal.fire({
                    position: "top",
                    icon: "success",
                    title: "Modification enregistrée",
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#editModal').modal('hide'); // Ferme la modale d'édition
                $('#edit-form-data')[0].reset(); // Réinitialise le formulaire
                showAllUsers(); // Rafraîchit la liste des utilisateurs
            }
        });
    });

    // Gestion de la suppression d'un utilisateur avec confirmation SweetAlert2
    $("body").on("click", ".deleteBtn", function(e) {
        e.preventDefault();
        
        var del_id = $(this).attr('id'); // Récupère l'ID de l'utilisateur à supprimer

        // Affiche une boîte de dialogue SweetAlert2 pour confirmation
        Swal.fire({
            title: "Êtes-vous sûr?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Oui, supprimer!",
            cancelButtonText: "Annuler"
        }).then((result) => {
            if (result.isConfirmed) {
                // Si l'utilisateur confirme, on exécute la requête AJAX pour supprimer l'utilisateur
                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: { del_id: del_id }, // Envoie l'ID de l'utilisateur à supprimer
                    success: function(response) {
                        Swal.fire(
                            "Supprimé!",
                            "L'utilisateur a été supprimé avec succès.",
                            "success"
                        );
                        showAllUsers(); // Rafraîchit la liste des utilisateurs après suppression
                    }
                });
            }
        });
    });

});
