// employerr
$(document).ready(function() {
    $('#jobdelete').submit(function(e) {
        e.preventDefault()
          $.ajax({
            url: 'posted-job-delete.php',
            data: $(this).serialize(),
            method: 'POST',
            success: function(resp) {
                $('#error_msg4').html(resp);
                // $("#scores2").load("employer.php #scores2"); blah delete akkan ullath
            }
        })


})
})


$(document).ready(function() {
    $('#companyquali').submit(function(e) {
        e.preventDefault()
// console.log("hello");
        $.ajax({
            url: 'employer-company.php',
            data: $(this).serialize(),
            method: 'POST',
            success: function(resp) {
                $('#error_msg6').html(resp);
            }
        })
    })
 
})
$(document).ready(function() {
    $('#passwordquali').submit(function(e) {
        e.preventDefault()

        $.ajax({
            url: 'employer-password.php',
            data: $(this).serialize(),
            method: 'POST',
            success: function(resp) {
                $('#error_msg3').html(resp);
            }
        })
    })
 
})
$(document).ready(function() {
    $('#postajob').submit(function(e) {
        e.preventDefault()

        $.ajax({
            url: 'employer-postajob.php',
            data: $(this).serialize(),
            method: 'POST',
            success: function(resp) {
                $('#error_msg2').html(resp);
            }
        })
    })
 
})


$(document).ready(function() {


    $(document).on('click',".red", function() {
        // var r = $(this).closest('tr').remove();
        var setid = $(this).attr('setid')
        // alert(setid);
        // console.log(setid);

        $.ajax({
            url: 'employer-emp-dlt.php',
            data: {"myData":setid},
            method: 'POST',
            // async: false,
            success: function(resp) {
                $('#error_msg4').html(resp);
                $("#table").load("employer.php #table");
                // $("#scores3").load("employer.php #scores3");
               

            }
        })


    });
});
$(document).ready(function() {


    $(document).on('click',".red", function() {
        // var r = $(this).closest('tr').remove();
        var getid = $(this).attr('getid');
        // alert(getid);
        // console.log(getid);

        $.ajax({
            url: 'employer-emp-req-dlt.php',
            data: {"empData":getid},
            method: 'POST',
            // async: false,
            success: function(resp) {
                $('#error_msg5').html(resp);
                $("#table2").load("employer.php #table2");
                // // $("#scores3").load("employer.php #scores3");
               

            }
        })


    });
});
// function student_edit(){
   
// }
// })

// student_edit();
    
//     $('#myform button').click(function(e) {
       
//         e.preventDefault()

//         if($(this).attr("value") == "button1"){
//             alert($("").val());
//             //   $("#myform").submit();
      
//             $('#myform').submit(function(e) {
//                 e.preventDefault()
        
//                 $.ajax({
//                     url: 'empjobdetails.php',
//                     data: $(this).serialize(),
//                     method: 'POST',
//                     success: function(resp) {
//                         $('#error_msg4').html(resp);
//                     }
//                 })
//             })
         
//             // var input = $("jobid").val()
//             // console.log(input)
           
//             window.location.href = "empjobdetails.php"
           
//         }
//         if($(this).attr("value") == "button2"){
//             alert("second button is pressd")
//         }

//     })
 
// })

