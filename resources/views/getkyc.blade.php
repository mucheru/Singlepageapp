<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>laravel 8 Get Data From Database using Ajax - Tutsmake.com</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

 <style>
   .container{
    padding: 0.5%;
   }
</style>
</head>
<body>

<div class="container">
    <h2 style="margin-top: 12px;" class="alert alert-success">laravel 8 Get Data From Database Using Ajax</h2><br>
    <div class="row">
        <div class="col-12">
          <table class="table table-bordered" id="">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Email</th>
                 <td colspan="2">Action</td>
              </tr>
           </thead>
           <tbody id="users-crud">
              @foreach($data as $u_info)
              <tr id="user_id_{{ $u_info->id }}">
                 <td>{{ $u_info->id  }}</td>
                 <td>{{ $u_info->f_name }}</td>
                 <td>{{ $u_info->m_name }}</td>
                 <td>{{ $u_info->l_name }}</td>
                 <td>{{ $u_info->id_number }}</td>

                 <td><a href="javascript:void(0)" id="show-user" data-id="{{ $u_info->id }}" class="btn btn-info">Show</a></td>
              </tr>
              @endforeach
           </tbody>
          </table>
       </div>
    </div>
</div>

<div class="modal fade" id="ajax-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="userShowModal"></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
            <form id="userForm" method="post", action="user/update", name="userForm" class="form-horizontal">
            @csrf()
               <input type="hidden" name="user_id" id="user_id" value="">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter Name" value="" maxlength="50" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">middle name</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="m_name" name="m_name" placeholder="Enter Email" value="" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">LastName</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="l_name" name="l_name" placeholder="last name" value="" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">IDNUMBER</label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" id="id_number" name="id_number" placeholder="id number" value="" required="">
                    </div>
                </div>

                <div class="form-group">
                <button class="btn btn-success" id="#saveBtn"type="submit">Update record </button>
                </div>


                
            </form>
        </div>
    </div>
  </div>
</div>

</body>

</html>
<script>
  $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
  

   /* When click show user */
    $('body').on('click', '#show-user', function () {
      var user_id = $(this).data('id');
      $.get('user/' + user_id +'/edit', function (data) {
         $('#userShowModal').html("Kyc Details");
          $('#ajax-modal').modal('show');
          $('#user_id').val(data.id);
          $('#f_name').val(data.f_name);
          $('#m_name').val(data.m_name);
          $('#l_name').val(data.l_name);
          $('#id_number').val(data.id_number);
      })
   });
   $('#saveBtn').click(function (event){
     event.preventDefault();
     $.ajax({
         url:"{{url('user/update')}}",
         type:"POST",
         data:$('#userForm').serialize(),
         datatype:'json',
         success:function(data){
            $('#ajax-modal').modal('hide');

         },
         error:function(data){
             console.log('error:',data);
             $('#ajax-modal').modal('show');

         }
     })   

  })
  });



</script>

