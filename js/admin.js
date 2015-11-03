/*admin control js*/
	
/*get shortcut data by id*/
function get_shortcut_data(shortcut_id){
	close_update();
	if (shortcut_id == 0){
		document.getElementById("shortcut_data").style.display = "none";
		document.getElementById("shortcut_data").innerHTML = "";
		document.getElementById("shortcut_add").style.display = "none";
		document.getElementById("view_url").href = "../index.php";
		return;
	}
	document.getElementById("view_url").href = "../shortcut.php?sid=" + shortcut_id;	
	document.getElementById("submit_button").value = "Add to " + document.getElementById("selectbox").options[document.getElementById("selectbox").selectedIndex].text;
	var xmlhttp,x,txt;
	var x_id,x_group,x_function,x_key;
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			txt = "<tr><th>ID</th><th class=\"th_width\">Group</th><th class=\"th_width\">Function</th><th class=\"th_width\">Key Input</th><th>Edit</th><th>Delete</th></tr>";
			x = xmlhttp.responseXML.documentElement.getElementsByTagName("shortcut");		
			if (x.length == 0){
				document.getElementById("shortcut_data").style.display = "";
				document.getElementById("shortcut_data").innerHTML = txt;
				document.getElementById("shortcut_add").style.display = "";
			}
			else{
				document.getElementById("shortcut_data").style.display = "";
				for (i=0;i<x.length;i++){		`
					x_id=x[i].getElementsByTagName("id");
					x_group=x[i].getElementsByTagName("group");
					x_function=x[i].getElementsByTagName("function");
					x_key=x[i].getElementsByTagName("key");	
					txt = txt + "<tr id=\"shortcut" + x_id[0].firstChild.nodeValue + "\"><td>" + x_id[0].firstChild.nodeValue + "</td>";
					txt = txt + "<td>" + x_group[0].firstChild.nodeValue + "</td>";
					txt = txt + "<td>" + x_function[0].firstChild.nodeValue + "</td>";
					txt = txt + "<td>" + x_key[0].firstChild.nodeValue + "</td>";
					txt = txt + "<td class='text_align_center'><a href='javascript:void(0)' onclick='update_shortcut(" + x_id[0].firstChild.nodeValue + ")' /><i class='fa fa-pencil-square-o'></i></a></td>";
					txt = txt + "<td class='text_align_center'><a href='javascript:void(0)' onclick='delete_shortcut(" + x_id[0].firstChild.nodeValue + ")' /><i class='fa fa-trash-o'></i></a></td></tr>";	
				}
				document.getElementById("shortcut_data").innerHTML = txt;
				document.getElementById("shortcut_add").style.display = "";
			}
		}
	}
	xmlhttp.open("GET", "get_shortcut_data.php?sid=" + shortcut_id, true);
	xmlhttp.send();
		
}

/*add shortcut item*/
function add_shortcut(){
	var add_groupname = document.getElementById("groupname").value.replace(/(^\s*)|(\s*$)/g,'');
	var add_function = document.getElementById("function").value.replace(/(^\s*)|(\s*$)/g,'');
	var add_shortcut = document.getElementById("shortcut").value.replace(/(^\s*)|(\s*$)/g,'');
	var add_id = document.getElementById("selectbox").value;
	var encoded_groupname = encodeURIComponent(encodeURIComponent(add_groupname));
	var encoded_function = encodeURIComponent(encodeURIComponent(add_function));
	var encoded_shortcut = encodeURIComponent(encodeURIComponent(add_shortcut));
	var add_url = "add_shortcut.php?id=" + add_id + "&group=" + encoded_groupname + "&function=" + encoded_function + "&shortcut=" + encoded_shortcut;
	if (add_groupname == "" || add_function == "" || add_shortcut == ""){
		result("Data Invalid!",1500);
		return;
	}
	if (add_groupname.length > 45 || add_function.length > 90 || add_shortcut.length > 45){
		result("Too long (length limited at 45) !",3000);
		return;
	}
	var xmlhttp,x;
	var new_node,new_txt;
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){		
			x = xmlhttp.responseText;		
			if (x == "failed"){			
				result("Failed!",3000);
			}
			else{
				new_node = document.createElement("tr");
				new_node.id = "shortcut" + x;
				new_txt = "<td>" + x + "</td>";
				new_txt = new_txt + "<td>" + document.getElementById("groupname").value + "</td>";
				new_txt = new_txt + "<td>" + document.getElementById("function").value + "</td>";
				new_txt = new_txt + "<td>" + document.getElementById("shortcut").value + "</td>";
				new_txt = new_txt + "<td class='text_align_center'><a href='javascript:void(0)' onclick='update_shortcut(" + x + ")' /><i class='fa fa-pencil-square-o'></i></a></td>";
				new_txt = new_txt + "<td class='text_align_center'><a href='javascript:void(0)' onclick='delete_shortcut(" + x + ")' /><i class='fa fa-trash-o'></i></a></td></tr>";		
				new_node.innerHTML = new_txt;							
				document.getElementById("shortcut_data").appendChild(new_node);
				document.getElementById("function").value = "";
				document.getElementById("shortcut").value = "";
				result("Success!",1500);		
			}			
		}
	}
	xmlhttp.open("GET", add_url, true);
	xmlhttp.send();
}

/*delete shortcut item*/
function delete_shortcut(delete_id){
	close_update();	
	var delete_url = "delete_shortcut.php?id=" + delete_id;
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){		
			x = xmlhttp.responseText;		
			if (x == "Deleted!"){			
				var delete_tr = document.getElementById("shortcut" + delete_id);
				delete_tr.parentNode.removeChild(delete_tr);
				result(x,1500);		
			}
			else{
				result(x,3000);
			}			
		}
	}
	xmlhttp.open("GET", delete_url, true);
	xmlhttp.send();
}

/*update shortcut item*/
function update_shortcut(update_id){
	close_update();
	document.getElementById("shortcut_add").style.display = "none";
	document.getElementById("shortcut_update").style.display = "";
	document.getElementById("shortcut"+ update_id).style.color = "red";
	var update_url = "get_shortcut_item.php?id=" + update_id;
	var xmlhttp;
	var x,x_group,x_function,x_key;
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			x = xmlhttp.responseXML.documentElement.getElementsByTagName("shortcut_item");
			x_group=x[0].getElementsByTagName("group");
			x_function=x[0].getElementsByTagName("function");
			x_key=x[0].getElementsByTagName("key");			
			document.getElementById("update_id").innerHTML = update_id;
			document.getElementById("update_groupname").value = x_group[0].firstChild.nodeValue;
			document.getElementById("update_function").value = x_function[0].firstChild.nodeValue;
			document.getElementById("update_shortcut").value = x_key[0].firstChild.nodeValue;		
		}
	}
	xmlhttp.open("GET", update_url, true);
	xmlhttp.send();
}

/*submit update*/
function submit_update(){
	var update_groupname = document.getElementById("update_groupname").value.replace(/(^\s*)|(\s*$)/g,'');
	var update_function = document.getElementById("update_function").value.replace(/(^\s*)|(\s*$)/g,'');
	var update_shortcut = document.getElementById("update_shortcut").value.replace(/(^\s*)|(\s*$)/g,'');
	var encoded_groupname = encodeURIComponent(encodeURIComponent(update_groupname));
	var encoded_function = encodeURIComponent(encodeURIComponent(update_function));
	var encoded_shortcut = encodeURIComponent(encodeURIComponent(update_shortcut));
	var update_id = document.getElementById("update_id").innerHTML;
	var update_url = "update_shortcut.php?id=" + update_id + "&group=" + encoded_groupname + "&function=" + encoded_function + "&shortcut=" + encoded_shortcut;	
	if (update_groupname == "" || update_function == "" || update_shortcut == ""){
		result("Data Invalid!",1500);
		return;
	}
	if (update_groupname.length > 45 || update_function.length > 90 || update_shortcut.length > 45){
		result("Too long (length limited at 45) !",3000);
		return;
	}
	var xmlhttp;
	var x,update_txt;
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){		
			x = xmlhttp.responseText;		
			if (x == "Failed!"){			
				result(x,3000);
			}
			else{
				update_txt = "<td>" + update_id + "</td>";
				update_txt = update_txt + "<td>" + update_groupname + "</td>";
				update_txt = update_txt + "<td>" + update_function + "</td>";
				update_txt = update_txt + "<td>" + update_shortcut + "</td>";
				update_txt = update_txt + "<td class='text_align_center'><a href='javascript:void(0)' onclick='update_shortcut(" + update_id + ")' /><i class='fa fa-pencil-square-o'></i></a></td>";
				update_txt = update_txt + "<td class='text_align_center'><a href='javascript:void(0)' onclick='delete_shortcut(" + update_id + ")' /><i class='fa fa-trash-o'></i></a></td></tr>";		
				document.getElementById("shortcut"+ update_id).innerHTML = update_txt;
				document.getElementById("shortcut"+ update_id).style.color = "";
				result(x,1500);
				close_update();
			}
		}
	}
	xmlhttp.open("GET", update_url, true);
	xmlhttp.send();
}

/*cancel or complete update*/
function close_update(){
	clear_input();
	var update_id = document.getElementById("update_id").innerHTML;
	if (update_id != "0")
		document.getElementById("shortcut"+ update_id).style.color = "";
	document.getElementById("shortcut_add").style.display = "";
	document.getElementById("shortcut_update").style.display = "none";
	document.getElementById("update_id").innerHTML = "0";
}

/*clear all input*/
function clear_input(){
	document.getElementById("groupname").value = "";
	document.getElementById("function").value = "";
	document.getElementById("shortcut").value = "";
}

/*hide result*/
function display_none_result(){
	document.getElementById("result").style.display = "none";	
}

/*output result*/
function result(result_text,result_time){
	document.getElementById("result").style.display = "";
	document.getElementById("result").innerHTML = result_text;
	if (result_time > 0)
		setTimeout("display_none_result()",result_time);
}

/*login*/
function login(){
	var pw_input = document.getElementById("password").value;
	set_cookie("password", pw_input, 1);
	location.href='admin.php';
}

/*set cookie*/
function set_cookie(name,value,day){   
    var s_date=new Date();   
    s_date.setDate(s_date.getDate()+day);       
    document.cookie=name+'='+value+';expires='+s_date;
}