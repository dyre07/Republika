  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php $a=$this->uri->segment(2); if($a != 'berita' || $a == 'update'){echo "active";}?> treeview">
          <a href="<?php echo base_url();?>">
            <i class="fa fa-leaf text-yellow"></i> <span>Data Berita</span>
          </a> 
        </li>
          
        <li class="<?php $a=$this->uri->segment(2); if($a=='berita'){echo "active";}?> treeview">
          <a href="<?php echo base_url('admin/berita');?>">
            <i class="fa  fa-plus text-aqua"></i>
            <span>Input Berita</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>