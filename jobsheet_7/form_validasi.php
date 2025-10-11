<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input dengan Validasi dan AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Form Input dengan Validasi dan AJAX</h1>
    <form id="myForm">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama">
        <span id="nama-error" style="color: red;"></span><br>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
        <span id="email-error" style="color: red;"></span><br>

        <input type="submit" value="Submit">
    </form>

    <div id="response" style="margin-top: 10px; color: green;"></div>

    <script>
        $(document).ready(function(){
            $("#myForm").submit(function(event){
                event.preventDefault();
                var nama = $("#nama").val();
                var email = $("#email").val();
                var valid = true;

                if(nama === ""){
                    $("#nama-error").text("Nama harus diisi.");
                    valid = false;
                } else {
                    $("#nama-error").text("");
                }

                if(email === ""){
                    $("#email-error").text("Email harus diisi.");
                    valid = false;
                } else {
                    $("#email-error").text("");
                }

                if(valid){
                    $.ajax({
                        url: "proses_validasi.php",
                        method: "POST",
                        data: { nama: nama, email: email },
                        success: function(response){
                            $("#response").html(response);
                        },
                        error: function(){
                            $("#response").text("Terjadi kesalahan saat mengirim data.");
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
