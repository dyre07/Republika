<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Berita 
	  </h1>
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <div class="box-body">
			  <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>Id Berita</th>
                      <th>Title</th>
                      <th>Content</th>
                      <th>Kategori</th>
                      <th>Images</th>
                      <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
				    <?php
                        foreach($berita as $sh) {
			         ?>	
		
				<tr>
					<td><?php echo $sh['id_berita']; ?></td>
					<td><?php echo $sh['title']; ?></td>
					<td><?php echo $sh['content']; ?></td>
					<td><?php echo $sh['kategori']; ?></td>
					<!--<td><?php //echo $sh['image']; ?></td>-->
                    <td align="center"> <img style="display:block;" width="25%" src="http://localhost/republika/images/<?php echo $sh['image']?>" alt="<?php echo $sh['image']?>"/></td>
                    <td><a href="<?php echo base_url('admin/update/');?><?php echo $sh['id_berita'];?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></a></td>
                    <td><a href="<?php echo base_url('admin/delete/');?><?php echo $sh['id_berita'].'/'.$sh['image'];?>" onClick="return confirm('Are you sure want to delete this news?')" ><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
				</tr>
			<?php		
					}	
			?>				
				

				</tbody>
			   </table>
			  </div> 
			 </div>
			</div>	
		</div>
</section> 

