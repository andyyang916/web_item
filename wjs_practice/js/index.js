			$(function () {
			$('[data-toggle="tooltip"]').tooltip();
//			获取所有的li项目
			var items = $('.carousel-inner .item');
			$(window).on('resize', function () {
				var width = $(this).width();
//				console.log(width);
//			判断屏幕的宽度
			if (width >= 768) {
				console.log(888);
//				为每一个li增加子元素 循环遍历
				$(items).each(function (index, value) {
//					获得当前的li
				var item = $(this);
//				从当前的自定义的属性中,获取图片的路径
				var imgSrc = item.data('largeImg');
//				console.log(imgSrc);
				item.html($('<a href="javascript:;" class="pcImg"></a>').css("backgroundImage", "url('"+imgSrc+"')"));
				});
			} else {
				$(items).each(function (index, value) {
//					获得当前的li
				var item = $(this);
//				从当前的自定义的属性中,获取图片的路径
				var imgSrc = item.data('smallImg');
//				console.log(imgSrc);
				item.html('<a href="javascript:;" class="mobileImg"><img src="'+ imgSrc +'"></a>');
//              item.html('<a href="javascript:;" class="mobileImg"><img src="'+imgSrc+'" alt="..."></a>');				
				});				
			}
			}).trigger('resize');	
			
//			添加移动端的滑动操作
			var startX, endX;
			var carouselInner = $('.carousel-inner')[0];
//			获取当前轮播图
			var carousel = $('.carousel');
			carouselInner.addEventListener('touchstart', function (e) {
				startX = e.targetTouches[0].clientX;
				console.log(startX);
			})
			carouselInner.addEventListener('touchend', function (e) {
				endX = e.changedTouches[0].clientX;
//				console.log(endX);
				if (endX - startX > 0) {
//					上一张
					carousel.carousel('prev');
				} else if (endX - startX < 0) {
//					下一张
					carousel.carousel('next');
				}
			})
			
			var totalWidth = 0;
			var lis = $('.tab_parent .nav-tabs li');
			console.log(lis);
			lis.each(function (index, value) {
				totalWidth = totalWidth + $(value).outerWidth(true);
//				console.log($(value).outerWidth(true));
//				console.log(totalWidth);
			});
			lis.parent().width(totalWidth);
//			console.log(lis.parent());
//			导航项目的滚动
			var myScroll = new IScroll('.tab_parent', {
			    scrollX: true, 
			    scrollY: false
			});
			});