<?php 
if (@$_GET['res']=='sukses') {
echo '<div class="card-body">
	    <div class="alert alert-primary alert-dismissible show fade">
	      <div class="alert-body">
	        <button class="close" data-dismiss="alert">
	          <span>&times;</span>
	        </button>
	        '.ucwords(@$_GET['act']).' Berhasil <i class="fas fa-check"></i>
	      </div>
	    </div>
	  </div>';
}elseif (@$_GET['res']=='gagal'){
echo ' <div class="card-body">
	    <div class="alert alert-danger alert-dismissible show fade">
	      <div class="alert-body">
	        <button class="close" data-dismiss="alert">
	          <span>&times;</span>
	        </button>
	        '.ucwords(@$_GET['cau']).' '.ucwords(@$_GET['act']).' Gagal <i class="fas fa-exclamation-triangle"></i>
	      </div>
	    </div>
	  </div>';
}elseif (@$_GET['res']=='belum'){
echo ' <div class="card-body">
	    <div class="alert alert-danger alert-dismissible show fade">
	      <div class="alert-body">
	        <button class="close" data-dismiss="alert">
	          <span>&times;</span>
	        </button>
	        Login Terlebih Dahulu <i class="fas fa-exclamation-triangle"></i>
	      </div>
	    </div>
	  </div>';
}
?>