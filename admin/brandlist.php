<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';?>

<?php

$brand = new Brand();
if(isset($_GET['delbrand'])){
	$id=$_GET['delbrand'];
	$deleteBrand=$brand->deleteBrandById($id);
}
?>


         <div class="main">
            <div class="main-box ">
                <h2>Brand List</h2>
                <div class="box-content">    
				<?php if(isset($deleteBrand))
                        echo $deleteBrand;
                ?>

				

                    <table class=" tabel-list " >
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
	<?php
		$getBrand=$brand->getAllBrands();
		if($getBrand){
			$index=0;
			while($result=$getBrand->fetch_assoc()){
				$index++;
	?>
					<tr >
							<td><?php echo $index; ?></td>
							<td><?php echo $result['brandName']; ?></td>
							<td><a href="brandedit.php?brandId=<?php echo $result['brandId']; ?>">Edit</a>
							 || <a onclick="return confirm('Are you sure?')" href="?delbrand=<?php echo $result['brandId']; ?>">Delete</a></td>
						</tr>
				<?php
			}
		}
			?>


					</tbody>
				</table>
               </div>
            </div>
        </div>


