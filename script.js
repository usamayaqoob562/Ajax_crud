$(document).ready(function () {

    if ($("#studentTable").length) {
        loadTable();
    }

    // ==========================
    // LOAD TABLE
    // ==========================
    function loadTable() {
        $.ajax({
            url: "fetch.php",
            type: "GET",
            success: function (data) {
                $("#studentTable").html(data);
            }
        });
    }

    // ==========================
    // INSERT STUDENT
    // ==========================
    $("#saveStudent").click(function () {
        let first_name = $("#first_name").val();
        let last_name = $("#last_name").val();
        let email = $("#email").val();
        let mobile = $("#mobile").val();

        if (first_name == "" || last_name == "" || email == "" || mobile == "") {
            alert("All fields are required");
            return;
        }

        $.ajax({
            url: "insert.php",
            type: "POST",
            data: {
                first_name: first_name,
                last_name: last_name,
                email: email,
                mobile: mobile
            },
            success: function (response) {
                if (response == 1) {
                    $("#studentForm")[0].reset();
                    let modal = bootstrap.Modal.getInstance(
                        document.getElementById("addStudentModal")
                    );
                    modal.hide();
                    loadTable();
                } else {
                    alert("Insert Failed");
                }
            }
        });
    });

    // ==========================
    // DELETE STUDENT
    // ==========================
    $(document).on("click", ".deleteBtn", function () {
        let id = $(this).data("id");

        if (confirm("Are you sure you want to delete?")) {
            $.ajax({
                url: "delete.php",
                type: "POST",
                data: { id: id },
                success: function (response) {
                    if (response == 1) {
                        loadTable();
                    } else {
                        alert("Delete Failed");
                    }
                }
            });
        }
    });

    // ==========================
    // OPEN EDIT MODAL
    // ==========================
    $(document).on("click", ".editBtn", function () {
        let id = $(this).data("id");

        $.ajax({
            url: "Get_single_data.php",
            type: "POST",
            data: { id: id },
            success: function (response) {
                let student = JSON.parse(response);

                $("#edit_id").val(student.id);
                $("#edit_first_name").val(student.first_name);
                $("#edit_last_name").val(student.last_name);
                $("#edit_email").val(student.email);
                $("#edit_mobile").val(student.mobile);

                let modalElement = document.getElementById("editStudentModal");
                let editModal = bootstrap.Modal.getOrCreateInstance(modalElement);
                editModal.show();
            }
        });
    });

    // ==========================
    // UPDATE STUDENT
    // ==========================
    $("#updateStudent").click(function () {
        let id = $("#edit_id").val();
        let first_name = $("#edit_first_name").val();
        let last_name = $("#edit_last_name").val();
        let email = $("#edit_email").val();
        let mobile = $("#edit_mobile").val();

        $.ajax({
            url: "update.php",
            type: "POST",
            data: {
                id: id,
                first_name: first_name,
                last_name: last_name,
                email: email,
                mobile: mobile
            },
            success: function (response) {
                if (response == 1) {
                    let modal = bootstrap.Modal.getInstance(
                        document.getElementById("editStudentModal")
                    );
                    modal.hide();
                    loadTable();
                } else {
                    alert("Update Failed");
                }
            }
        });
    });

    // ==========================
    // REGISTER USER
    // ==========================
    $("#registerUser").click(function () {
        let first_name = $("#signup_first_name").val();
        let last_name = $("#signup_last_name").val();
        let email = $("#signup_email").val();
        let password = $("#signup_password").val();

        if (first_name == "" || last_name == "" || email == "" || password == "") {
            alert("All fields are required");
            return;
        }

        $.ajax({
            url: "register.php",
            type: "POST",
            data: {
                first_name: first_name,
                last_name: last_name,
                email: email,
                password: password
            },
            success: function (response) {
                response = response.trim();

                if (response == "1") {
                    alert("Registration Successful!");
                    window.location.href = "login.php";
                    $("#signupForm")[0].reset();
                } else if (response == "email_exists") {
                    alert("Email already exists");
                } else {
                    alert("Server Response: " + response);
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert("AJAX Error");
            }
        });
    });

    // ==========================
    // LOGIN USER (ROLE BASED REDIRECT)
    // ==========================
    $("#loginUser").click(function () {
        let email = $("#login_email").val();
        let password = $("#login_password").val();

        if (email == "" || password == "") {
            alert("Please enter both Email and Password");
            return;
        }

        $.ajax({
            url: "login_process.php",
            type: "POST",
            data: {
                email: email,
                password: password
            },
            success: function (response) {
                response = response.trim();

                if (response === "admin") {
                    
                    window.location.href = "dashboard.php";
                } 
                else if (response === "user") {
                    window.location.href = "index.php";
                } 
                else if (response === "invalid_password") {
                    alert("Incorrect password!");
                } 
                else if (response === "user_not_found") {
                    alert("No account found with this email!");
                } 
                else {
                    alert("Server Response: " + response);
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert("AJAX Error");
            }
        });
    });

}); // Document Ready End