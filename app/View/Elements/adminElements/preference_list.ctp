<?php echo $this->Html->script('admin/AdminLTE/common.js'); ?>
<style>
#example tr th a{color:#fff;}
</style>
<div id="search_result">
<div class="box-body table-responsive margin-top-20">
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr class="info">
      <th style="text-align:center;">S no.</th>
			<th style="text-align:center;">Title</th>
      <th style="text-align:center;">Message</th>
			<th style="text-align:center;">Action</th>
		</tr>
   </thead>
    <tbody>
    <?php
    if(empty($infodata)){ ?>
      <td colspan="4" style="text-align:center;">No Preference Availabe !</td>			
    <?php }else{$count = $this->Paginator->counter('%start%');
    foreach($infodata as $data){
     
     ?>
        <tr>
      <td style="text-align:center; width: 80px;"><?php echo $count; ?></td>		
			<td style="text-align:left; font-size:12px; width: 250px;"><?php echo $this->Text->truncate(strip_tags($data['Preference']['title']),75,array('ending'=>' ...','exact'=>false));?></td>			
      <td style="text-align:left; font-size:12px; width: 500px;"><?php echo $this->Text->truncate(strip_tags($data['Preference']['message']),200,array('ending'=>' ...','exact'=>false));?></td>
			<td style="text-align:center; width:150px;">
				<?php $id = base64_encode(convert_uuencode($data['Preference']['id'])); ?>
 <!--  	if($data['Preference']['status']==1){
            $toggle_switch="fa-toggle-on";
          }else{
            $toggle_switch="fa-toggle-off";
          }-->
        
        
				<a title="" class="tooltips" href="<?php echo HTTP_ROOT."admin/users/edit_preference/".$id;?>"><i class="fa fa-lg fa-edit"></i><span>Edit</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
      <!--  <a title="" class="updateStatus tooltips" data-model="Preference" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg <?php echo $toggle_switch;?>"></i><span>Update Staus</span></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
        
        <a title="" class="delRec tooltips" data-model="Preference" data-controller="users/preference/" data-page="<?php echo $this->Paginator->current();?>" id="<?php echo $id;?>" href="javascript:void(0)"><i class="fa fa-lg fa-trash-o"></i><span>Delete</span></a>
        
      </td>
		</tr>
	<?php  $count++;} 
  }  ?>	 					
	</tbody>
</table>
</div>
<div class="box-header" data-info="<?php echo count($totaldata);?>">	
	<?php if(count($totaldata)>10){
	$this->Paginator->options(array(
						'update' => '#search_result',
						'evalScripts' => true,
						'before' => $this->Js->get('#loader_div')->effect('fadeIn', array('speed' => 'fast')),
						'complete' => $this->Js->get('#loader_div')->effect('fadeOut', array('speed' => 'fast'))
					));		
	echo $this->element('adminElements/table_head'); 
	echo $this->Js->writeBuffer();
}	?>
</div>

</div>

