//frm:要提交的from;fn:成功后调用的函数
function ajaxSubmit (frm,fn) {
	var dataPara=getFormJson(frm);
	$.ajax({
		url:frm.action,
		type:frm.method,
		data:dataPara,
		success:fn
	});
}
//获取from中的元素,转化为JSON格式,形如:{name:'aaa',password:'bbb'},同名将会放到一个数组内
function getFormJson (frm) {
	var o={};
	var o=$(frm).serializeArray();//序列化from对象
	$.each(function () {
	        if (o[this.name] !== undefined) {
	            if (!o[this.name].push) {
	                o[this.name] = [o[this.name]];
	            }
	            o[this.name].push(this.value || '');
	        } else {
	            o[this.name] = this.value || '';
	        }
	    });
	return o;
}

//显示列表
function doList(type,fn){
	$.ajax({
		url:'source/list.php?type='+type,
		type:'post',
		success:fn
	});
}

function doSum(type,fn){
	$.ajax({
		url:'source/sum.php?type='+type,
		type:'post',
		success:fn
	});
}

// 页面加载时函数
$(document).ready(function() {


	$('#login-form').submit(function(event) {
		event.preventDefault();
		ajaxSubmit(this,function(data){
				// alert(data);
				if (data=="admin") {
					window.location.href='index.php';
				}else if (data=="sale") {
					window.location.href='sell.php'
				};
		});
		// return false;
	});

	$('#logout').click(function(){
		$.ajax({
			url:'source/login.php',
			type:'post',
			success:function(data){
				// alert(data);	
				if(data=="out"){
					window.location.href='login.php';
				}
			}
		});
	});

	$('#sum').click(function(event) {
		window.location.href='sum.php';
	});

	$('#return').click(function(event) {
		window.location.href='index.php';
	});

	$('#add-ord-form').submit(function(event) {
		event.preventDefault();
		ajaxSubmit(this,function(data){
			if (data) {
				alert('成功');
				// alert(data);
				$('#add-ord-form')[0].reset();
				doList('ord',function(data){
					$('#list-ord').html(data);
				});
				doList('pro',function(data){
					$('#list-pro').html(data);
				});
			};
		});
		// return false;
	});

	$('#add-pro-form').submit(function(event) {
		event.preventDefault();
		ajaxSubmit(this,function(data){
			if(data) {
				alert('成功');
				$('#add-pro-form')[0].reset();
				doList('pro',function(data){
					$('#list-pro').html(data);
				});
				doList('pro-list',function(data){
					var o =jQuery.parseJSON(data);
					for (var i = 0; i < o.length; i++) {
						$('#ord-name').append('<option value='+o[i].id+'>'+o[i].name+'</option>');
					};
				});
			}
		});
		// return false;
	});


	$(document).on('click','#upd',function(event){
		event.preventDefault();
		// alert(this.href);
		$.ajax({
			url:this.href,
			type:'post',
			success:function(data){
				// alert(data);
				doList('ord',function(data){
					$('#list-ord').html(data);
				});
			}
		});
	});

	$(document).on('click','#del',function(event){
		event.preventDefault();
		// alert(this.href);
		if(confirm('确定删除？')){
			$.ajax({
				url:this.href,
				type:'post',
				success:function(data){
					// alert(data);
					doList('ord',function(data){
						$('#list-ord').html(data);
					});
					doList('pro',function(data){
						$('#list-pro').html(data);
					});
				}
			});
		}
	});
	if ($('#list-ord')) {
		doList('ord',function(data){
			$('#list-ord').html(data);
		});
	};
	
	if ($('#list-pro')) {
		doList('pro',function(data){
			$('#list-pro').html(data);
		});
	};
	
	if ($('#ord-name')) {
		doList('pro-list',function(data){
			var o =jQuery.parseJSON(data);
			for (var i = 0; i < o.length; i++) {
				$('#ord-name').append('<option value='+o[i].id+'>'+o[i].name+'</option>');
			};
		});
	};

	if ($('#sum-left')) {
		doSum('1',function(data){
			$('#sum-left').html(data);
		});
	};

	if ($('#sum-right')) {
		doSum('2',function(data){
			$('#sum-right').html(data);
		});
	};


	
});