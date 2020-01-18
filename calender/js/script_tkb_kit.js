let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();
let selectYear = document.getElementById("year");
let selectMonth = document.getElementById("month");

let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
let monthAndYear = document.getElementById("monthAndYear");


let getData = () =>{
    return new Promise((resolve,reject)=>{
        $.ajax({
            url: "../kit_club/calender/action/read_data_database.php",
            type: 'POST',
            data :{
                massage : '2'
            },
            cache: false,
            dataType: 'json',
            success: function(data){
                return resolve(data);
            },
            fail:function(xhr,textStatus){
                return reject('error');
            }
        }); 
    });
}

let schedule = null;
getData().then((data)=>{
    schedule = data;
    showCalendar(currentMonth, currentYear);
}).then(()=>{
    console.log(schedule);
})
.catch((e)=>{
    console.log(e);
})

function get_lesson_from_data(date ,month ,year){
    let length , time_1 , time_2 , x = '';    
    let keyList = Object.keys(schedule["data"]);
    for(let i =1 ;i<date ; i++){
        y=0;
        x = "."+i;
        time_1 = year + "," + month + "," + i ;
        for (let key = 0 ; key < keyList.length  ; key++){
            time_2= keyList[key]*1000;
            time_2 = new Date(time_2);
            time_2 = time_2.getFullYear()+","+time_2.getMonth() +"," + time_2.getDate();
            if(time_1 === time_2){ 
                length = schedule["data"][keyList[key]].length;
                for(let j=0 ; j < length ; j++){ 
                    let icon = document.createElement("icon");   
                    $("icon").addClass("fa fa-circle icon");
                    $(x).append(icon);           
                }
                break;     
            }
        }

    } 

    for(let i = date -1 ; i>=1 ; i-- ){
        y=0;
        x = "."+i;
        time_1 = year + "," + month + "," + i ;
        for (let key = keyList.length ; key >=1  ; key -- ){
            time_2= keyList[key]*1000;
            time_2 = new Date(time_2);
            time_2 = time_2.getFullYear()+","+time_2.getMonth() +"," + time_2.getDate();
            if(time_1 === time_2){ 
                length = schedule["data"][keyList[key]].length;
                for(let j=0 ; j < length ; j++){ 
                    let icon = document.createElement("icon");   
                    $("icon").addClass("fa fa-circle icon");
                    $(x).append(icon);  
                    return 1;         
                }    
            }
        }
    }    
}
function show_data(date , month , year){
    let  time_1 , time_2 , length;
    let string = '';
    let string_data = '';   
    time_1 = year + "," + month + "," + date ;
    document.getElementById('_demo_view_schedule_admin').innerHTML = string;
    let keyList = Object.keys(schedule["data"]);    
    for (let key = 0 ; key < keyList.length  ; key++){
        time_2= keyList[key]*1000;
        time_2 = new Date(time_2);
        time_2 = time_2.getFullYear()+","+time_2.getMonth() +"," + time_2.getDate();
        if(time_1 === time_2){ 
            length = schedule["data"][keyList[key]].length;
            for(let i=0 ; i < length ; i++){
                string_data += "tiết học : " + schedule['data'][keyList[key]][i].lesson + "<br>";
                string_data += "giáo viên : " + schedule['data'][keyList[key]][i].teacher + "<br>";
                string_data += "môn học : " + schedule['data'][keyList[key]][i].name + "<br>";
                string_data += "địa điểm : " + schedule['data'][keyList[key]][i].adress + "<br><br>";
            }   
            break;     
        }
    }
    console.log(string_data);
    document.getElementById('_demo_view_schedule_admin').innerHTML = string_data;
    
}
    
function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);  
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}

function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
}




function showCalendar(month, year) {

    let firstDay = (new Date(year, month)).getDay();
    
    let daysInMonth = 32 - new Date(year, month, 32).getDate();

    let tbl = document.getElementById("calendar-body"); // body of the calendar

    // clearing all previous cells
    tbl.innerHTML = "";

    // filing data about month and in the page via DOM.
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;

    // creating all cells
    let date = 1;
    for (let i = 0; i < 6; i++) {
        // creates a table row
        let row = document.createElement("tr");

        //creating individual cells, filing them up with data.
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {
                let cell = document.createElement("th");
                let cellText = document.createTextNode(' ');
                cell.appendChild(cellText);
                row.appendChild(cell);
            }
            else if (date > daysInMonth) {
                break;
            }

            else {
                let cell = document.createElement("th");
                cell.classList.add('' + date);  // add class to 'td'
                
                let cellText = document.createTextNode(date +"\n\n");
                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.classList.add("bg-info");
                } // color today's date
                
                cell.appendChild(cellText);
                row.appendChild(cell);
                date++;
            }
        }

        tbl.appendChild(row); // appending each row into calendar body.
        tbl.style.cursor = 'pointer'; // add pointer to calender 
    }
    get_lesson_from_data(date , month , year); // add circel to td
    date--;   
    
    let check=document.getElementById("calendar-body");
    function aline(event){       
        for(let i = 1 ; i <= date ;i++ ){                   
            $('.'+i).removeClass("bg-info");
        }

        let day = event.target.innerHTML[0]+event.target.innerHTML[1] ; 
        let target = '.'+event.target.innerHTML[0]+event.target.innerHTML[1] ; 
        day=parseInt(day.trim());
        console.log(day);
        target = target.trim();
        show_data(day , month , year ); // show data

        $(target).addClass("bg-info");
    }
    check.addEventListener("click",aline,false);



}


