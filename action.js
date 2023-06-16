$(document).ready(function() {
    $('#proquali').submit(function(e) {
        e.preventDefault()

        $.ajax({
            url: 'employee-proquali.php',
            data: $(this).serialize(),
            method: 'POST',
            success: function(resp) {
                $('#error_msg').html(resp);
            }
        })
    })
 
})
$(document).ready(function() {
    $('#acaquali').submit(function(e) {
        e.preventDefault()

        $.ajax({
            url: 'employee-acaquali.php',
            data: $(this).serialize(),
            method: 'POST',
            success: function(resp) {
                $('#error_msg').html(resp);
            }
        })
    })
 
})
$(document).ready(function() {
    $('#passwordquali').submit(function(e) {
        e.preventDefault()

        $.ajax({
            url: 'employee-password.php',
            data: $(this).serialize(),
            method: 'POST',
            success: function(resp) {
                $('#error_msg3').html(resp);
            }
        })
    })
 
})
$(document).ready(function() {
    $('#applydelete').submit(function(e) {
        e.preventDefault()

        $.ajax({
            url: 'employee-apply-delete.php',
            data: $(this).serialize(),
            method: 'POST',
            success: function(resp) {
                $('#error_msg4').html(resp);
                $("#scores").load("employee.php #scores");
            }
        })
    })
 
})
