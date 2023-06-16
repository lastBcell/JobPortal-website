// $(document).ready(function() {

// $("#jobsearch").submit(function (e) {
//     e.preventDefault();
//     // console.log("save");
//     let search = $("#nameid").val();
//     // console.log(search);
//     mydata = { sr: search};
//     console.log(mydata);
//     $.ajax({
//         url:"search.php",
//         method:"post",
//         data: JSON.stringify(mydata),
//         success: function (data){
//             msg = "<div>" + data + "</div>"
//             $("#searchresult").html(msg);
            

//         }
//         })


// });
// })

$(document).ready(function() {
    
    
    $('#jobsearch').keyup(function(e) {
        e.preventDefault(e)
        var input = $("#nameid").val()
        
        if(input != ""){
        $('#searchresult').css("display","block");

      

        $.ajax({
            url: 'search.php',
            data: $(this).serialize(),
            method: 'POST',
            success: function(data) {
                $('#searchresult').html(data);
            }
        })
    }
    else{
        $('#searchresult').css("display","none");


    }
    })

 
})