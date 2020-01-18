

<h2>Kết quả tìm kiếm:</h2>
<div class="col-md-3"><div class="row">
<form action="admin.php/news/search/" type="GET">
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="s">
  </div>
</form>
</div></div>

<!-- /.col-lg-12 -->
    <table class="table table-bordered ">
        <thead>
            <tr align="center">
                <th>Number</th>
                <th>Image</th>
               
                <th>Name</th>
              
                <th>Content</th>
                <th>Author</th>
                <th>Date</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
        <?php
       

        $stt=0;
            foreach($rows as $item){
            $stt++; ?>
            <tr class="table-content" align="center">
                <td><?php echo $stt; ?></td>
                <td><img style="width: 120px;" src="public/img_news/<?php echo $item['images'] ?>" /></td>
               
                <td><?php echo $item['title'] ?></td>
                <td><?php echo $item['content'] ?></td>
                <td><?php echo $item['author']?></td>
                <td><?php echo $item['createdate'] ?></td>
                <td class="center"><a style="color:red" onclick="return confirm('Delete News?');" href="admin.php?url=news/delete/<?php echo $item['id'] ?>"> Delete</a></td>
                <td class="center"><a style="color:blue" href="admin.php?url=news/edit/<?php echo $item['id'] ?>">Edit</a></td>
                <td class="center"><a href="news/view/<?php echo $item['id'] ?>" target="_blank" style="color:green">View</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    


<?php





	require('admin/views/commons/footer.php');

