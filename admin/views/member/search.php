

<h2 style="margin-left:250px">Kết quả tìm thấy:</h2>
<hr>


<!-- /.col-lg-12 -->
    <table class="table table-bordered" style="width:1000px;margin-left:250px">
    <thead>
        <tr align="center">
        
            <th >STT</th>
            <th>AVATAR</th>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>CLASS</th>
            <th>ROLE</th>
            <th>FULLNAME</th>
            
            <th>ACTION</th>
            <th>PER</th>

     
        </tr>
    </thead>
    <tbody>

        <?php 
        if(1==1){

        $stt = 0;
        
            foreach($rows as $item){
            $stt++ ?>
        <tr class="table-content" align="center">

        <td><?php echo $stt;?></td>

            <td><img src="public/img/<?=$item['avatar']?>" width="55" height="55" alt=""></td>
            <td><?php echo $item['username'] ?></td>            
            <td><?php echo $item['email'] ?></td>
            <td><?php echo $item['phone'] ?></td>
            <td><?php echo $item['class'] ?></td>
            <td><?php echo $item['role'] ?></td>
            <td><?php echo $item['fullname'] ?></td>
            
             

            <td>
                <a  href="member/edit/<?php echo $item['id'];?>" >Sửa</a>
                <a onclick="return confirm('Bạn có muốn xóa không?')" href="member/delete/<?=$item['id'];?>">Xóa</a>

            </td>
            <td>
                <a  href="member/delete/<?php echo $item['id'];?>" >edit</a>
                

            </td>



            
            <!-- <td class="center"><a style="color:blue" href="admin.php/member/edit/<?php echo $item['id'] ?>">Edit</a></td> -->
        </tr>
    <?php } ?>

    </tbody>
</table>

<?php } else{ echo "<div class='col-md-12'><div class='row'><p>Not found.</p></div></div>"; } ?>
<?php



