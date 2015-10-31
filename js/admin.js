/*admin data control js*/
	
/*get shortcut data by id*/
function get_shortcut_data(shortcut_id){
	clear_input();
	if (shortcut_id == 0){
		document.getElementById("shortcut_data").style.display = "none";
		document.getElementById("shortcut_data").innerHTML = "";
		document.getElementById("shortcut_add").style.display = "none";
		document.getElementById("view_url").href = "../index.php";
		return;
	}
	document.getElementById("view_url").href = "../shortcut.php?sid=" + shortcut_id;	
	document.getElementById("submit_button").value = "Add to " + document.getElementById("selectbox").options[document.getElementById("selectbox").selectedIndex].text;
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			txt = "<tr><th>ID</th><th class=\"th_width\">Group</th><th class=\"th_width\">Function</th><th class=\"th_width\">Key Input</th><th>Delete</th></tr>";
			x = xmlhttp.responseXML.documentElement.getElementsByTagName("shortcut");		
			if (x.length == 0){
				document.getElementById("shortcut_data").style.display = "";
				document.getElementById("shortcut_data").innerHTML = txt;
				document.getElementById("shortcut_add").style.display = "";
			}
			else{
				document.getElementById("shortcut_data").style.display = "";
				for (i=0;i<x.length;i++){		
					x_id=x[i].getElementsByTagName("id");
					x_group=x[i].getElementsByTagName("group");
					x_function=x[i].getElementsByTagName("function");
					x_key=x[i].getElementsByTagName("key");	
					txt = txt + "<tr id=\"shortcut" + x_id[0].firstChild.nodeValue + "\"><td>" + x_id[0].firstChild.nodeValue + "</td>";
					txt = txt + "<td>" + x_group[0].firstChild.nodeValue + "</td>";
					txt = txt + "<td>" + x_function[0].firstChild.nodeValue + "</td>";
					txt = txt + "<td>" + x_key[0].firstChild.nodeValue + "</td>";
					txt = txt + "<td class='text_align_center'><a href='javascript:void(0)' onclick='delete_shortcut(" + x_id[0].firstChild.nodeValue + ")' /><i class=\"fa fa-trash-o\"></i></a></td></tr>";	
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
	var add_id = document.getElementById("selectbox").value;
	var add_groupname = encodeURIComponent(encodeURIComponent(document.getElementById("groupname").value));
	var add_function = encodeURIComponent(encodeURIComponent(document.getElementById("function").value));
	var add_shortcut = encodeURIComponent(encodeURIComponent(document.getElementById("shortcut").value));
	var add_url = "add_shortcut.php?id=" + add_id + "&group=" + add_groupname + "&function=" + add_function + "&shortcut=" + add_shortcut;
	if (add_groupname == "" || add_function == "" || add_shortcut == ""){
		document.getElementById("result").style.display = "";
		document.getElementById("result").innerHTML = "Data Invalid!";
		setTimeout("display_none_result()",1500);
		return;
	}
	if (add_groupname.length > 15 || add_function.length > 15 || add_shortcut.length > 15){
		document.getElementById("result").style.display = "";
		document.getElementById("result").innerHTML = "Too long (length limited at 15) !";
		setTimeout("display_none_result()",3000);
		return;
	}
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
			if (x == "failed"){			
				document.getElementById("result").style.display = "";
				document.getElementById("result").innerHTML = "Failed!";
				setTimeout("display_none_result()",3000);
			}
			else{
				var newNode = document.createElement("tr");
				newNode.id = "shortcut" + x;
				newTxt = "<td class='text_align_center'>" + x + "</td>";
				newTxt = newTxt + "<td>" + document.getElementById("groupname").value + "</td>";
				newTxt = newTxt + "<td>" + document.getElementById("function").value + "</td>";
				newTxt = newTxt + "<td>" + document.getElementById("shortcut").value + "</td>";
				newTxt = newTxt + "<td class='text_align_center'><a href='javascript:void(0)' onclick='delete_shortcut(" + x + ")' /><i class=\"fa fa-trash-o\"></i></a></td>";
				newNode.innerHTML = newTxt;							
				document.getElementById("shortcut_data").appendChild(newNode);
				document.getElementById("result").style.display = "";
				document.getElementById("result").innerHTML = "Success!";
				document.getElementById("function").value = "";
				document.getElementById("shortcut").value = "";					
				setTimeout("display_none_result()",1500);
			}			
		}
	}
	xmlhttp.open("GET", add_url, true);
	xmlhttp.send();
}

/*delete shortcut item*/
function delete_shortcut(delete_id){	
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
			if (x == "deleted"){
				document.getElementById("result").style.display = "";
				document.getElementById("result").innerHTML = "Deleted!";			
				var delete_tr = document.getElementById("shortcut" + delete_id);
				delete_tr.parentNode.removeChild(delete_tr);			
				setTimeout("display_none_result()",1500);		
			}
			else{
				document.getElementById("result").style.display = "";
				document.getElementById("result").innerHTML = "Delete Failed!";
				setTimeout("display_none_result()",3000);
			}			
		}
	}
	xmlhttp.open("GET", delete_url, true);
	xmlhttp.send();
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