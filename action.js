$(document).ready(function() {
    $('#proquali').submit(function(e) {
        e.preventDefault()

        $.ajax({
            url: 'employee-proquali.php',
            data: $(this).serialize(),
            method: 'POST',
            success: function(resp) {
                $('#error_msg7').html(resp);
                $('#error_msg7').html(resp).show(500); 
                $('#error_msg7').delay(2000).hide(500);
               
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
                $('#error_msg').html(resp).show(500); 
                $('#error_msg').delay(2000).hide(500);
               
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
                $('#error_msg3').html(resp).show(500); 
                $('#error_msg3').delay(2000).hide(500);
               
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
                $('#error_msg4').html(resp).show(500); 
                $('#error_msg4').delay(2000).hide(500);
               
            }
        })
    })
 
})
