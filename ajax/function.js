// JavaScript Document
function showscreen(){
	window.resizeTo(1040,650)
	var windowWidth = 1040;
	var windowHeight = 650;
	var xPos = (screen.width/2) - (windowWidth/2);
	var yPos = (screen.height/2) - (windowHeight/2);
	window.moveTo(xPos, yPos); 
	window.focus();
	document.getElementById('CustCode').focus();
}

function showcustpage(){
	if (document.getElementById('CustCode').value != ''){
		var custcode = document.getElementById('CustCode').value;
		var schs = document.getElementById('schs').value;
		var data = "custcode=" + custcode + "&schs=" + schs; 
		document.getElementById('a1').innerHTML = "กรุณารอสักครู่่ Loading..." + "<img src='images/preloader-01.gif' />";
		document.getElementById('a2').innerHTML = "กรุณารอสักครู่่ Loading..." + "<img src='images/preloader-01.gif' />";
		ajaxLoad('post', 'custpage.php', data,'a1');
		ajaxLoad('post', 'pointpage.php', data,'a2');
	}else{
		alert('กรุณาป้อนรหัสลูกค้า ให้ครบถ้วน..');	
	}
}

function checkKey(n){
  if (window.event.keyCode == 13){ //Enter
	  showcustpage();
  }else if(window.event.keyCode == 37){ //Left
	  //ChkKeyLeft(n,i)
  }else if(window.event.keyCode == 38){ //Up
	  //ChkKeyUp(n,i);
  }else if(window.event.keyCode == 39){ //Right
	  //ChkKeyRight(n,i);
  }else if(window.event.keyCode == 40){ //Down
	  //ChkKeyDown(n,i);
  }
}

/*
function opendata1(){
	var CsId = document.getElementById('select_cs').value;
	var CsRd = document.getElementById('select_rd').value;
	if (CsId != 0 && CsRd != 0) {
		var data = "CsId=" + CsId + "&CsRd=" + CsRd ;
		document.getElementById('a1').innerHTML = "กรุณารอสักครู่่ Loading..." + "<img src='images/preloader-01.gif' />";
		ajaxLoad('post', 'selectstockcountreal.php',data,'a1');
	}else{
		alert ("กรุณาเลือก Chount sheet และ รอบ!!")
	}
}

function opendata2(lo){
	//alert("OK");
	var CsId = document.getElementById('select_cs').value;
	var CsRd = document.getElementById('select_rd').value;
	if (CsId != 0 && CsRd != 0) {
		if (lo != 0 ){
			lo = lo;	
		}else{
			lo = document.getElementById("txtLocationS").value
		}
		var data = "CsId=" + CsId + "&CsRd=" + CsRd + "&lo=" + lo; 
		document.getElementById('a1').innerHTML = "กรุณารอสักครู่่ Loading..." + "<img src='images/preloader-01.gif' />"; 	
		ajaxLoad('post', 'fillterlocation.php',data,'a1');
	}else{
		alert ("กรุณาเลือก Chount sheet และ รอบ!!")
	}
}
function checkEnterAndRight(){
	if ((window.event.keyCode == 13) || (window.event.keyCode == 39)){
		var txtuser = document.getElementById('txtuser');
		var txtpass = document.getElementById('txtpass');
		if (txtuser.value != ''){
			txtpass.focus();
			txtpass.select();
		}else{
			alert('กรุณาป้อน Username');
			txtuser.focus();
			txtuser.select();	
		}
	}
}
function chekEnter(){
	if (window.event.keyCode == 13){
		var txtuser = document.getElementById('txtuser');
		var txtpass = document.getElementById('txtpass');
		if (txtuser.value != '' && txtpass.value != ''){
			checkuser();	
		}else if(txtpass.value==''){
			alert('กรุณาป้อน Password');
			txtpass.focus();
			txtpass.select();
		}else if(txtuser.value==''){
			alert('กรุณาป้อน Username');
			txtuser.focus();
			txtuser.select();	
		}
	}
}

function checkuser(){
	var txtuser = document.getElementById('txtuser');
	var txtpass = document.getElementById('txtpass');
	if (txtuser.value != '' && txtpass.value != ''){
		var data = "txtuser=" + txtuser.value + "&txtpass=" + txtpass.value;
		document.getElementById('txtprocess').innerHTML = "กรุณารอสักครู่่ Loading..." + "<img src='images/preloader-01.gif' />";	
		ajaxLoad('post', 'loginpage.php',data,'txtprocess');	
	}else{
		document.getElementById('txtprocess').innerHTML = "กรุณาป้อน Usernam และ Password ให้ครบถ้วน...";	
	}
}

function hidelogin(){
	//alert('you ok');	
}

function showlogin(){
	//alert('you not ok');	
}

function logout(){
	//alert('ok');
	document.getElementById('a1').innerHTML = "กรุณารอสักครู่่ Loading..." + "<img src='images/preloader-01.gif' />";
	ajaxLoad('post', 'logoutpage.php','','');	
	parent.window.location.reload(true);
}

function checkKey(n,i){
  if (window.event.keyCode == 13){ //Enter
	  ChkKeyDown(n,i);
  }else if(window.event.keyCode == 37){ //Left
	  ChkKeyLeft(n,i)
  }else if(window.event.keyCode == 38){ //Up
	  ChkKeyUp(n,i);
  }else if(window.event.keyCode == 39){ //Right
	  ChkKeyRight(n,i);
  }else if(window.event.keyCode == 40){ //Down
	  ChkKeyDown(n,i);
  }
}

function ChkKeyDown(n,i){
   var res = n.split("_");
   var resnext = parseInt(res[2]) + 1;
   var nnext = res[0] + "_" + res[1] + "_" + String(resnext);
   var next_el = document.getElementById(nnext);
   next_el.focus();
   next_el.select();
}
function ChkKeyUp(n,i){
   var res = n.split("_");
   var resnext = parseInt(res[2]) - 1;
   var nnext = res[0] + "_" + res[1] + "_" + String(resnext);
   var next_el = document.getElementById(nnext);
   next_el.focus();
   next_el.select();	
}
function ChkKeyRight(n,i){
   var res = n.split("_");
   var resnext = parseInt(res[1]) + 1;
   var nnext = res[0] + "_" + String(resnext) + "_" + res[2];
   var next_el = document.getElementById(nnext);
   next_el.focus();
   next_el.select();			
}
function ChkKeyLeft(n,i){
   var res = n.split("_");
   var resnext = parseInt(res[1]) - 1;
   var nnext = res[0] + "_" + String(resnext) + "_" + res[2];
   var next_el = document.getElementById(nnext);
   next_el.focus();
   next_el.select();			
}
function CalDiff(i){
   var atname = "txt_" + 1 + "_" + i;
   var btname = "txt_" + 2 + "_" + i;
   var diffname = "txt_" + 3 + "_" + i;
   var finalname = "txt_" + 4 + "_" + i;
   var avalue = document.getElementById(atname).value;
   var bvalue = document.getElementById(btname).value;
   var diffvalue = document.getElementById(diffname).value;
   var finalvalue = document.getElementById(finalname).value;
   diffvalue = Math.abs(avalue - bvalue);
   document.getElementById(diffname).value = diffvalue;
   if(diffvalue==0){
	 document.getElementById(finalname).value = avalue;  
   }else{
	 if (finalvalue === undefined || finalvalue === null) {
	 	document.getElementById(finalname).value = 0;  
	 }else{
	    document.getElementById(finalname).value = 0; //finalvalue;
     }
   }
}
function savedata(i,loca,goodc,csid,csrd,a2,b2){

   // i ==> แถวที่, loca ==> บ้านเลขที่ , goodc ==> รหัสสินค้า, csid ==> เลขที่ countsheet, csrd ==> รอบ 1=Top, 2=Sale
   
   if ((window.event.keyCode == 13) ||  (window.event.keyCode == 38) || (window.event.keyCode == 37) || (window.event.keyCode == 39) || (window.event.keyCode == 40)) { //Enter 37 กับ 39 ซ้าย ขวา ไม่ต้อง
    
   var atname = "txt_" + 1 + "_" + i;
   var btname = "txt_" + 2 + "_" + i;
   var diffname = "txt_" + 3 + "_" + i;
   var finalname = "txt_" + 4 + "_" + i;
   if (csrd == 1){
     var atop = document.getElementById(atname).value;
     var btop = document.getElementById(btname).value;
     var diffabtop = document.getElementById(diffname).value;
     var finaltop = document.getElementById(finalname).value;
	 //alert (finaltop);
	 var asale = a2;
     var bsale = b2;
     var diffabsale = Math.abs(asale-bsale);
	 if (diffabsale==0){
     	var finalsale = asale;
	 }else{
		 if (finaltop === undefined || finaltop === null) { 
			var finalsale = 0; 
		 }else{
			var finalsale = finaltop; 
		 }
	 }
	 
   }else if(csrd == 2){
	 var asale = document.getElementById(atname).value;
     var bsale = document.getElementById(btname).value;
     var diffabsale = document.getElementById(diffname).value;
     var finalsale = document.getElementById(finalname).value;
	 //alert (finalsale);
	 var atop = a2;
     var btop = b2;
     var diffabtop = Math.abs(atop-btop);
	 if (diffabtop== 0){
     	var finaltop = atop;
	 }else{
		if (finalsale === undefined || finalsale === null) { 
			var finaltop = 0; 
		}else{
			var finaltop = finalsale;
		}
	 }
   
   }
   
   var aall = parseInt(atop) + parseInt(asale);
   var ball = parseInt(btop) + parseInt(bsale);
   var diffaball = Math.abs(parseInt(aall) - parseInt(ball));
   if(diffaball==0){
	 var finalall = parseInt(aall);  
   }else{
	 var finalall = parseInt(ball);   
   }
   // alert (finaltop + ',' + finalsale + ',' + finalall);

   var data = "atop=" + atop + "&btop=" + btop + "&diffabtop=" + diffabtop + "&finaltop=" + finaltop ;
   data += "&asale=" + asale + "&bsale=" + bsale + "&diffabsale=" + diffabsale + "&finalsale=" + finalsale ;
   data += "&aall=" + aall + "&ball=" + ball + "&diffaball=" + diffaball + "&finalall=" + finalall ;
   data += "&goodc=" + goodc + "&loca=" + loca + "&csid=" + csid;
   //alert (data);
   ajaxLoad('post', 'updatedata.php',data,'a2');
   
   }
}

/*
function showmenupage(){
	document.getElementById('top_link_menu').innerHTML = "กรุณารอสักครู่่ Loading..." + "<img src='images/preloader-01.gif' />";
	ajaxLoad('post', 'posys/MenuPage.php', '','top_link_menu');
}
function buytopohd(){
	document.getElementById('a1').innerHTML = "กรุณารอสักครู่่ Loading..." + "<img src='images/preloader-01.gif' />";
	ajaxLoad('post', 'posys/buytopoinvhd.php','','a1');
}
function showtablename(){
	document.getElementById('a1').innerHTML = "กรุณารอสักครู่่ Loading..." + "<img src='images/preloader-01.gif' />";
	ajaxLoad('post','posys/tablename.php','','a1');	
}
function transfersch(){
	//alert('ok');
	document.getElementById('a1').innerHTML = "กรุณารอสักครู่่ Loading..." + "<img src='images/preloader-01.gif' />";
	ajaxLoad('post','posys/transfersch.php','','a1');		
}
function showfieldname(tbn){
	var data = "tbn=" + tbn;
	document.getElementById('tc1').innerHTML = "กรุณารอสักครู่่ Loading..." + "<img src='images/preloader-01.gif' />";
	ajaxLoad('post','posys/fieldname.php',data,'tc1');
}
function showfieldname2(tbn2){
	var data = "tbn2=" + tbn2;
	document.getElementById('tc2').innerHTML = "กรุณารอสักครู่่ Loading..." + "<img src='images/preloader-01.gif' />";
	ajaxLoad('post','posys/fieldname2.php',data,'tc2');
}
function moverec(tbn,lr,nr,btn){
	var data = "tbn=" + tbn + "&lastrec=" + lr + "&nowrec=" + nr + "&btnn=" + btn;
	//document.getElementById('alldatadiv').innerHTML = "กรุณารอสักครู่่ Loading..." + "<img src='images/preloader-01.gif' />";
	ajaxLoad('post','posys/moverec.php',data,'tc1');
}
function moverec2(tbn2,lr2,nr2,btn2){
	var data = "tbn2=" + tbn2 + "&lastrec2=" + lr2 + "&nowrec2=" + nr2 + "&btnn2=" + btn2;
	//document.getElementById('alldatadiv').innerHTML = "กรุณารอสักครู่่ Loading..." + "<img src='images/preloader-01.gif' />";
	ajaxLoad('post','posys/moverec2.php',data,'tc2');
}
function trndata(){
	//alert('ok');
	ajaxLoad('post','posys/potrndata.php','','rstrndiv');
}

function back_calendar(month_b,year_b){//เดือนที่แล้ว
	var data = "month=" + month_b + "&year=" + year_b;
	//alert(data);
	document.getElementById('prcalendar').innerHTML = 'Loading...';
	document.getElementById('prcalendar').innerHTML = "กรุณารอสักครู่่ Loading..." + "<img src='images/preloader-01.gif' />";
	ajaxLoad('post','posys/calendar.php',data,'prcalendar');
}

function next_calendar(month_n,year_n){//เดือนถุัดไป
	var data = "month=" + month_n + "&year=" + year_n;
	document.getElementById('prcalendar').innerHTML = 'Loading...';
	document.getElementById('prcalendar').innerHTML = "กรุณารอสักครู่่ Loading..." + "<img src='images/preloader-01.gif' />";
	ajaxLoad('post','posys/calendar.php',data,'prcalendar');
}
var statusc = 0;
var statusa = 1;
function search_date(elw){//เดือนที่ปัจจุบัน
 if(elw=='1'){
	var elv = document.getElementById('begindate').value;
	statusa =1;
 }else{
 	var elv = document.getElementById('enddate').value;
	statusa =2;
 }
	//alert(elv);
	var mystr = elv;
	var myarr = mystr.split("/");
	var myvarm = myarr[1];
	var myvary = myarr[2];
	//alert(myvarm + "\n" +  myvary);
	next_calendar(myvarm,myvary);
	if(statusc==0){
		document.getElementById('prcalendar').style.display='Block';
		statusc=1;	
	}else{
		document.getElementById('prcalendar').style.display='None';
		statusc=0;
	}
}
function add_rd(rd,rm,ry){//รับค่าวันที่ที่เลือกมา
	var data = "rd=" + rd + "&rm=" + rm + "&ry=" + ry;
	if(statusa==1){
		document.getElementById('begindate').value = rd + "/" + rm + "/" + ry; 
		document.getElementById('prcalendar').style.display='None';
		statusc=0;
	}else{
		document.getElementById('enddate').value = rd + "/" + rm + "/" + ry; 
		document.getElementById('prcalendar').style.display='None';
		statusc=0;
	}
	//ajaxLoad('post','hbr/d_harbor.php',data,'d_harbor');
	//ajaxLoad('post','hbr/show_harbor.php',data,'show_harbor');
}
function showtime2(tv,dv){
	if(tv==1){
		document.getElementById('demo1').style.display = "Block";
		document.getElementById('demo').style.display = "None";
		document.getElementById('adddemo').style.display = "None";
		document.getElementById('demo2').style.display = "None";
		document.getElementById('demo3').style.display = "None";
		document.getElementById('demo4').style.display = "None";
	}
	if(tv==2){
		document.getElementById('demo1').style.display = "None";
		document.getElementById('demo').style.display = "Block";
		document.getElementById('adddemo').style.display = "Block";
		document.getElementById('demo2').style.display = "None";
		document.getElementById('demo3').style.display = "None";
		document.getElementById('demo4').style.display = "None";		
	}
	if(tv==3){
		document.getElementById('demo1').style.display = "None";
		document.getElementById('demo').style.display = "None";
		document.getElementById('adddemo').style.display = "None";
		document.getElementById('demo2').style.display = "Block";
		document.getElementById('demo3').style.display = "None";
		document.getElementById('demo4').style.display = "None";		
	}
	if(tv==4){
		document.getElementById('demo1').style.display = "None";
		document.getElementById('demo').style.display = "None";
		document.getElementById('adddemo').style.display = "None";
		document.getElementById('demo2').style.display = "None";
		document.getElementById('demo3').style.display = "Block";
		document.getElementById('demo4').style.display = "None";		
	}
	if(tv==5){
		document.getElementById('demo1').style.display = "None";
		document.getElementById('demo').style.display = "None";
		document.getElementById('adddemo').style.display = "None";
		document.getElementById('demo2').style.display = "None";
		document.getElementById('demo3').style.display = "None";
		document.getElementById('demo4').style.display = "Block";		
	}
}
function hidetime2(tv,dv){
	if(tv==1){
		document.getElementById('demo1').style.display = "Block";
		document.getElementById('demo').style.display = "None";
		document.getElementById('adddemo').style.display = "None";
		document.getElementById('demo2').style.display = "None";
		document.getElementById('demo3').style.display = "None";
		document.getElementById('demo4').style.display = "None";
	}	
	if(tv==2){
		document.getElementById('demo1').style.display = "None";
		document.getElementById('demo').style.display = "Block";
		document.getElementById('adddemo').style.display = "Block";
		document.getElementById('demo2').style.display = "None";
		document.getElementById('demo3').style.display = "None";
		document.getElementById('demo4').style.display = "None";		
	}
	if(tv==3){
		document.getElementById('demo1').style.display = "None";
		document.getElementById('demo').style.display = "None";
		document.getElementById('adddemo').style.display = "None";
		document.getElementById('demo2').style.display = "Block";
		document.getElementById('demo3').style.display = "None";
		document.getElementById('demo4').style.display = "None";		
	}
	if(tv==4){
		document.getElementById('demo1').style.display = "None";
		document.getElementById('demo').style.display = "None";
		document.getElementById('adddemo').style.display = "None";
		document.getElementById('demo2').style.display = "None";
		document.getElementById('demo3').style.display = "Block";
		document.getElementById('demo4').style.display = "None";		
	}
	if(tv==5){
		document.getElementById('demo1').style.display = "None";
		document.getElementById('demo').style.display = "None";
		document.getElementById('adddemo').style.display = "None";
		document.getElementById('demo2').style.display = "None";
		document.getElementById('demo3').style.display = "None";
		document.getElementById('demo4').style.display = "Block";		
	}

}

function setinterval1(){
	var myVar=setInterval(function(){myTimer()},1000);
}
function myTimer(){
	var d=new Date();
	var t=d.toLocaleTimeString();
	var tt = "เวลาปัจจุบัน : " + t  ;
	document.getElementById("demo").innerHTML=tt;
	var tsd = document.getElementById('timeseteday').value;
	if(t==tsd){
		var ddd = new Date();
		var dd = new Date();
		dd.setDate(dd.getDate() - 1);
		var todayStr = ddd.getDate() + "/" + (ddd.getMonth()+1) + "/" + ddd.getFullYear();
		var yesterdayStr = dd.getDate() + "/" + (dd.getMonth()+1) + "/" + dd.getFullYear();
		if(document.getElementById('selectday').value==1){
			//alert (todayStr);
			var dayStr = todayStr;
		}else if(document.getElementById('selectday').value==2){
			//alert (yesterdayStr);
			var dayStr = yesterdayStr;	
		}
		var data = "begindate=" + dayStr;
		data = data + "&enddate=" + dayStr;
		data = data + "&wstore=" + document.getElementById('wstore').value;
		data = data + "&chtype=" + document.getElementById('chtype').value;
		
		if(document.getElementById('chk11').checked == true){
			data = data + "&chk1=" + 1;
		}else{
			data = data + "&chk1=" + 0;
		}
		if(document.getElementById('chk21').checked == true){
			data = data + "&chk2=" + 1;
		}else{
			data = data + "&chk2=" + 0;
		}
		if(document.getElementById('chk31').checked == true){
			data = data + "&chk3=" + 1;
		}else{
			data = data + "&chk3=" + 0;
		}
		
		//alert(data);
		document.getElementById('a2').innerHTML = 'Inserting...';
		document.getElementById('a2').innerHTML = "กรุณารอสักครู่่ กำลังโอนข้อมูลระบบซื้อ Inserting..." + "<img src='images/preloader-01.gif' />";
		ajaxLoad('post','posys/potrndata.php',data,'a2');
	}

}
function myStopFunction(){
	window.location.reload();
	//clearInterval(myVar);
}

timestatus = 1;
hh = 00;
mm = 00;
ss = 00;
function setMyInterval(){
	var myVar2=setInterval(function(){myTimer2()},1000);
	timestatus = 1;
}
remain = 60;
firsttimetest = 0;
function myTimer2(){
	if(firsttimetest==0){
		if(document.getElementById('timetype').value == 1){
			hh = 00;
			mm = document.getElementById('timeset1').value - 1;
			ss = 00;
		}else{
			hh = document.getElementById('timeset1').value - 1;
			mm = 59;
			ss = 00;
		}
	  firsttimetest=1;	
	}
	if(timestatus==1){
		if(remain>0){
			remain = remain - 1;		
		}else{
			if(hh>0 && mm>0){
				hh = hh -1;
				mm = mm -1;
			}else if(hh>0 && mm==0){
				hh = hh - 1;
				mm = 59;
			}else if(hh==0 && mm>0){
				hh == 00;
				mm = mm -1;	
			}else{
				hh == 00;
				mm = 00;
				firsttimetest=0;
			}
			remain = 59;	
		}
		ss=remain;
	}else if(timestatus==0){
		ss = 00;	
	}
	var ttt = hh + ' ชั่วโมง ' + mm + ' นาที ' + ss + ' วินาที ';
	var tttt = hh + ':' +  mm + ':' + ss;
	document.getElementById('demo11').innerHTML = tttt;
	if(hh==0 && mm==0 && ss==0){
		var ddd = new Date();
		var todayStr = ddd.getDate() + "/" + (ddd.getMonth()+1) + "/" + ddd.getFullYear();
		var dayStr = todayStr;
		var data = "begindate=" + dayStr;
		data = data + "&enddate=" + dayStr;
		data = data + "&wstore=" + document.getElementById('wstore').value;
		data = data + "&chtype=" + document.getElementById('chtype').value;
		
		if(document.getElementById('chk111').checked == true){
			data = data + "&chk1=" + 1;
		}else{
			data = data + "&chk1=" + 0;
		}
		if(document.getElementById('chk211').checked == true){
			data = data + "&chk2=" + 1;
		}else{
			data = data + "&chk2=" + 0;
		}
		if(document.getElementById('chk311').checked == true){
			data = data + "&chk3=" + 1;
		}else{
			data = data + "&chk3=" + 0;
		}
		
		//alert(data);
		document.getElementById('a2').innerHTML = 'Inserting...';
		document.getElementById('a2').innerHTML = "กรุณารอสักครู่่ กำลังโอนข้อมูลระบบซื้อ Inserting..." + "<img src='images/preloader-01.gif' />";
		ajaxLoad('post','posys/potrndata.php',data,'a2');
	}
		//alert ('OK');	
	
}
function myStopFunction2(){
	timestatus = 0;
	window.location.reload();
}

function delposys(){
	document.getElementById('a2').innerHTML = 'Delete...';
	document.getElementById('a2').innerHTML = "กรุณารอสักครู่่ Delete..." + "<img src='images/preloader-01.gif' />";
	ajaxLoad('post','posys/delallposys.php','','a2');	
}

function delsosys(){
	document.getElementById('a2').innerHTML = 'Delete...';
	document.getElementById('a2').innerHTML = "กรุณารอสักครู่่ Delete..." + "<img src='images/preloader-01.gif' />";
	ajaxLoad('post','sosys/delallsosys.php','','a2');	
}


function insertposys(){
	var data = "begindate=" + document.getElementById('begindate').value;
	data = data + "&enddate=" + document.getElementById('enddate').value;
	data = data + "&wstore=" + document.getElementById('wstore').value;
	data = data + "&chtype=" + document.getElementById('chtype').value;
	
	if(document.getElementById('chk1').checked == true){
		data = data + "&chk1=" + 1;
	}else{
		data = data + "&chk1=" + 0;
	}
	if(document.getElementById('chk2').checked == true){
		data = data + "&chk2=" + 1;
	}else{
		data = data + "&chk2=" + 0;
	}
	if(document.getElementById('chk3').checked == true){
		data = data + "&chk3=" + 1;
	}else{
		data = data + "&chk3=" + 0;
	}	
	if(document.getElementById('chk4').checked == true){
		data = data + "&chk4=" + 1;
	}else{
		data = data + "&chk4=" + 0;
	}	
	if(document.getElementById('chk5').checked == true){
		data = data + "&chk5=" + 1;
	}else{
		data = data + "&chk5=" + 0;
	}	
	//alert(data);
	document.getElementById('a2').innerHTML = 'Inserting...';
	document.getElementById('a2').innerHTML = "กรุณารอสักครู่่ กำลังโอนข้อมูลระบบซื้อ Inserting..." + "<img src='images/preloader-01.gif' />";
	ajaxLoad('post','posys/potrndata.php',data,'a2');
		
}
*/