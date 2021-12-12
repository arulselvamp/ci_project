<style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
.drop-down {
  text-align: left;
  display: inline;
  margin: 0;
  padding: 15px 4px 17px 0;
  list-style: none;
  -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
}

.drop-down li {
  font: bold 12px/18px sans-serif;
  display: inline-block;
  margin-right: -4px;
  position: relative;
  padding: 15px 20px;
  background: #fff;
  cursor: pointer;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -ms-transition: all 0.2s;
  -o-transition: all 0.2s;
  transition: all 0.2s;
}

.drop-down li:hover {
  background: grey;
  color: #fff;
}

.drop-down li ul {
  padding: 0;
  position: absolute;
  top: 48px;
  left: 0;
  width: 150px;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  display: none;
  opacity: 0;
  visibility: hidden;
  -webkit-transiton: opacity 0.2s;
  -moz-transition: opacity 0.2s;
  -ms-transition: opacity 0.2s;
  -o-transition: opacity 0.2s;
  -transition: opacity 0.2s;
}

.drop-down>li:last-child ul {
  right: 4px;
  left: auto;
}

.drop-down li ul li {
  background: #555;
  display: block;
  color: #fff;
  text-shadow: 0 -1px 0 #000;
}

.drop-down li ul li:hover {
  background: black;
}

.drop-down li ul li i:hover {
  background: black;
}

.drop-down li:hover ul {
  display: block;
  opacity: 1;
  visibility: visible;
  background: black;
}
</style>
<nav class="navbar navbar-expand navbar-dark static-top" style="background-color: ; color:black;">    
            <a class="navbar-brand mr-1" href="index.html"></a>       
            <button class="btn btn-link btn-sm text-blue order-1 order-sm-0" id="sidebarToggle" href="#">
              <i class="fas fa-bars"></i>
            </button>

             <img src="<?php echo base_url('images/tcp_logo.png'); ?>" alt="No Image" width="350"
         height="80" class="center"><br> 

         <ul class="drop-down" style="background: white;">          
          <li class="drop-button" style="background: white;"><i class="fa fa-caret-down fa-2x" aria-hidden="true"></i>
            <ul>
              <li><a style="text-decoration: none;color: white;" href="#">Change Password</a></li>
              <li><a style="text-decoration: none;color: white;" href="<?php echo base_url(); ?>Admin_User/logout">Logout</a></li>
            </ul>
          </li>
        </ul>
              
          </nav>