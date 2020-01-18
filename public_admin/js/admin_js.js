// function show(){
// 	document.getElementsByClassName("col-md-2")[0].style.display = "block";
// 	document.getElementsByClassName("icon-content-back")[0].style.display = "block";
// 	document.getElementsByClassName("icon-content")[0].style.display = "none";
// }
// function hide(){
// 	document.getElementsByClassName("col-md-2")[0].style.display = "none";
// 	document.getElementsByClassName("icon-content-back")[0].style.display = "none";
// 	document.getElementsByClassName("icon-content")[0].style.display = "block";
// }

$(document).ready(function(){
	$(".icon-content").click(function(){
		$(".col-md-2").css({
			left: "0"
		});
		$(".icon-content").css({
            display: "none"
		});
		$(".icon-content-back").css({
            left: "205px"
		});
	});
	$(".icon-content-back").click(function(){
		$(".col-md-2").css({
			left: "-240px"
		});
		$(".icon-content").css({
            display: "block"
		});
		$(".icon-content-back").css({
            left: "-35px"
		});
	});
});
function opentabs(tabName){
	var i;
	var x=document.getElementsByClassName("content");
		for(i=0; i < x.length ; i++)
			{
				x[i].style.display="none";
			}
		document.getElementById(tabName).style.display="block";
}

// đổi background khi click thanh menu.
$(document).ready(function () {
	$(".item-menu-products").click(function() {
        // Clear
		$(".item-menu-products").removeClass("background");
		$(".item-menu-dashboard").removeClass("background");
        // Thêm Class
		$(this).addClass("background");
	});
	$('.item-menu-dashboard').click(function() {
        $(".item-menu-products").removeClass("background");
		$(this).addClass('background');
	});
});
// code phan trang
function pagination() {
    // let workin = false;
    let start = 0;
    let limit = 2;
    let stop = false;
    // let isBusy = false
    // z var request = new XMLHttpRequest();
    $data = $('#data');
    $('#news').scroll(function() {
        if ($('#news').scrollTop() >= $('#data').height() - $('#data').height()-10) {
            // alert(1);
            getData();
        }
    });
    $('#news').ready(function() {
        getData();

    });

    function getData() {
        if (stop) {
            return;
        }
        $.ajax({
            url: 'listPost.php',
            type: 'post',
            dataType: 'text',
            data: {
                getData: 1,
                start: start,
                limit: limit
            },
            success: function(response) {
                response = String(response);
                if(response == "stopped"){
                    console.log(1);
                    stop = true;
                }
                else{
                    start += limit;
                    $('#data').append(response);
                    return false;
                }
            },
            error: function(error) {
                // console.log(error.responseText);
            }
        });
        // return false;
    }

    // function cbGetData(result) {
    //     if (result.code == 200) {
    //         start += limit;
    //         $data.append(result.data);
    //         return false;
    //     }
    //     if (result.code == 202 && result.data == 'stopped') {
    //         stop = true;
    //         // return false;
    //     } else {
    //         alert('Somthing error!');
    //     }
    // }

}
// thao tac news
function newsAction() {
    $('#news').on('click', '.delete', function() {
        var check = confirm("Bạn muốn xóa bài viết này không ?");
        if (check == true) {
            var method = 'delete';
            var id = $(this).val();
            // console.log(id + "111");
            var image = $('img').attr('src');
            var clear = $(this);
            // console.log(image);
            $.ajax({
                url: 'Post.php',
                type: 'post',
                dataType: 'text',
                data: {
                    method: method,
                    id: id,
                    image: image
                    // getData: true
                },
                async: false,
                success: function(response) {
                    if (response == 'success') {
                        alert('Xóa bài viết thành công !!!');
                        clear.parents('tr').remove();
                    } else {
                        alert('Xóa bài viết thất bại.');
                    }
                }
            });
        } else {
            return false;
        }

    });
}
// mail to list
function notificationMail() {
    $(document).ready(function() {
        for (instance in CKEDITOR.instances)
            CKEDITOR.instances[instance].updateElement();
        $('#form-Mails').submit(function(e) {
            e.preventDefault();
            let listMail = $('#listMail').val();
            let title = $('#mail-title').val();
            let mailContent = CKEDITOR.instances.editor2.getData();
            if ($.trim(title) == '') {
                alert('Bạn chưa nhập tiêu đề');
                return false;
            }
            if ($.trim(listMail) == '') {
                alert('Bạn chưa nhập danh sách mail');
                return false;
            }
            //  alert(content);
            if ($.trim(mailContent) == '') {
                alert('Bạn chưa nhập nội dung');
                return false;
            }
            // xu li loading 
            let loading = new Loading({
                    title: "Đang xử lý vui lòng đợi."
                });
          $.ajax({
            url: "mail/sendMails.php",
            type: "POST",
            dataType:"json",
            data:{
                title: title,
                listMail: listMail,
                mailContent: mailContent
            },
            success: function(result){
                if(result==1){
                    loading.out();
                    alert("Gửi thành công !!!");
                }
                if(result==0){
                    loading.out();
                    alert("Xảy ra lỗi trong quá trình gửi");
                }
            }
          });
            return false;
        });
    });
}
