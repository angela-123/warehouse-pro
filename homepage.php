<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            h2,h4{
                color:orangered;
                text-align:  center;
               
            }
            
            .rotating-item{
                display: none;
            }
            
            .rotating-items{
                display: none;
            }
            .rotating-item{
                color: red;
                text-align: center;
                font-size: 1em;
                font-weight: bolder;
            }
            
            
           .rotating-items{
                color: red;
                text-align: left;
                font-size: 1.2em;
            } 
            
             .rotating-itez{
                display: block;
            }
            
            .rotating-itez{
                text-align: center;
                font-size: 1.2em;
                font-weight: bolder;
                color: red;
            }
            
            .rotat-item{
                display: block;
                font-size: 1.2em;
                font-weight: bolder;
                color: darkred;
            }
            
            
        </style>
                                         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
                                         
                                        
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
         
‪<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        
        <script src="dinto.js"></script>
        
        
        <script src="vinto.js"></script>
        <script src="rondos.js"></script>
        <script src="tados.js"></script>
        <script src="janus.js"></script>
        <script src="ranus.js"></script>
        <script src="panus.js"></script>
        <script src="hanus.js"></script> 
        <script src="hundai.js"></script>
        <script src="vundai.js"></script>
        <script src="mundai.js"></script>
        <script src="mazda.js"></script>
        <script src="ford.js"></script>
        <script src="suzuki.js"></script>
        <script src="adverts.js"></script>
    </head>
    <body id="tulio">
        
        <script>
            $(document).ready(function(){
            $("#save").click(function()
            {  
                
               //var date = $("#dte").val();
               var username = $("#usname").val();
               var password = $("#pswd").val();
               //var shift = $("#shift").val();
               
               //var qty = $("#qty").val();
              
              //var recno = $("#recno").val();
              if(username === '')
              {
                  alert('Enter Username');
                  return;
              }
                
                $.ajax({
                    type:"POST",
                    url:"dajaf.php",
                    //data:"rdate="+date+"&guestname="+gname+"&menuitem="+kode+"&qty="+qty+"&rate="+rate+"&recno="+recno;
                    data:"username="+username+"&password="+password,
                     
                    success:function(data)
                    {
                       $("#info").html(data);
                       $("#tulio").html(data);
                       $("#fex").fadeOut(100);
                        $("#feex").fadeOut(100);
                         $("#fx").fadeOut(100);
                       
                    },
                    
                    error:function(data)
                    {
                        $("#info").html(data);
                        
                        
                    }
                    
                    
                });
            }
                    
                    );
            
    });
        </script>
        
        
        
        
        
        
        <div class="container-fluid" id="fexv">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12" style="background: orangered;">
                    <h2 style=" color:navy;">
                        AUTOSPARESCONNECT</h2>

                    <h4 style=" color: yellow;">Nigeria's Premier Online Auto Spare Parts Platform</h4>
                    
                    
                
            </div>
            </div>
            <div class="row" id="fx">
                <div class="col-md-12 col-sm-12 col-lg-12" style=" background: white;">
                    <div class="col-md-6 col-sm-6 col-lg-6" style=" background: white;">
                        <table class="table table-responsive table-hover table-striped table-bordered" style=" background: white">
                            <tr>
                                <td><img src="img/merko.jpg" class="img img-responsive img-rounded" height="300" width="300"></td>
                                <td>
                                    <h4 class="rotating-itemt" style=" color:black; font-weight:  bolder;">SPARE PARTS DEALERS IN ABUJA</h4>
                                    <h3 class="rotating-itemz" style=" color: blue; text-align: center"></h3>
                        
                        
                                </td>
                            </tr>
                            
                            <tr>
                                <td><img src="img/bmww.jpg" class="img img-responsive img-rounded" height="300" width="300"></td>
                                <td>
                                     
                                    <h4 class="rotating-itezi" style=" color: darkblue;">ABUJA MECHANICS</h4>
                        <h4 class="rotating-itez"></h4>
                        
                                    
                                </td>
                            </tr>
                            
                            
                            
                            
                        </table>
                        
                        <div class="jumbotron" style=" background: white; border: 1px #b9def0 solid;">
                            <h5 style=" color: orangered; text-align: center;font-size: 1.5em; color:  #039be5;">ADVERTISEMENTS</h5>
                            <h3 style=" text-align: center;color: darkblue;font-family: calibri; font-size: 1.3em; color: #323232;" id="adverts" >
                                
                            </h3>
                            
                        </div>
                        <nobr></nobr>
                    </div>
                    
                    
                    <div class="col-md-6 col-sm-6 col-lg-6">
                        <div class="col-md-5 col-sm-5 col-lg-5">
                        
                            <table class="table table-responsive table-bordered">
                                <thead>
                                    
                                <th style=" text-align: center;">FOR FULL ACCESS</th>
                                    
                               
                                </thead>
                                
                                <thead>
                                    
                                <th style=" text-align: center;">LOGIN OR SUBSCRIBE</th>
                                    
                               
                                </thead>
                                
                            <tr>
                                <td>username</td>
                                
                            </tr>
                            <tr>
                                <td><input type="text" id="usname" class="form-control"></td>
                                
                            </tr>
                            
                            
                            <tr>
                                <td>password</td>
                                
                            </tr>
                            
                            <tr>
                                <td><input type="password" id="pswd" class="form-control"></td>
                            
                            </tr>
                            <tr>
                                <td><input type="button" id="save" class="btn btn-default btn-lg" value="Login" style=" background: orangered;border: 0px orange solid; border-radius: 5px;"></td>
                            </tr>
                            <tr>
                                <td> <a href="newsignin.php" class="btn btn-primary btn-lg" style=" background:  #c09853;">Subscribe</a></td>
                                
                            </tr>
                            <tfoot>
                            <th style=" color:orangered; font-size: .75em;" ><nobr>FOR FURTHER DETAILS,CALL 08117535049</nobr></th>
                            </tfoot>
                            
                        </table>
                            
                            
                           
                        </div>
                        <div class="jumbotron col-md-6 col-sm-6 col-lg-6 col-sm-offset-1" style=" background: white; border: 1px #d3d3d3 solid; color: orangered;" >
                                        <h4 class="rotating-itezi">TOWING VANS</h4>
                                        <h5 class="rotat-item" style=" text-align: center; color: navy;"></h5>
                        
                            
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            
                                
                            </div>
                            </div>
                        
                    </div>
                    
                    
                </div>
                
            </div>
            
            
                
                
                
                <div class="col-md-12 col-sm-12 col-lg-12" style=" background:orangered;">
                    <div class="col-md-3 col-sm-3 col-lg-3" style=" border: 0px #1c94c4 solid; background:  wheat; border-radius: 5px;">
                        <h5>MERCEDES PARTS @:</h5>
                        <h4 class="tara"></h4>
                                 
                        
                    </div>
                    
                    <div class="col-md-3 col-sm-3 col-lg-3" style="border: 0px #204d74 solid; background: yellowgreen; border-radius: 5px;">
                        <h5 style="text-align:center;">PEUGEOT PARTS</h5>
                        <h4 class="taki"></h4>

                    </div>
                    
                    <div class="col-md-3 col-sm-3 col-lg-3" style="border: 0px #204d74 solid; background:  #b9def0; border-radius: 5px;">
                        <h5>NISSAN PARTS @</h5> 
                        <h4 class="roro"></h4>

                    </div>
                    
                    <div class="col-md-3 col-sm-3 col-lg-3" style="border: 0px #204d74 solid; background: burlywood; border-radius: 5px;">
                        <h5>PANEL BEATERS</h5> 
                        <h4 class="rose"></h4>

                        
                    </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-lg-12" style=" background:orangered;">
                    <div class="col-md-3 col-sm-3 col-lg-3" style=" border: 0px #1c94c4 solid; background:  #d3d3d3; border-radius: 5px;">
                        <h5>HONDA PARTS @</h5>
                        <h4 class="tose"></h4>

                        
                    </div>
                    
                    <div class="col-md-3 col-sm-3 col-lg-3" style="border: 0px #204d74 solid; background: #b9def0; border-radius: 5px;">
                        <h5 style="text-align:center;">HYUNDAI PARTS @</h5>
                        <h4 class="hose"></h4>

                    </div>
                    
                    <div class="col-md-3 col-sm-3 col-lg-3" style="border: 1px #204d74 solid; background: pink; border-radius: 5px;">
                        <h5>VOLKSWAGEN PARTS @</h5> 
                        <h4 class="vose"></h4>
                    </div>
                    
                    <div class="col-md-3 col-sm-3 col-lg-3" style="border: 1px #204d74 solid; background:  yellow;">
                        <h5>MITSUBISHI PARTS @</h5> 
                        <h4 class="mose"></h4>

                        
                    </div>
                </div>
                
            </div>
            <div class="col-md-12 col-sm-12 col-lg-12" style=" background:orangered;">
                    <div class="col-md-3 col-sm-3 col-lg-3" style=" border: 0px #1c94c4 solid; background:yellow; border-radius: 5px;">
                        <h5 style=" text-align: center;">HAULAGE COMPANIES</h5>
                        <h4 class="rtos"></h4>

                        
                    </div>
                    
                    <div class="col-md-3 col-sm-3 col-lg-3" style="border: 0px #204d74 solid; background: #b9def0; border-radius: 5px;">
                        <h5 style="text-align:center;">MAZDA PARTS @</h5>
                        <h4 class="mazda"></h4>

                    </div>
                    
                    <div class="col-md-3 col-sm-3 col-lg-3" style="border: 1px #204d74 solid; background: pink; border-radius: 5px;">
                        <h5>FORD PARTS @</h5>
                        <h4 class="ford"></h4>
 
                    </div>
                    
                    <div class="col-md-3 col-sm-3 col-lg-3" style="border: 1px #204d74 solid; background: #b9def0;">
                        <h5>SUZUKI,SKODA,OPEL PARTS @</h5> 
                        <h4 class="suzuki"></h4>

                        
                    </div>
                </div>
            
        </div>
        <script>
            $(document).ready(function() {	//start after HTML, images have loaded
    
    var jolt = ["Izuchukwu,Toyota,Utako","Wasiu Nafiu,Toyota,Kugbo","Odey Sunday","Kabiru Usman,Toyota,Banex","Kwaghsar Ikymie,Toyota,Nyanya"];
        
    

	var InfiniteRotates = 
	{
		pinit: function()
		{
			//initial fade-in time (in milliseconds)
			var initialFadeIn = 1000;
			
			//interval between items (in milliseconds)
			var itemInterval = 2500;
			
			//cross-fade time (in milliseconds)
			var fadeTime = 2500;
			
			//count number of items
			var numberOfItems = jolt.length;
                        //alert(numberOfItems);
                        //$('.rotating-items').html(jolt[0]);

			//set current item
			var currentItem = 0;
                       //alert(numberOfItems);
			//show first item
			$('.rotating-itez').html(jolt[currentItem]).eq(jolt[currentItem]).fadeIn(initialFadeIn);

			//loop through the items		
			var infiniteLoop = setInterval(function(){
				$('.rotating-itez').html(jolt[currentItem]).eq(jolt[currentItem]).fadeOut(fadeTime);

				if(currentItem === numberOfItems -1){
					currentItem = 0;
				}else{
					currentItem++;
				}
				$('.rotating-itez').html(jolt[currentItem]).eq(jolt[currentItem]).fadeIn(fadeTime);

			}, itemInterval);	
		}	
	};

	InfiniteRotates.pinit();
	
});


            
        </script>
        
        <?php
        // put your code here
        ?>
        <footer class="col-sm-12 col-md-12 col-lg-12" style=" background:yellow;">
            <h4 style=" color: blue;">autosparesconnect.com, powered by nextweb.io,c/o sober communications,block c1,suite 14,dutse model market,dutse alhaji,abuja,08117535049</h4>
            
        </footer>
    </body>
</html>
