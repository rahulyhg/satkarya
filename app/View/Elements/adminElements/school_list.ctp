<?php echo $this->Html->script('admin/AdminLTE/common.js'); ?>


<style>
#example tr th a{color:#fff;}
a.tooltips span{
width:60px;	
}
a:hover.tooltips span {
  margin-left: -30px;
}
</style>
<div id="search_result">
<div class="box-body table-responsive margin-top-20">
<table class="table table-bordered table-striped">
    <thead>
        <tr class="info"> 
			<th class="sorting_asc" style="text-align:center;">No.</th>
			<th class="sorting_asc" style="text-align:center;">School Name</th>
			<th class="sorting_asc" style="text-align:center;">Date</th>
			<th class="sorting_asc" style="text-align:center;">Action</th>
		</tr>
   </thead>
    <tbody>
    <?php if(empty($all_templates)){ ?>
      <td colspan="6" style="text-align:center; width: 30px;">No School yet.. ! </td>
    <?php }else{
    $i=$this->Paginator->counter('%start%');
    foreach($all_templates as $all_templates){?>
        <tr>
			<td style="text-align:center; width: 30px;"><?php echo $i; ?></td>		
			<td style="text-align:left; width: 150px;"><?php echo $all_templates['School']['school_name']; ?></td>
			<td style="text-align:left; width: 150px;"><?php echo $all_templates['School']['date']; ?></td>
			<td style="text-align:center; width: 120px;">
				
      <?php $id = base64_encode(convert_uuencode($all_templates['School']['id'])); 
          if(@$all_templates['School']['status']==1){
            $toggle_switch="fa-toggle-on";
          }else{
            $toggle_switch="fa-toggle-off";
          }
        ?>
				
				<a title="" class="tooltips" href="<?php echo HTTP_ROOT."admin/users/edit_school/".$id;?>"><i class="fa fa-lg fa-edit"></i><span>Edit</span></a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <a title="" class="delRec tooltips" data-model="School" data-controller="users/school/" data-page="<?php echo $this->Paginator->current();?>" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg fa-trash-o"></i><span>Delete</span></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
        <a title="" class="updateStatus tooltips" data-model="School" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg <?php echo $toggle_switch;?>"></i><span>Update Status</span></a>  		
      </td>
		</tr>
	<?php $i++; }
}  ?>	 					
	</tbody>
</table>
</div>
<div class="box-header" data-info="<?php echo count($total_news_template);?>">					
	<?php if(count($total_news_template)>10){
	$this->Paginator->options(array(
						'update' => '#search_result',
						'evalScripts' => true,
						'before' => $this->Js->get('#loader_div')->effect('fadeIn', array('speed' => 'fast')),
						'complete' => $this->Js->get('#loader_div')->effect('fadeOut', array('speed' => 'fast'))
					));		
	echo $this->element('adminElements/table_head'); 
	echo $this->Js->writeBuffer();		
		}

	?>
</div>
</div>