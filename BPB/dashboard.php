<!doctype html>
<html lang="en" dir="ltr">
<?php

include('header-system.php');

?>

<div class="my-3 my-md-5 app-content">
    <div class="side-app">
        <div class="page-header">
            <ol class="breadcrumb1">
                            <li class="breadcrumb-item1 active">User Management</li>
                            <li class="breadcrumb-item1 active">Register User </li>
            </ol>

        </div>
        <div class="col-lg-12">
                <form class="card" method="POST" action="insertUserAdd.php"  enctype="multipart/form-data">
                    <div class="card-header">
                        <h3 class="card-title">Register User</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="name" id="name" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" name="phone" id="phone" >
                                </div>
                            </div>
                             <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Package</label>
                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="package" id="package">
                                            <option label="Choose one"></option>
                                            <option value="Beginner">Package Beginner</option>
                                            <option value="Expert">Package Expert</option>
                                     </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control" name="password" id="password" >
                                </div>
                            </div>                                            
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" name="submit" class="btn btn-primary" >Register User</button>
                    </div>
                </form>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                    <div class="card-status bg-azure br-tr-3 br-tl-3"></div>
                    <div class="card-header">
                        <h3 class="card-title">Record All Client</h3>
                    </div>
                    <div class="card-body">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default active">
                                <div class="panel-heading " role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">

                                            Client Package Beginner
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">                            
                                    <div class="card-body">
                                        <div class="table-responsive">
                                       
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-20p">Name Client</th>
                                                        <th class="wd-20p">Contact</th>
                                                        <th class="wd-20p">email</th>
                                                        <th class="wd-20p">package</th>
                                                        <th class="wd-20p" >Action</th>
                                                        <th class="wd-20p" >Action</th>



                                                    </tr>
                                                </thead>
                                                <tbody>
                                            
                                                
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td style="text-align: center;vertical-align: middle;" >
                                                            <a href="registerUserEdit.php?id=<?php  ?>">
                                                              <button type="submit" name="update" id="update" class="btn btn-info btn-sm">
                                                                  <i class="fa fa-pencil"></i>&nbsp;&nbsp;Update  </button></a>
                                                            </td><td>
                                                           <a href="registerUserDelete.php?id=<?php ?>" class="btn btn-del btn-danger">Delete</a>

                                                            </td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default mt-2">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                                            Client Package Expert
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="card-body">
                                        <div class="table-responsive">
                                            
                                            <table id="example1" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                         <th class="wd-20p">Name Client</th>
                                                        <th class="wd-20p">Contact</th>
                                                        <th class="wd-20p">email</th>
                                                        <th class="wd-20p">package</th>
                                                        <th class="wd-20p">Action</th>
                                                        <th class="wd-20p">Action</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                        <tr>
                                                          <td></td>
                                                          <td></td>
                                                          <td></td>
                                                          <td></td>
                                                            <td style="text-align: center;vertical-align: middle;" >
                                                            <a href="registerUserEdit.php?id=<?php ?>">
                                                              <button type="submit" name="update" id="update" class="btn btn-info btn-sm">
                                                                  <i class="fa fa-pencil"></i>&nbsp;&nbsp;Update  </button></a>
                                                            </td><td>
                                                            
                                                            <a href="registerUserDelete.php?id=<?php ?>" class="btn btn-del btn-danger">Delete</a>
                

                                                            </td>

                                                        </tr>
                                                
                                                </tbody>
                                            </table>
                                            
                                            <?php if(isset($_GET['s'])): ?>
                                                <div class="flash-data" data-flashdata="<?= $_GET['s'];?>"></div>
                                            <?php endif; ?>
                                                                                        
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- panel-group -->
                    </div>
                </div>
    </div>
</div>
            </div>

        </div>
    </div>

<?php 
include('footer-system.php');
?>
