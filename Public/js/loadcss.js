function headload(file){	
	 var files = typeof file == "string" ? [file]:file;	
     for (var i = 0; i < files.length; i++) {       
         var att = files[i].split('.');       
         var ext = att[att.length - 1].toLowerCase();
         var isCSS = ext == "css";
         var tag = isCSS ? "link" : "script";
         var attr = isCSS ? " type='text/css' rel='stylesheet' " : " language='javascript' type='text/javascript' ";
         var link = (isCSS ? "href" : "src") + "='" + files[i] + "'";
         if ($(tag + "[" + link + "]").length == 0) $("head").append("<" + tag + attr + link + "></" + tag + ">");
     }	
}