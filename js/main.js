function GetOSInfo(){
	var _pf=navigator.platform;
	var appVer=navigator.userAgent;
	if(_pf=="Win32" || _pf == "Windows"){
		if(appVer.indexOf("WOW64")>-1){
			_bit = "64位";
		}
		else{
			_bit = "32位";
	  	}
		if(appVer.indexOf("Windows NT 6.0") > -1 || appVer.indexOf("Windows Vista") > -1){
			if(_bit=='64位' || appVer.indexOf("Windows Vista") > -1){
		    	return 'Windows_vista '+_bit;
			}
			else{
				return "Unknow1";
			}
		}
		else if(appVer.indexOf("Windows NT 6.1") > -1 || appVer.indexOf("Windows 7") > -1){
			if(_bit=='32位' || appVer.indexOf("Windows 7") > -1){
				return 'Windows_7 '+_bit;
			}
			else{
				return "Unknow344";
			}
		}
		else{
			try{
				var _winName = Array('2000','XP','2003');
				var _ntNum = appVer.match(/Windows NT 5.\d/i).toString();
				return 'Windows_' + _winName[_ntNum.replace(/Windows NT 5.(\d)/i,"$1")]+" "+_bit;
			}
			catch(e){
				return 'Windows';
			}
		} 
	}
	else if(_pf == "Mac68K" || _pf == "MacPPC" || _pf == "Macintosh"){ 
		return "Mac";
	}
	else if(_pf == "X11"){
		return "Unix";
	}
	else if(String(_pf).indexOf("Linux") > -1){ 
		return "Linux"; 
	}
	else{
		return "Unknow222";
	}
}