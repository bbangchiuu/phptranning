<?php $this->load->view('template/headerSign') ?>
  

    <div class="container w-xxl w-auto-xs" ng-controller="SignupFormController" ng-init="app.settings.container = false;">
      <a href class="navbar-brand block m-t">Angulr</a>
      <div class="m-b-lg">
        <div class="wrapper text-center">
          <strong>Sign up to find interesting thing</strong>
        </div>
        <?php 
          if(isset($error)){
            echo $error;
          }
        ?>
        <form name="form" class="form-validation" action="http://localhost:8080/telesale/page_signup.html" method="post">
          <div class="text-danger wrapper text-center" ng-show="authError">
              
          </div>
          <div class="list-group list-group-sm">
            <div class="list-group-item">
              <input placeholder="Name" class="form-control no-border" ng-model="user.name" name="username" required>
            </div>

            <div class="list-group-item">
              <input type="email" placeholder="Email" class="form-control no-border" ng-model="user.email" name="email" required>
            </div>

            <div class="list-group-item">
               <input type="password" placeholder="Password" class="form-control no-border" name="password" ng-model="user.password" required>
            </div>
          </div>
          <div class="checkbox m-b-md m-t-none">
            <label class="i-checks">
              <input type="checkbox" ng-model="agree" required><i></i> Agree the <a href>terms and policy</a>
            </label>
          </div>
          <input type="submit" name="signupUser" class="btn btn-lg btn-primary btn-block" ng-click="signup()" ng-disabled='form.$invalid' value="Sign up">
          <div class="line line-dashed"></div>
          <p class="text-center"><small>Already have an account?</small></p>
          <a href="http://localhost:8080/telesale/page_signin.html" ui-sref="access.signin" class="btn btn-lg btn-default btn-block">Sign in</a>
        </form>
      </div>
      <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
        <p>
  <small class="text-muted">Web app framework base on Bootstrap and AngularJS<br>&copy; 2014</small>
</p>
      </div>
    </div>

<?php $this->load->view('template/footerSign') ?>
