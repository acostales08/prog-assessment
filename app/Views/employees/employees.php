
<section class="container p-4">
    <div class="row">
        <div class="col-md-3 p-0 mt-4">
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#crudModal" onclick="updateModalContent('create')">
             add employee
        </button>          
        </div>
        <div class="card p-2 mt-2">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead style="font-size: 14px;">
                            <tr>
                                <th scope="col">Record ID</th>
                                <th scope="col">Employee Fullname</th>
                                <th scope="col">Address</th>
                                <th scope="col">Birth Date</th>
                                <th scope="col">Age</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Civil Status</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">Salary</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableData" style="font-size: 14px;">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>