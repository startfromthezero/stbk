function navBar(strData){
	var data,top,childs;
	if(typeof(strData) == "string"){
		var data = JSON.parse(strData); //部分用户解析出来的是字符串，转换一下
	}else{
		data = strData;
	}
	top = data.top;
	var ulHtml = '<ul class="layui-nav layui-nav-tree"><li class="layui-nav-item"><a href="/admin"><i class="fa fa-book fa-fw"></i><cite>控制面板</cite></a></li>';
	console.log(top.length);
	for(var i=0;i< top.length;i++){
		ulHtml += '<li class="layui-nav-item">';
		if(data[top[i].id].length > 0){
			ulHtml += '<a href="javascript:;">';
			if(top[i].icon != undefined && top[i].icon != ''){
				ulHtml += '<i class="fa '+ top[i].icon+' fa-fw"></i>';
			}
			ulHtml += '<cite>'+ top[i].label+'</cite>';
			ulHtml += '<span class="layui-nav-more"></span>';
			ulHtml += '</a>';
			ulHtml += '<dl class="layui-nav-child">';
			childs = data[top[i].id];
			for(var j=0;j< childs.length;j++){
				ulHtml += '<dd><a href="javascript:;" data-url="'+ childs[j].name +'">';
				if(childs[j].icon != undefined && childs[j].icon != ''){
					ulHtml += '<i class="fa ' + childs[j].icon + ' fa-fw"></i>';
				}
				ulHtml += '<cite>'+ childs[j].label+'</cite></a></dd>';
			}
			ulHtml += "</dl>";
		}else{
			ulHtml += '<a href="javascript:;" data-url="'+ top[i].name+'">';
			if(top[i].icon != undefined && top[i].icon != ''){
				ulHtml += '<i class="fa ' + top[i].icon + ' fa-fw"></i>';
			}
			ulHtml += '<cite>'+data[i].label+'</cite></a>';
		}
		ulHtml += '</li>';
	}
	ulHtml += '</ul>';
	return ulHtml;
}
