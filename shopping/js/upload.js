	/*调用方法：setImagePreview(this, loadImg, document.getElementById('preview'))  
	参数：
	1.文件按钮对象  this
	2.包裹img的div对象的id
	3.img对象  通过id获取
	*/
	function setImagePreview(obj, localImagId, imgObjPreview) {
			if(!localImagId){
				localImagId = obj.parentNode;
			}

			var array = new Array('gif', 'jpeg', 'png', 'jpg', 'bmp'); //可以上传的文件类型

			if (obj.value == '') {

				alert("让选择要上传的图片!");

				return false;

			}else {

				var fileContentType = obj.value.match(/^(.*)(\.)(.{1,8})$/)[3]; //这个文件类型正则很有用

				////布尔型变量

				var isExists = false;

				//循环判断图片的格式是否正确

				for (var i in array) {

					if (fileContentType.toLowerCase() == array[i].toLowerCase()) {

						//图片格式正确之后，根据浏览器的不同设置图片的大小

						if (obj.files && obj.files[0]) {

							//火狐下，直接设img属性

							imgObjPreview.style.display = 'block';

							imgObjPreview.style.width = '400px';

							//imgObjPreview.style.height = '400px';

							//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式

							try {

								imgObjPreview.src = window.URL.createObjectURL(obj.files[0]);

							}

							catch (e) {

								if (window.FileReader) {

									var reader = new FileReader();

									reader.onload = function (e) {

										imgObjPreview.src = e.target.result;

									}

									reader.readAsDataURL(obj.files[0]);

								} else {

									alert("不支持您当前使用的浏览器的图片预览!");

								}

							}

						}

						else {

							//IE下，使用滤镜

							isExists = true;

							obj.select();

							var imgSrc = document.selection.createRange().text;

							localImagId.style.paddingTop = "20px";

							//必须设置初始大小

							localImagId.style.width = "120px";

							localImagId.style.height = "120px";

							//图片异常的捕捉，防止用户修改后缀来伪造图片

							try {

								localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";

								localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;

								localImagId.src = imgSrc;

							}

							catch (e) {

								alert("您上传的图片格式不正确，请重新选择!");

								return false;

							}

							imgObjPreview.style.display = 'none';

							document.selection.empty();

						}

						isExists = true;

						return true;

					}

				}

				if (isExists == false) {

					alert("上传图片类型不正确!");

					return false;

				}

				return false;

				}

		}