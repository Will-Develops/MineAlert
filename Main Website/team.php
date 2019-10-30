<?php
/*
** Including core initialization file
*/
require_once 'core/init.php';
?>
<?php
/*
** Set page header using the setHeader() function
*/
setHeader('Team');
?>
  <body>

<?php setNavigation('team'); ?>

    <div style="margin-top: 70px;" class="container">
		<div class="row">
            <div class="col-lg-12">
                <div class="well">
                    <div class="row text-center"><h1>MineAlert Team</h1></div>
                </div>
            </div>
        </div>
        	  <div class="row">
                <div class="col-lg-6">
                    <div class="well">
                       <div class="row text-center"><img style="border-radius:5px; display:inline-block; margin-left: 5px;" src="assets/img/team/Darkcop.png" /></div>
                           <div class="row text-center">                                    
                                <h1><a style="text-decoration: none;" href="profile/Darkcop">Darkcop</a></h1>
                                <img src="assets/img/glyphicons_003_user.png">
                                <p>Founder of MineAlert & Developer</p>
                                <img src="assets/img/glyphicons_010_envelope.png">  
                                <p>Will@MineAlert.net</p>
                           </div>            
                       </div>
                     </div>
               <div class="col-lg-6">
                  <div class="well">
                      <div class="row text-center"><img style="border-radius:5px; display:inline-block; margin-left: 5px;" src="assets/img/team/smellyjelly1998.png" /></div>
                          <div class="row text-center">
                               <h1><a style="text-decoration: none;" class="teamlinks" href="profile/smellyjelly1998">smellyjelly1998</a></h1>
                               <img src="assets/img/glyphicons_003_user.png">
                               <p>Co-Founder of MineAlert & Developer</p>
                               <img src="assets/img/glyphicons_010_envelope.png">  
                               <p>Jack@MineAlert.net</p>
                          </div>                
                      </div>
                  </div>
        	  </div>
        	  <div class="row">
                <div class="col-lg-6">
                  <!-- Another Staff Member Soon -->
                </div>
                
                <div class="col-lg-6">
                  <!-- Another Staff Member Soon -->
                </div>
        	  </div>
         </div>
	
<?php
setFooter();
?>
  </body>
</html>