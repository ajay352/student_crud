<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <form id="form-data" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="age">Age:</label>
        <input type="text" name="age" id="age" required><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" id="phone_number" required><br>

        <label for="gender">Gender:</label>
        <input type="text" name="gender" id="gender" required><br>

        <button class="submit-form" id="butsave" type="button">Submit</button>
    </form>

    <script>
    $(".submit-form").click(function(e){
        e.preventDefault();
        var data = $('#form-data').serialize();
        $.ajax({
            type: 'post',
            url: "{{ route('store') }}",
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(){
                $('#create_new').html('....Please wait');
            },
            success: function(response){
                alert(response.success);
            },
            complete: function(response){
                $('#create_new').html('Create New');
            }
        });
	});
    </script>
</body>
</html>
