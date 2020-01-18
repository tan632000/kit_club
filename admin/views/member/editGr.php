


<div class="col-md-10 content" >
    <div class="container">
        <div class="one">
            <h1 class="d-block p-2 bg-primary text-white">Chọn nhóm</h1>
            <h3 class="d-block p-2 bg-primary text-center"><?=$user['fullname']?></h3>
        </div>
        <div class="example">
            
                <div class="row">
                    <table class="table table-striped table-bordered">
                   
                        <thead>
                            <tr>
                                <th>Ban nhân sự</th>
                                <th>Ban truyền thông</th>
                                <th>Ban sự kiện</th>
                                <th>Ban hậu cần</th>
                                <th>AD trUyền thông</th>
                                <th>Ban hậu cần</th>
                                
                            </tr>
                        </thead>
                        <form action="" method="POST">
                        <tbody>

                            <tr>
                                <td><input value="1" type="checkbox" <?php if(isset($searchGr[0]['group_id'])) echo "checked";?>  name="Ban nhân sự"/></td>
                                <td><input value="2"  type="checkbox" <?php if(isset($searchGr[1]['group_id'])) echo "checked";?> name="Ban truyền thông"/></td>
                                <td><input value="3" type="checkbox" <?php if(isset($searchGr[2]['group_id'])) echo "checked";?> name="Ban sự kiện"/></td>
                                <td><input value="4" type="checkbox" <?php if(isset($searchGr[3]['group_id'])) echo "checked";?> name="Ban hậu cần"/></td>
                                <td><input value="5" type="checkbox" <?php if(isset($searchGr[3]['group_id'])) echo "checked";?> name="AD truyền thông"/></td>
                                <td><input value="6" type="checkbox" <?php if(isset($searchGr[3]['group_id'])) echo "checked";?> name="Admin"/></td>
                            </tr>
                        </tbody>
                        <button type="submit" class="btn btn-info" name="submit">Submit</button>
                        </form>
                    </table>
                </div>
            
        </div>
        
    </div>
  