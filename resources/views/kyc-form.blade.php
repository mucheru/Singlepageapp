<html lang="en">
<head>
<title>Laravel Ajax jquery Validation Tutorial</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class="container panel panel-default ">
<h2 class="panel-heading">Laravel Ajax jquery Validation</h2>
<form id="kyc-form">

<div class="form-group">
<input type="text" name="f_name" class="form-control" placeholder="f_name" id="f_name">
<span class="text-danger" id="f_name-error"></span>
</div>

<div class="form-group">
<input type="text" name="m_name" class="form-control" placeholder="m_name" id="m_name">
<span class="text-danger" id="m_name-error"></span>
</div>

<div class="form-group">.
<input type="text" name="l_name" class="form-control" placeholder="Enter last Name" id="l_name">
<span class="text-danger" id="l_name-error"></span>
</div>

<div class="form-group">
<input type="text" name="id_number" class="form-control" placeholder="Enter id number" id="id_number">
<span class="text-danger" id="id_number-error"></span>
</div>


<div class="form-group">
<button type="submit" class="btn btn-success" id="submit">Submit</button>
</div>

<div class="form-group">
<span class="text-success" id="success-message"> </span>
</div>
</form>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script type="text/javascript">
$.ajaxSetup({
headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $('#kyc-form').on('submit',function(event){
        event.preventDefault();
        $('#f_name-error').text('');
        $('#m_name-error').text('');
        $('#l_name-error').text('');
        $('#id_number-error').text('');
        f_name=$('#f_name').val();
        m_name=$('#m_name').val();
        l_name=$('#l_name').val();
        id_number=$('#id_number').val();
$.ajax({
            url:"datasubmit",
            type:"POST",
            data:{
                f_name:f_name,
                m_name:m_name,
                l_name:l_name,
                id_number:id_number
                },
                success:function(response){
                    console.log(response);
                    if(response){
                        $('#kyc-form')[0].reset();
                        $('#success-message').text(response);
                        }
                        },
                        errors:function(response){
                            $('#f_name-error').text(response.responseJSON.errors.f_name);
                            $('#m_name-error').text(response.responseJSON.errors.m_name);
                            $('#l_name-error').text(response.responseJSON.errors.l_name);
                            $('#id_n    umber-error').text(response.responseJSON.errors.id_number);
                            },
        });
    });

</script>
</body>
</html>