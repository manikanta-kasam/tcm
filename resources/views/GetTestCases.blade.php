<html>
    <head>
        <title>Test Case Management</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style> 
        
         body{
             padding:0;
             margin:2;
         }
        </style>
    </head>
    <body>
  @if(! $arrTestCases->isEmpty()){
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Name</th>  
            <th scope="col">Description</th>  
            <th scope="col">Operation</th>  

            </tr>
        </thead>
    <tbody>
      @foreach($arrTestCases as $testCase)
       <tr>
        <td>{{$testCase['name']}}</td>
        <td>{{$testCase['description']}}</td>
        <td><button type='button' class="btn btn-primary" data-toggle="modal" data-target="#deleteModal"><img src="../storage/app/public/delete.jpg" alt ='delete' width=25 height=25></button></td>
        </tr>
        @endforeach
        
    </tbody>
</table>
}



<form action="http://localhost/tcm/public/deleteTestCase" method="POST" id='deleteForm'>
{{ csrf_field() }}
{{method_field('DELETE')}}
    {{-- start add model --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Test Case</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <input type='hidden' name='_method' value='delete'></input>
                   Are u sure to delete??
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary delete">Delete</button>
        </div>
        </form>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
    table.on('click','.delete', function(){
      $tr = $(this).closest('tr');
      if($($tr).hasClass('child')){
         $tr = $tr.prev('.parent');
      }

      var data = table.row($tr).data();
      $('#id').val($data[0]);

      $('#deleteForm').attr('action','/deleteTestCase',$data[0]);
      $('#deleteModel').modal('show');
    });
    </script>
    </body>

</html>