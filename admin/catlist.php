<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/Category.php'; ?>

<?php

$category = new Category();
if (isset($_GET['delcat'])) {
	$id = $_GET['delcat'];
	$deleteCategory = $category->deleteCategoryById($id);
}
?>


<div class="main">
            <div class="main-box ">
		<h2>Category List</h2>
		<div class="box-content">
			<?php if (isset($deleteCategory))
				echo $deleteCategory;
			?>



<table class=" tabel-list " >
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Category Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$getCategory = $category->getAllCategories();
					if ($getCategory) {
						$index = 0;
						while ($result = $getCategory->fetch_assoc()) {
							$index++;
					?>
							<tr >
								<td><?php echo $index; ?></td>
								<td><?php echo $result['catName']; ?></td>
								<td><a href="catedit.php?catId=<?php echo $result['catId']; ?>">Edit</a>
									|| <a onclick="return confirm('Are you sure?')" href="?delcat=<?php echo $result['catId']; ?>">Delete</a></td>
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

