<style>
 .sidebar {
 box-sizing: none;
 min-height: calc(110vh - 56px);
}
.sidebar.toggled :hover{
  overflow: visible;
  width: 100%;
}
hr.new4 {
  color:white;
}
.admin{
  color:white;
  padding:15px;
  margin-top:15px; 
}
hr.style-four {
    
    height: 12px;
    border: 0;
    box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5); 
}

  </style>      
        
      <ul class="sidebar navbar-nav" style="background-color: #253B80; color:white; ">
      <center><li><h5 class="admin">Admin</h5></li> </center>
      <center><li><h6>Welcome, <?php echo $username; ?></h6></li></center>
      <li><hr class="style-four"></li>   
        

        <?php if(current_url()=="http://localhost/tcpproject/Admin_User/login"){?>
        <li class="nav-item active"> 
        <?php }
        else{ ?>
        <li class="nav-item">
        <?php } ?>
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>        

         <?php if(current_url()=="http://localhost/tcpproject/admin/Customers"){?>
        <li class="nav-item active"> 
        <?php }
        else{ ?>
        <li class="nav-item">
        <?php } ?>
          <a class="nav-link" href="<?php echo base_url(); ?>admin/Customers">
            <i class="fas fa-list"></i>
            <span>Customer Input</span>
          </a>
        </li>

         <?php if(current_url()=="http://localhost/tcpproject/admin/Customers/view"){?>
        <li class="nav-item active"> 
        <?php }
        else{ ?>
        <li class="nav-item">
        <?php } ?>
          <a class="nav-link" href="<?php echo base_url(); ?>admin/Customers/view">
            <i class="fas fa-list"></i>
            <span>Customers View</span>
          </a>
        </li>

        <?php if(current_url()=="http://localhost/tcpproject/admin/Vehicles"){?>
        <li class="nav-item active"> 
        <?php }
        else{ ?>
        <li class="nav-item">
        <?php } ?>
          <a class="nav-link" href="<?php echo base_url(); ?>admin/Vehicles">
            <i class="fas fa-list"></i>
            <span>Vehicle Input</span>
          </a>
        </li>

        <?php if(current_url()=="http://localhost/tcpproject/admin/Vehicles/view"){?>
        <li class="nav-item active"> 
        <?php }
        else{ ?>
        <li class="nav-item">
        <?php } ?>
          <a class="nav-link" href="<?php echo base_url(); ?>admin/Vehicles/view">
            <i class="fas fa-list"></i>
            <span>Vehicles View</span>
          </a>
        </li>

    <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>Admin_User/logout">
      <i class="fas fa-sign-out-alt"></i>
            <span>Log Out</span></a>
        </li>

      </ul>

    
