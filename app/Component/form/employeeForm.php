<div class="row p-2">
    <div class="form-group col-md-12 mb-1">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" id="txtFullName" required>
    </div>
    <div class="form-group col-md-12 mb-1">
        <label class="form-label">Address</label>
        <input type="text" class="form-control" id="txtAddress" required>
    </div>
    <div class="form-group col-md-6 mb-1">
        <label class="form-label">Birth date</label>
        <input type="date" class="form-control" id="txtBirthDate" required>
    </div>
    <div class="form-group col-md-6 mb-1">
        <label class="form-label">Age</label>
        <input type="number" class="form-control" id="txtAge" required>
    </div>
    <div class="form-group col-md-6 mb-1 d-flex flex-column">
        <label class="form-label">Select gender</label>
        <div class="btn-group-vertical">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="male">
                <label class="form-check-label" for="genderMale">
                    Male
                </label>
            </div> 
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="female">
                <label class="form-check-label" for="genderFemale">
                    Female
                </label>
            </div>    
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="genderOther" value="other">
                <label class="form-check-label" for="genderOther">
                    Other
                </label>
            </div>             
        </div>
    </div>
    <div class="form-group col-md-6 mb-1">
        <label class="form-label">Civil Status</label>
        <select class="form-select" id="txtCivilStatus">
            <option disabled selected hidden>please choose</option>
            <option value="single">Single</option>
            <option value="married">Married</option>
            <option value="divorced">Divorced</option>
            <option value="widowed">Widowed</option>
        </select>        
    </div>
    <div class="form-group col-md-12 mb-1">
        <label class="form-label">Contact No.</label>
        <input type="tel" class="form-control" id="txtContactNo" pattern="\d*" placeholder="ex.09*********" required>
    </div>
    <div class="form-group col-md-12 mb-1">
    <div class="form-group col-md-12 mb-1">
        <label class="form-label">Salary</label>
        <input type="number" class="form-control" id="txtSalary" step="0.01" min="0" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Active Status</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="activeStatus" id="activeStatus">
            <label class="form-check-label" for="activeStatus">Active</label>
        </div>
    </div>
</div>
