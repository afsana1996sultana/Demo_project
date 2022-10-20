<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.2/js/bootstrap.min.js" integrity="sha512-5BqtYqlWfJemW5+v+TZUs22uigI8tXeVah5S/1Z6qBLVO7gakAOtkOzUtgq6dsIo5c0NJdmGPs0H9I+2OHUHVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="padding-top:50px; margin-left:30px; margin-right:30px;">
<a type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_employees" style="margin-bottom:10px;"><i class="fa fa-plus"></i>Add Employee</a> 
<button type="button" id="logout_btn" class="btn btn-danger" style="margin-bottom:10px; padding-top:10px; padding-bottom:10px;"><i class="fas fa-power-off">&nbsp;Logout</i></button>


    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody> 
            @forelse ($employee as $employee)
            <tr class="odd">
                <td>{{$employee-> id}}</td>
                <td>{{$employee-> name}}</td>
                <td>{{$employee-> email}}</td>
                <td>{{$employee-> phone}}</td>
                <td class="text-right py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                        <button type="button" value="{{$employee->id}}" class="btn btn-primary" id="editemployee" ><i class="fas fa-pencil-alt" ></i></button>&nbsp;
                        <button type="button" value="{{$employee->id}}" class="btn btn-danger" id="employeeDbtn" ><i class="fas fa-trash"></i> </button>
                    </div>
                </td>   
            </tr>
            @empty
                <div colspan="14">No records found</div>
            @endforelse
        </tbody>
    </table>
</body>

<!-- Add Employee Modal -->
<div id="add_employees" class="modal custom-modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit">Add Employee</i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- add member--}}
            <div class="modal-body">
                <form action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Name:&nbsp;</label>
                                <input type="text" class="form-control" id="txtName" name="txtName"required>
                            </div>
                        </div>	


                        <div class="col-sm-6">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Designation:&nbsp;</label>
                                <input type="text" class="form-control" id="txtDesignation" name="txtDesignation"required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Email:&nbsp;</label>
                                <input type="email" class="form-control" id="txtEmail" name="txtEmail"required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Phone:&nbsp;</label>
                                <input type="text" class="form-control" id="txtPhone" name="txtPhone"required>
                            </div>
                        </div>

                      
                        <div class="col-sm-6">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Salary:&nbsp;</label>
                                <input type="number" class="form-control" id="txtSalary" name="txtSalary"required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary submit-btn" type="submit" name="btnCreate" style="width:80px;" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Employee Modal -->

<!-- Edit Employee Modal -->
<div id="editModal" class="modal custom-modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="{{url('employee-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
						<div class="col-sm-6">
							<div class="input-group mb-4">
								<input type="hidden" value="" id="cmbEmployeeId" name="cmbEmployeeId" >
                                <label class="col-form-label">Name:&nbsp;</label>
                                <input type="text" class="form-control" id="eName" name="txtName">
							</div>
						</div>	

                        <div class="col-sm-6">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Designation:&nbsp;</label>
                                <input type="text" class="form-control" id="eDesignation" name="txtDesignation">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Email:&nbsp;</label>
                                <input type="email" class="form-control" id="eEmail" name="txtEmail">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Phone:&nbsp;</label>
                                <input type="text" class="form-control" id="ePhone" name="txtPhone"required>
                            </div>
                        </div>

                      
                        <div class="col-sm-6">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Salary:&nbsp;</label>
                                <input type="number" class="form-control" id="eSalary" name="txtSalary"required>
                            </div>
                        </div>
					</div>

                    <!-- <div class="submit-section float-right">
                        <button type="button" class="btn btn-info" style="width:80px;" data-dismiss="modal">Cancle</button>
                        <input class="btn btn-primary submit-btn" type="submit"  name="btnUpdate" value="Update">
                    </div> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary submit-btn" type="submit"  name="btnUpdate" value="Update">
                        <!-- <input class="btn btn-primary submit-btn" type="submit" name="btnCreate" style="width:80px;" value="Add"> -->
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Employee Modal -->

<!-- Delete Employee Modal -->
<div class="modal custom-modal fade" id="delete_employee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Employee</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
                    <div class="modal-footer">
                        <form action="{{url('delete-employee')}}" method="post" >
                            @csrf
                            @method("DELETE")
                            <input type="hidden" id="delete_employeeId" name="d_employee">
                            <button type="submit" class="btn btn-danger continue-btn">Delete</button>		
                        </form>
                        <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-info cancel-btn">Cancel</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Employee Modal -->

<script>
$(document).ready(function(){
    $('#example').DataTable(
		{
			"dom": '<"dt-buttons"Bf><"clear">lirtp',
			"paging": true,
			"autoWidth": true,
			"buttons": [
				'colvis',
				'copyHtml5',
        'csvHtml5',
				'excelHtml5',
        'pdfHtml5',
				'print'
			]
		}
	); 
    
    $(document).on('click','#editemployee',function(){
        //  alert("ok");

        var eid=$(this).val();
        // alert(id);
        $('#editModal').modal('show');
        $.ajax({
            type: "GET",
            url: "/edit-employee/"+eid,
            success:function(response){
                $('#cmbEmployeeId').val(eid);		
                $('#eName').val(response.employee.name);
                $('#eEmail').val(response.employee.email);
                $('#ePhone').val(response.employee.phone);
                $('#eDesignation').val(response.employee.designation);
                $('#eSalary').val(response.employee.salary);
                
            }
        });
    });

    $(document).on('click','#employeeDbtn',function(){
        // alart("ok");
        var employee_id=$(this).val();
        $('#delete_employee').modal('show');
        $('#delete_employeeId').val(employee_id);
    });
});
</script>