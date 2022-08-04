<?php 
  include('header.php');
?>

<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 50px auto;
  font-family: Raleway;
  padding: 20px;
  width: 100%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #D31D23;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #D31D23;
}
</style>

<div class="page-banner-area bg-2">
  <div class="d-table">
    <div class="d-table-cell">
      <div class="container">
        <div class="page-content">
          <h2>Physiomobile: e-physio</h2>
          <ul>
            <li><a href="index1.php">Home</a></li>
            <li>Physiomobile: e-physio</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="about-area ptb-100" style="background: #F5F5F5;">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="about-img">
            <div class="main-img"><img src="assets/img/all-image-website/e-physio.jpeg" alt="Image">
              <div class="shape-1"><img src="assets/img/shapes/shape-3.png" alt="Shape"></div>
              <div class="shape-2"><img src="assets/img/shapes/shape-3.png" alt="Shape"></div>
              <div class="shape-3"><img src="assets/img/shapes/shape-4.png" alt="Shape"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="about-text">
            <div class="section-title-two">
              <h2>Physiomobile: e-physio</h2>
              <p style="text-align: justify;">SME PRIHATIN is an essential to help employee to improve the physical health problem by manual physiotherapy technique. Through SME PRIHATIN treatment, employee will be covered for outpatient physiotherapy treatment easily.</p>
            </div>
            <?php
               if(isset($_GET['message'])){
                   $message = $_GET['message'];
                   echo $message;
               }
              ?>
            <div class="appointment-form">
              <!-- <form id="regForm" action="smeinquiry.php" enctype="multipart/form-data">
                <div class="tab">
                  <label>Company Name</label>
                  <p><input oninput="this.className = ''" name="companyname" id="companyname"></p>
                  <label>Company Email</label>
                  <p><input oninput="this.className = ''" name="companyemail" id="companyemail"></p>
                  <label>Company phone number</label>
                  <p><input oninput="this.className = ''" name="companyphone" id="companyphone"></p>
                  <label>Business Registration Number</label>
                  <p><input oninput="this.className = ''" name="companybusiness" id="companybusiness"></p>
                  <label>Company Address</label>
                  <p><input oninput="this.className = ''" name="companyaddress" id="companyaddress"></p>
                </div>
                <div class="tab">
                  <label>Director/ Person in charge Name</label>
                  <p><input oninput="this.className = ''" name="chargename" id="chargename"></p>
                  <label>Position/ Title</label>
                  <p><input oninput="this.className = ''" name="position" id="position"></p>
                  <label>Phone Number </label>
                  <p><input oninput="this.className = ''" name="phone" id="phone"></p>
                  <label>Email </label>
                  <p><input oninput="this.className = ''" name="email" id="email"></p>                  
                </div>
                <div style="overflow:auto;">
                  <div style="float:right;">
                    <br>
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                  </div>
                </div>
              
                <div style="text-align:center;margin-top:40px;">
                  <span class="step"></span>
                  <span class="step"></span>
                </div>
              </form> -->
              <form method="POST" action="smeinquiry.php"  enctype="multipart/form-data">
                <div class="row">
                <div class="col-lg-12">
                  <label>Company Name</label>
                  <div class="form-group"><input type="text" class="form-control" id="companyname" name="companyname" placeholder="Company Name"></div>
                </div>
                <div class="col-lg-12">
                  <label>Company Email</label>
                  <div class="form-group"><input type="email" class="form-control" id="companyemail" name="companyemail" placeholder="Company Email"></div>
                </div>
                <div class="col-lg-12">
                  <label>Company Phone Number</label>
                  <div class="form-group"><input type="text" class="form-control" id="companyphone" name="companyphone" placeholder="Enter Contact number"></div>
                </div>
                <div class="col-lg-12">
                  <label>Business Registration Number</label>
                  <div class="form-group"><input type="text" class="form-control" id="companybusiness" name="companybusiness" placeholder="Enter Contract number"></div>
                </div>
                <div class="col-lg-12">
                  <label>Company Address</label>
                  <div class="form-group">
                    <textarea class="form-control" rows="6" cols="6" placeholder="Write your message" name="companyaddress" id="companyaddress"></textarea>
                </div>
              </div>
                <!-- <div class="col-lg-12">
                  <label>Director/ Person in charge Name</label>
                  <div class="form-group"><input type="text" class="form-control" id="name" name="name" placeholder="Company Name"></div>
                </div>
                <div class="col-lg-12">
                  <label>Position/ Title</label>
                  <div class="form-group"><input type="text" class="form-control" id="name" name="name" placeholder="Company Name"></div>
                </div> 
                <div class="col-lg-12">
                  <label>Phone Number </label>
                  <div class="form-group"><input type="text" class="form-control" id="name" name="name" placeholder="Company Name"></div>
                </div> 
                <div class="col-lg-12">
                   <label>Email </label>
                  <div class="form-group"><input type="text" class="form-control" id="name" name="name" placeholder="Company Name"></div>
                </div>   -->  
                  <div class="appointment-btn">
                    <button type="submit" name="submit" id="submit" class="default-btn three">
                    Apply SME Perihatin<span></span>
                    </button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

<?php
  include('footer.php');
 ?>