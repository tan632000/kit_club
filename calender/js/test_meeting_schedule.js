let get_data = () =>{
	return new Promise((resolve, reject)=>{
		$.ajax({
			url : "./calender/action/read_data_database.php",
			type : "POST",
			data:{
				massage : '1'
			},
			cache : false,
			success : function(data){
				return resolve(data);
			},
			fail : function(xhr,textStatus){
				return reject(xhr);
			}
		});
	});
}
let tagetBefor = null;
let tagetAfter = null;
let arrDateStudent = new Array();
let result = null;
let keyList_person = null; // số người trong data
let keyList_date = null;   // sô ngày học của mỗi người
let keyList_lesson = null;  // số môn học trong mỗi ngày
get_data().then((data)=>{
	result = JSON.parse(data);
	show_data_meeting();
}).catch((e)=>{
	console.log(e);
})
let day = new Date();
let _today = day.getDate()
let _currentMonth = day.getMonth();
let _currentYear = day.getFullYear();


let calender = document.getElementsByClassName('table')[0];
let arr = ['date','1,2,3','4,5,6','7,8,9','10,11,12','13,14,15,16'];



function draw_table(){	 // vẽ bảng 
	
	let text;
	for(let i = 0 ; i <6 ;i++){
		let date = _today;
		let year = _currentYear;
		let month = _currentMonth;
		let line = document.getElementsByClassName(arr[i])[0]; 
		for(let j=0;j <20;j++){
			let daysInMonth = 32 - new Date(year, month, 32).getDate();  // lấy số ngày trong tháng 
			if(date > daysInMonth){
				date = 1;
				year = (month === 11) ? year + 1 : year;
				month = (month + 1) % 12;		
			}	
			if(i == 0){				
				let month_fake = month + 1;
				// text = document.createTextNode(date +'/'+month_fake+'/'+year);
				let check_day = new Date(year+','+month_fake+','+date);
				let x = check_day.getDay();
				if(x == 0) text = document.createTextNode(date +'/'+month_fake+'/'+year + '  (Chủ nhật)');
				else if(x == 1) text = document.createTextNode(date +'/'+month_fake+'/'+year + '  (Thứ hai)');
				else if(x == 2) text = document.createTextNode(date +'/'+month_fake+'/'+year + '  (Thứ ba)');
				else if(x == 3) text = document.createTextNode(date +'/'+month_fake+'/'+year + '  (Thứ tư)');
				else if(x == 4) text = document.createTextNode(date +'/'+month_fake+'/'+year + '  (Thứ năm)');
				else if(x == 5) text = document.createTextNode(date +'/'+month_fake+'/'+year + '  (Thứ sáu)');
				else if(x == 6) text = document.createTextNode(date +'/'+month_fake+'/'+year + '  (Thứ bảy)');
			}
			else{			
				text = document.createTextNode("  ");			
			}
			let cell = document.createElement("td");
			cell.classList.add(date +'/'+month+'/'+year+'+'+arr[i]);
			cell.appendChild(text);				
			line.appendChild(cell);
			date++;
		}	
	}
}

function import_data(_class , keyPersion){
	let td = $('td');
	for(let td_count = 0 ; td_count<td.length;td_count++){
		if($(td[td_count]).hasClass(_class)){   // kiểm tra class có tồn tại hay không
			let i =0;
			if(!arrDateStudent[_class])
				arrDateStudent[_class] = new Array();
			arrDateStudent[_class].push(keyPersion);


			let count = 0;

			_class = document.getElementsByClassName(_class)[0];
			count = _class.textContent ;
			count++;
			
			
			let text = document.createTextNode(count);
			 $(_class).html(text);
			
			if(keyPersion == 'HOÀNG ANH TUẤN'){
				_class.classList.add("bg-info");
			}
			// console.log(_class);
			break;
		}
	}
}

function show_data_meeting(){   // đưa data từ database vào bảng 
	keyList_person = Object.keys(result['data']);
	for(let i =0 ; i< keyList_person.length ;i++){
		keyList_date = Object.keys(result['data'][keyList_person[i]]);
		for(let j = 0 ; j<keyList_date.length; j++){
			// console.log(result['data'][keyList_person[i]][keyList_date[j]]);
			let time= keyList_date[j]*1000;
            time = new Date(time);
            time = time.getDate()+"/"+time.getMonth() +"/" + time.getFullYear();
			keyList_lesson = Object.keys(result['data'][keyList_person[i]][keyList_date[j]]);
			for(let k = 0 ; k< keyList_lesson.length ; k++){
				// console.log(result['data'][keyList_person[i]][keyList_date[j]][keyList_lesson[k]]);
				// console.log(keyList_date[j]);
				
				let _class ;
				// console.log(_class);
				let str = result['data'][keyList_person[i]][keyList_date[j]][keyList_lesson[k]];
				
				let str_1 = str.split(',');

				if(str_1.length > 4){
				
					let x = str_1[0] + ',' + str_1[1] + ',' + str_1[2]
					_class = time + '+' + x;
					// console.log(_class);
					
					import_data(_class, keyList_person[i]);
					let y = str.replace(/(\d,){3}/  , '');
					// console.log(y);
					_class = time + '+' + y;

					import_data(_class , keyList_person[i]);
				}
				else{
					_class = time+'+'+result['data'][keyList_person[i]][keyList_date[j]][keyList_lesson[k]];
					import_data(_class , keyList_person[i]);
				}

					
			}	
		}
	}
}


 $(document).ready(function(){
  $("td").click(function(){
  	let string = '';
  	let _class = this.className;
  	let str = _class.split(" ");
  	_class = str[0];
  	console.log(_class);
  	for(let i = 0 ;i < arrDateStudent[_class].length ; i++){
		let j = i+1;
		string += j +' : '+ arrDateStudent[_class][i]+ "<br>";  
	}	
	
	document.getElementById('demo_meeting').innerHTML = string;
  });
});

draw_table(_currentYear,_currentMonth);


