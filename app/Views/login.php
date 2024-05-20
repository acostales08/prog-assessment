<section class="vh-100" style="background-color: #508BFC;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow" style="border-radius: 1rem;">
          <div class="card-body p-5">
            <h3 class="mb-5  text-center">Sign in</h3>
            <form>
                <?php
                    include('app/Component/form/loginForm.php')
                ?>                
                <button class="btn btn-primary btn-md btn-block" id='btnOnSubmit'>Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>