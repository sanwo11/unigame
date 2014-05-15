<?php require_once("api/class/initialize.php");?>
<?php
	$country = Country::find_all();
	$courses = Course::find_all();
	$mschools = school::find_all();
	$study_level = StudyLevel::find_all();	
?>
<?php
	if(isset($_POST['searchbyall'])){
		// countryname coursename
		$countryname = $_POST['countryname'];
		$coursename = $_POST['coursename'];
	//	$amount = $_POST['amount'];
			
		redirect_to("searchall.php?url=".$countryname."&& st=".$coursename);	 
	}
?>
<div class="container">
                
                <!-- ONLY LOGO ON HEADER -->
                <div class="only-logo">
                    <div class="navbar">
                        <div class="navbar-header">
                        	<a href="index.php">
                            <img src="public/images/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                </div> <!-- /END ONLY LOGO ON HEADER -->
        
                
                <div class="row home-contents text-left">
                	<div class="col-sm-12">
                    	<div class="formitemsholder">
                        	<form role="form" class="form-horizontal" action="" method="post">
                            	<div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon"><i class="icon_search"></i></span>
                                                <input name="keywords" class="form-control" type="text" placeholder="Please enter your search query">
                                            </div>
                                        </div>
                                     </div>
                                </div>
                                
                                <div class="row">
                                	<div class="col-sm-4 padded">
                                    	<div class="form-group">
                                        	<select class="input-lg form-control" name="countryname">
                                            	<option>Select country</option>
                                                <?php foreach($country as $ctry):?>
                                                <option value="<?php echo $ctry->id?>"><?php echo $ctry->main_name; ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 padded">
                                    	<div class="form-group">   
                                            <select class="input-lg form-control">
                                                <option>Select school</option>
                                                <?php foreach($mschools as $ctry):?>
                                                <option value="<?php echo $ctry->id?>"><?php echo $ctry->main_name; ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 padded">
                                    	<div class="form-group"> 
                                            <select class="input-lg form-control" name="coursename">
                                                <option>Select course</option>
                                                <?php foreach($courses as $ctry):?>
                                                <option value="<?php echo $ctry->id?>"><?php echo $ctry->main_name; ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                            	</div>
                                
                                <div class="row text-right">
                                     <input type="submit" value="search" class="btn btn-studysearch btn-lg" data-toggle="modal" data-target=".bs-modal-sm" name="searchbyall" />
                                </div>
                            </form>
                        </div>
                    </div>                    
                </div>
                <!-- /END ROW -->
                
            </div>