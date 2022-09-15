$(document).mousemove(function(){
	$d = 0;	
	$('iframe').contents().find("img").dblclick(function(){
		$d++;
		if ($d == 1){
			openPopup('img-popup', $(this).attr('data-id'), '');
		}
	});
	
	
	
	$d = 0;	
	$('#edit-cart-media-iframe1').contents().find("#clickPlusImg").click(function(){		
		$('#index').css('display', 'block');	
		$d++;
		if ($d == 1){
			setTimeout(function () {
				$('#ID-editCartProductSave').click();
				alert('Сохранено'); // Нельзя убирать, потому что работа с картинками реагирует на движение курсора				
			}, 3000);  
		}
	});
	$('#edit-cart-media-iframe1').contents().find("#deleteImg-id").click(function(){
		$('#index').css('display', 'block');
		$d++;
		if ($d == 1){
			setTimeout(function () {
				$('#ID-editCartProductSave').click();			
				alert('Сохранено'); // Нельзя убирать, потому что работа с картинками реагирует на движение курсора		
			}, 3000);  
		}
	});
	
	$('#edit2-cart-media-iframe1').contents().find("#clickPlusImg").click(function(){
		$('#index').css('display', 'block');
		$d++;
		if ($d == 1){
			setTimeout(function () {
				$('#ID-editCartProductSave').click();
				alert('Сохранено'); // Нельзя убирать, потому что работа с картинками реагирует на движение курсора
			}, 3000);  
		}
	});
	$('#edit2-cart-media-iframe1').contents().find("#deleteImg-id").click(function(){
		$('#index').css('display', 'block');
		$d++;
		if ($d == 1){		
			setTimeout(function () {
				$('#ID-editCartProductSave').click();											
				alert('Сохранено'); // Нельзя убирать, потому что работа с картинками реагирует на движение курсора
			}, 3000);
		}
	});
	
	$('#edit3-cart-media-iframe1').contents().find("#clickPlusImg").click(function(){
		$('#index').css('display', 'block');		
		$d++;
		if ($d == 1){		
			setTimeout(function () {
				$('#ID-editCartProductSave').click();
				alert('Сохранено'); // Нельзя убирать, потому что работа с картинками реагирует на движение курсора
			}, 3000);  
		}
	});
	$('#edit3-cart-media-iframe1').contents().find("#deleteImg-id").click(function(){
		$('#index').css('display', 'block');
		$d++;
		if ($d == 1){		
			setTimeout(function () {
				$('#ID-editCartProductSave').click();												
				alert('Сохранено'); // Нельзя убирать, потому что работа с картинками реагирует на движение курсора
			}, 3000);
		}
	});
});


$(document).ready(function(){
	$('.body').css('height', '' + $(window).height()-100 + 'px');
	$('.sidebar').css('height', '' + $(window).height()-120 + 'px');
	

	$("#sortHierarchy").append($("#sortHierarchy > li").remove().sort(function(a, b) {
		var at = $(a).text(), bt = $(b).text();
		return (at > bt)?1:((at < bt)?-1:0);
	}));
		
	var nices = $("#sidebar_id").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});
});	


$(function(){
    $(window).resize(function() {
        $('.body').css('height', '' + $(window).height()-100 + 'px');
		$('.sidebar').css('height', '' + $(window).height()-120 + 'px');		
		$('.desctop #superTable1').css('height', '' + $(window).height()-200-$('#block_filtr_teg').height() + 'px');
		$('.attr_scroll_class').css('height', '' + $(window).height()-100 + 'px');	
		$('.volume_scroll_class').css('height', '' + $(window).height()-100 + 'px');	
		$('#block-1').css('height', '' + $(window).height()-100 + 'px');
		$('#block-2-child').css('height', '' + $(window).height()-150 + 'px');		
		$('.massCart').css('height', '' + $(window).height()-100 + 'px');								
		$('.noMassCart').css('height', '' + $(window).height()-200 + 'px');
		$('.noMassCart .form-edit-cart-product-block').css('height', '' + $(window).height()-300 + 'px');
		$('.massCart .form-edit-cart-product-block').css('height', '' + $(window).height()-150 + 'px');
		$('#edit2-cart-media-iframe1').css('height', '' + $(window).height() / 4.5 + 'px');
		$('#edit3-cart-media-iframe1').css('height', '' + $(window).height() / 4.5 + 'px');
		$('#blockPopup2 .blockPopupChild').css('height', '' + $(window).height()-10 + 'px');
    })
})

function get_order_sort($table_sort_id){ // Для запоминания order sort
	$order = '';
	$('.table_sort' + $table_sort_id + ' thead td').each(function( index ) {		
		if (($(this).attr('class') == 'sorted top') || ($(this).attr('class') == 'sorted down')){
			$order = $(this).attr('data-order');
		}
	});								
	return $order;	
}

function get_td_sort($table_sort_id){ // Для запоминания td sort
	$order = '';
	$('.table_sort' + $table_sort_id + ' thead td').each(function( index ) {		
		if (($(this).attr('class') == 'sorted top') || ($(this).attr('class') == 'sorted down')){
			$order = $(this).attr('data-order');
		}
	});								
	$td_d1 = 0;
	$td_d2 = 0;
	$('.table_sort' + $table_sort_id + ' thead td').each(function( index ) {
		$td_d1++;		
		if (($(this).attr('class') == 'sorted top') || ($(this).attr('class') == 'sorted down')){
			$td_d2 = $td_d1;
			$order = $(this).attr('data-order');
		}
	});		
	return $td_d2;
}

function function_table_sort($table_sort_id, $order, $td_d2){ // Непосредственно сама автоматическая сортировка		
	setTimeout(function () {
		if ($order == '1'){
			$('.table_sort' + $table_sort_id + ' thead td:nth-child(' + $td_d2 + ')').click();
		}
		if ($order == '-1'){
			$('.table_sort' + $table_sort_id + ' thead td:nth-child(' + $td_d2 + ')').click();
			$('.table_sort' + $table_sort_id + ' thead td:nth-child(' + $td_d2 + ')').click();
		}		
	}, 500);
}


function sortableHead($id){
		const getSort = ({ target }) => {
			const order = (target.dataset.order = -(target.dataset.order || -1));
			const index = [...target.parentNode.cells].indexOf(target);
			const collator = new Intl.Collator(['en', 'ru'], { numeric: true });
			const comparator = (index, order) => (a, b) => order * collator.compare(
				a.children[index].innerHTML,
				b.children[index].innerHTML
			);
			
			for(const tBody of target.closest('table').tBodies)
				tBody.append(...[...tBody.rows].sort(comparator(index, order)));

			for(const cell of target.parentNode.cells)
				cell.classList.toggle('sorted', cell === target);

			
			index2 = index+1;			
			if (order == '1'){				
				$('.table_sort' + $id + ' thead td:nth-child(' + index2 + ')').attr('class', 'sorted top');
			} else {
				$('.table_sort' + $id + ' thead td:nth-child(' + index2 + ')').attr('class', 'sorted down');
			}
			
		};
		document.querySelectorAll('.table_sort' + $id + ' thead').forEach(tableTH => tableTH.addEventListener('click', () => getSort(event)));		
}

function AjaxFormRequest(result_id,formMain,url) {
	$('#' + result_id).html('');
	$.ajax({
		url:     url,
		type:     "POST",
		dataType: "html",
		data: $("#"+formMain).serialize(),
		success: function(response) {
		document.getElementById(result_id).innerHTML = response;
	},
	error: function(response) {
	document.getElementById(result_id).innerHTML = "";
	}
 });
 return true;
}

function openSubMenu($id, $level, $id2){
	if ($level == 'ulLevelTwo'){
		$('.sidebar ul > li > ul').css('display', 'none');		
	} else {
		$('.sidebar ul > li > ul > li ul').css('display', 'none');		
	}
	
	$('.sidebar ul span').attr('class', '');
	$('.sidebar #' + $id).css('display', 'block');	
	$('.sidebar #' + $id2).attr('class', 'active');
}

function openProduct($id, $category_id, $id_attr_filtr, $value_filtr, $row, $s_d){	
	
	
						$('.nicescroll-rails').each(function( index ) {
							if (($(this).attr('id') != 'ascrail2000') && ($(this).attr('id') != 'ascrail2001-hr') && ($(this).attr('id') != 'ascrail2001')){
								$(this).remove();
								
							}
						});


	$order = get_order_sort(1);	
	$td = get_td_sort(1);	
	
	$category_id = $('#' + $id).attr('data-id');		
	$code_to_id = $('#' + $id).attr('item-id');		
	
	if ($category_id === undefined){
	} else {
		$('.sidebar ul span').attr('class', '');	
		$('#' + $id).attr('class', 'active');
		
		AjaxFormRequest('block_filtr_teg', 'ajaxForm', 'modules/desctop/top_filtr.php?id_attr_filtr=' + $id_attr_filtr + '&value_filtr=' + $value_filtr + '&row=' + $row + '&s_d=' + $s_d + '');
		function scan(){		
			$object = $('.top_filtr').html();
			if ($object === undefined){} else {
					clearInterval($flajok_scan);									
					$('.desctop #superTable1').css('height', '' + $(window).height()-200-$('#block_filtr_teg').height() + 'px');
					AjaxFormRequest('superTable1', 'ajaxForm', 'modules/desctop/desctop.php?product_hierarchy=' + $('#' + $id).attr('data-id') + '&category_id=' + $category_id + '&code_to_id=' + $code_to_id + '')
					
					function scan2(){		
						$object = $('.desctop_desctop').html();
						if ($object === undefined){
								$('#index').css('display', 'block');
						} else {
								clearInterval($flajok_scan2);									
								$('#index').css('display', 'none');
								sortableHead(1);
								function_table_sort(1, $order, $td);								
								var nices4 = $("#superTable1").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});
						}
					}
					var $flajok_scan2 = setInterval(scan2, 10);					
			}
		}
		var $flajok_scan = setInterval(scan, 10);
	}
}


function openPopup($nameBlock, $product_id, $category_id){
	$('#ascrail2000').css('display', 'none');
	$('#ascrail2001-hr').css('display', 'none');
	$('.popupMask').css('display', 'block');
	
	
	if ($nameBlock == 'cartProduct'){
		
		$category_id2 = $('.specialBlockShare #category_id').html();
		if ($category_id2 === undefined){
					alert('Выберите категорию');
		} else {
					$category_id = $category_id2;
					if ($product_id == 0){
						$product_id2 = '';
						
						$d_checkProduct = 0;
						$('.checkProduct').each(function( index ) {
							if ($(this).is(':checked')) {
								$d_checkProduct++;	
								$product_id2 = $product_id2 + $(this).attr('data-id') + '~';
							}
						});
						if ($product_id2 == ''){
							alert('Выберите продукты');							
						} else {
							if ($d_checkProduct > 10){
								alert('Можно выбрать максимум 10 продуктов');								
							} else {
								AjaxFormRequest('blockPopup', 'ajaxForm', 'modules/edit-cart-product/edit-cart-product.php?product_id=' + $product_id + '&category_id=' + $category_id + '&product_id2=' + $product_id2 + '');
							}
						}
					} else {
						AjaxFormRequest('blockPopup', 'ajaxForm', 'modules/edit-cart-product/edit-cart-product.php?product_id=' + $product_id + '&category_id=' + $category_id + '');
					}
					
					function scan(){		
						$object = $('.edit_cart_product').html();
						if ($object === undefined){	
							if ($product_id > 0){
								$('#index').css('display', 'block');
							} else {
								if (($product_id2 != '') && ($d_checkProduct <= 10)) $('#index').css('display', 'block');
							}
						} else {
								clearInterval($flajok_scan);	
								$('#index').css('display', 'none');
								$html = '<textarea name="delivery_terms" class="richtext form-control" id="delivery_terms">' + $('#value-textarea-551').html() + '</textarea>';
								$html = $html + '<script src="js/rich/tinymce.min.js"></script>';
								$html = $html + '<script src="js/rich/richtext.js"></script>';
								$html = $html + '<script>doRichtext();</script>';			
								$('#special_textarea2').html($html);
				

				
				
				
								
								
								$('.massCart').css('height', '' + $(window).height()-100 + 'px');								
								$('.noMassCart').css('height', '' + $(window).height()-200 + 'px');
								$('.noMassCart .form-edit-cart-product-block').css('height', '' + $(window).height()-300 + 'px');
								$('.massCart .form-edit-cart-product-block').css('height', '' + $(window).height()-150 + 'px');
								
								$('#edit2-cart-media-iframe1').css('height', '' + $(window).height() / 4.5 + 'px');
								$('#edit3-cart-media-iframe1').css('height', '' + $(window).height() / 4.5 + 'px');
								
								var nices9 = $(".noMassCart .form-edit-cart-product-block").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});																				
								var nices10 = $("#edit-cart-media-iframe1").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});																				
								var nices11 = $("#edit2-cart-media-iframe1").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});												
								var nices12 = $("#edit3-cart-media-iframe1").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});												
								var nices13 = $(".massCart .form-edit-cart-product-block").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});
						}
					}
					var $flajok_scan = setInterval(scan, 10);
					
		}
	}
	if ($nameBlock == 'attr'){
		AjaxFormRequest('blockPopup', 'ajaxForm', 'modules/attr/attr.php');
		function scan(){		
			$object = $('.attr_attr').html();
			if ($object === undefined){
					$('#index').css('display', 'block');				
			} else {
					clearInterval($flajok_scan);									
					$('#index').css('display', 'none');
					sortableHead(3);
					var nices2 = $("#attr_scroll_id").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});

					setTimeout(function () {
						$('.attr_scroll_class').css('height', '' + $(window).height()-100 + 'px');
					}, 100);
			}
		}
		var $flajok_scan = setInterval(scan, 10);
	}
	if ($nameBlock == 'volume'){
		AjaxFormRequest('blockPopup', 'ajaxForm', 'modules/volume/volume.php');
		function scan(){		
			$object = $('.volume_volume').html();
			if ($object === undefined){
					$('#index').css('display', 'block');
			} else {
					clearInterval($flajok_scan);		
					$('#index').css('display', 'none');					
					sortableHead(4);	
					
					var nices6 = $(".volume_scroll_class").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});		
					
					setTimeout(function () {
						$('.volume_scroll_class').css('height', '' + $(window).height()-100 + 'px');
					}, 100);					
			}
		}
		var $flajok_scan = setInterval(scan, 10);
	}
	if ($nameBlock == 'filtr'){
		
		// Выделенную категорию находим
		$category_id = $('.specialBlockShare #category_id').html();		
		$('.sidebar span').each(function( index ) {			
			if ($(this).css('color') == 'rgb(255, 0, 0)'){
				$category_id = $(this).attr('data-id');
			}
		});
		if ($category_id === undefined){
			alert('Выберите категорию');
		} else {
			AjaxFormRequest('blockPopup', 'ajaxForm', 'modules/filtr/filtr.php?category_id=' + $category_id + '');
			function scan(){		
				$object = $('.filtr_filtr').html();
				if ($object === undefined){} else {
						clearInterval($flajok_scan);
						var nices7 = $("#block-1").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});		
						setTimeout(function () {
							$('#block-1').css('height', '' + $(window).height()-100 + 'px');	
						}, 100);
				}
			}
			var $flajok_scan = setInterval(scan, 10);
		}
	}	
	if ($nameBlock == 'img-popup'){
		AjaxFormRequest('blockPopup2', 'ajaxForm', 'modules/img-popup/img-popup.php?product_id=' + $product_id + '&action=img-popup');
		function scan(){		
			$object = $('.img-popup').html();
			if ($object === undefined){} else {
					clearInterval($flajok_scan);
					$('#blockPopup2 .blockPopupChild').css('height', '' + $(window).height()-10 + 'px');
					$(document).ready(function() {
						$('.photor').photor();
					});					
			}
		}
		var $flajok_scan = setInterval(scan, 10);		
	}
}

function editCartProductSave($product_id, $category_id){
	
	$('#ID-specialText-551').html($('#delivery_terms_ifr').contents().find('#tinymce').html());

	$('#edit-cart-media-iframe2').html($('#edit-cart-media-iframe1').contents().find('#form-media').html());
	$('#edit2-cart-media-iframe2').html($('#edit2-cart-media-iframe1').contents().find('#form-media').html());
	$('#edit3-cart-media-iframe2').html($('#edit3-cart-media-iframe1').contents().find('#form-media').html());
	$string_img = '';
	$string_img2 = '';
	$string_img3 = '';
	

	
	$('#edit-cart-media-iframe2 .check-img-pzu').each(function( index ) {			
		$string_img = $string_img + $(this).val() + '~';
	});		
	$('#edit-cart-media-iframe2 .check-img-ozu').each(function( index ) {			
		$string_img = $string_img + $(this).val() + '~';
	});
	
	
	$('#edit2-cart-media-iframe2 .check-img-pzu').each(function( index ) {			
		$string_img2 = $string_img2 + $(this).val() + '~';
	});		
	$('#edit2-cart-media-iframe2 .check-img-ozu').each(function( index ) {			
		$string_img2 = $string_img2 + $(this).val() + '~';
	});

	
	$('#edit3-cart-media-iframe2 .check-img-pzu').each(function( index ) {			
		$string_img3 = $string_img3 + $(this).val() + '~';
	});		
	$('#edit3-cart-media-iframe2 .check-img-ozu').each(function( index ) {			
		$string_img3 = $string_img3 + $(this).val() + '~';
	});
	
	if ($product_id != 0){
		AjaxFormRequest('resultEditCartProductSave-' + $product_id, 'form-edit-cart-product-' + $product_id, 'modules/edit-cart-product/processor.php?product_id=' + $product_id + '&string_img=' + $string_img + '&string_img2=' + $string_img2 + '&string_img3=' + $string_img3 + '&category_id=' + $category_id + '');
	} else {
		$product_id2 = '';
		$('.checkProduct').each(function( index ) {
			if ($(this).is(':checked')) {
				$product_id2 = $product_id2 + $(this).attr('data-id') + '~';
			}
		});
		AjaxFormRequest('channel', 'form-edit-cart-product-' + $product_id, 'modules/edit-cart-product/processor.php?product_id=' + $product_id + '&string_img=' + $string_img + '&string_img2=' + $string_img2 + '&string_img3=' + $string_img3 + '&category_id=' + $category_id + '&product_id2=' + $product_id2 + '');
	}
	
	function scan(){		
		$object = $('.edit_cart_product_processor').html();
		if ($object === undefined){
				$('#index').css('display', 'block');
		} else {
				clearInterval($flajok_scan);		
				$('#index').css('display', 'none');
				//openProduct('span-' + $category_id + '', $category_id, '', '', '', ''); // Открыть заново категорию				
				//if ($product_id != 0) openPopup('cartProduct', $product_id, $category_id); // Открыть заново карточку товара (а то без этого с картинками проблемы возникают)
				
				AjaxFormRequest('ID-cart_product_imgBasicaly', 'ajaxForm', 'modules/edit-cart-product/imgIframeReload.php?product_id=' + $product_id + '&category_id=' + $category_id + '&id=1');
				function scan2(){		
					$object2 = $('#ID-cart_product_imgBasicaly .reloadIframe').html();
					if ($object2 === undefined){} else {
							clearInterval($flajok_scan2);		
							$('#ID-cart_product_imgBasicaly .reloadIframe').remove();
							var nices10 = $("#edit-cart-media-iframe1").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});							
					}
				}
				var $flajok_scan2 = setInterval(scan2, 10);				
				
				
				AjaxFormRequest('ID-cart_product_imgAdd', 'ajaxForm', 'modules/edit-cart-product/imgIframeReload.php?product_id=' + $product_id + '&category_id=' + $category_id + '&id=2');
				function scan3(){		
					$object3 = $('#ID-cart_product_imgAdd .reloadIframe').html();
					if ($object3 === undefined){} else {
							clearInterval($flajok_scan3);		
							$('#ID-cart_product_imgAdd .reloadIframe').remove();
							var nices11 = $("#edit2-cart-media-iframe1").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});							
					}
				}
				var $flajok_scan3 = setInterval(scan3, 10);
				
				AjaxFormRequest('ID-cart_product_imgAdd2', 'ajaxForm', 'modules/edit-cart-product/imgIframeReload.php?product_id=' + $product_id + '&category_id=' + $category_id + '&id=3');
				function scan4(){		
					$object4 = $('#ID-cart_product_imgAdd2 .reloadIframe').html();
					if ($object4 === undefined){} else {
							clearInterval($flajok_scan4);		
							$('#ID-cart_product_imgAdd2 .reloadIframe').remove();
							var nices14 = $("#edit3-cart-media-iframe1").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});
							$('#edit2-cart-media-iframe1').on('load', function() {
								$('#edit2-cart-media-iframe1').css('height', '' + $(window).height() / 4.5 + 'px');
							});
							$('#edit3-cart-media-iframe1').on('load', function() {
								$('#edit3-cart-media-iframe1').css('height', '' + $(window).height() / 4.5 + 'px');
							});	
					}
				}
				var $flajok_scan4 = setInterval(scan4, 10);
				
		}
	}
	var $flajok_scan = setInterval(scan, 10);
}

function closePopup(){
	$('.popupMask').css('display', 'none');
	$('#blockPopup').html('');	

	
	$category_id = $('#category_id').html();
	if ($category_id > 0) openProduct('span-' + $category_id + '', $category_id, '', '', '', '');	
	$('#ascrail2000').css('display', 'block');
	$('#ascrail2004').css('display', 'none');
	$('#blockPopup2').html('');	
}

function closePopup2(){
	//$('.popupMask').css('display', 'none');
	$('#blockPopup2').html('');	

	/*
	$category_id = $('#category_id').html();
	if ($category_id > 0) openProduct('span-' + $category_id + '', $category_id, '', '', '', '');	
	$('#ascrail2000').css('display', 'block');
	$('#ascrail2004').css('display', 'none');
	*/
}

function deleteProduct(){	
	$category_id = $('.specialBlockShare #category_id').html();	
	$id_string = '';
	$id = 0;
	$('.checkProduct').each(function( index ) {		
		if ($(this).is(':checked')) {
			$id = $(this).attr('data-id');				
			$id_string = $id_string + $id + '~';
		}
	});

	if ($id_string != ''){
		if (confirm("Удалить?")){
				AjaxFormRequest('blockPopup', 'ajaxForm', 'modules/delete-cart-product/delete-cart-product.php?product_id=' + $id_string + '&category_id=' + $category_id + '');				
				
				function scan(){		
					$object = $('.delete-cart_product').html();
					if ($object === undefined){} else {
							clearInterval($flajok_scan);									
							openProduct('span-' + $('.specialBlockShare #category_id').html() + '', $('.specialBlockShare #category_id').html(), '', '', '', '');
							alert('Удалено');		
					}
				}
				var $flajok_scan = setInterval(scan, 10);
				
		}
	} else {
		alert('Не выбраны продукты');
	}
}

function addVolume(){	
	AjaxFormRequest('addVolumeManagerForm', 'ajaxForm', 'modules/volume/miniform.php');		
	$('.volume_scroll_class').css('height', '' + $(window).height()-200 + 'px');	
}

function addVolume2(){
	AjaxFormRequest('channel', 'form-volume', 'modules/volume/processor.php?action=add');
	function scan(){		
		$object = $('.volume_processor').html();
		if ($object === undefined){} else {
				clearInterval($flajok_scan);									
				alert('Сохранено');
				reloadVolume();
				
		}
	}
	var $flajok_scan = setInterval(scan, 10);
}

function deleteVolume(){
	$id_string = '';
	$id = 0;
	$('.check-volume').each(function( index ) {		
		if ($(this).is(':checked')) {
			$id = $(this).attr('data-id');				
			$id_string = $id_string + $id + '~';
		}
	});
	if ($id_string != ''){
		if (confirm("Удалить?")){			
			AjaxFormRequest('channel', 'form-volume', 'modules/volume/processor.php?action=delete&id_string=' + $id_string + '');
			reloadVolume();
			
			function scan(){		
				$object = $('.volume_processor').html();
				if ($object === undefined){} else {
						clearInterval($flajok_scan);									
						if (parseInt($('.specialBlockShare #category_id').html()) > 0){
							openProduct('span-' + $('.specialBlockShare #category_id').html() + '', $('.specialBlockShare #category_id').html(), '', '', '', '');
						}
				}
			}
			var $flajok_scan = setInterval(scan, 10);
		}
	} else {
		alert('Не выбраны единицы измерения');
	}
}

function editVolume(){
	$id_string = '';
	$id = 0;
	$d = 0;
	$('.check-volume').each(function( index ) {		
		if ($(this).is(':checked')) {
			$d++;
			$id = $(this).attr('data-id');
		}
	});
	if ($d == 1){
		AjaxFormRequest('addVolumeManagerForm', 'ajaxForm', 'modules/volume/miniform2.php?id=' + $id + '');
		$('.volume_scroll_class').css('height', '' + $(window).height()-200 + 'px');		
	} else {
		alert('Пожалуйста, выберите только один параметр');
	}
}

function editVolume2($id){
	AjaxFormRequest('channel', 'form-volume', 'modules/volume/processor.php?action=edit&id=' + $id + '');
	reloadVolume();	
	
	function scan(){		
		$object = $('.volume_processor').html();
		if ($object === undefined){} else {
				clearInterval($flajok_scan);									
				if (parseInt($('.specialBlockShare #category_id').html()) > 0){	
					openProduct('span-' + $('.specialBlockShare #category_id').html() + '', $('.specialBlockShare #category_id').html(), '', '', '', '');
				}	
		}
	}
	var $flajok_scan = setInterval(scan, 10);
}

function addAttr(){				
	$('#addAttrManagerForm2').html('');
	AjaxFormRequest('addAttrManagerForm', 'ajaxForm', 'modules/attr/miniform.php?action=add');
	$('.attr_scroll_class').css('height', '' + $(window).height()-300 + 'px');	
}

function addAttr2(){	
	$attr2 = '';
	$('#addAttrManagerForm2 #listingAttr2 span').each(function( index ) {
		$attr2 = $attr2 + $(this).html() + '~';
	});	
	$('#ID-special-secret-input').val($attr2);
	AjaxFormRequest('channel', 'form-attr', 'modules/attr/processor.php?action=add');	
	
	function scan(){		
		$object = $('.attr_processor').html();
		if ($object === undefined){} else {
				clearInterval($flajok_scan);													
				reloadAttr();
				alert('Сохранено');
		}
	}
	var $flajok_scan = setInterval(scan, 10);
	
	$('#addAttrManagerForm').html('');
	$('#addAttrManagerForm2').html('');
}

function editAttr(){
	$('#addAttrManagerForm2').html('');
	$id_string = '';
	$id = 0;
	$volume_id = '';
	$d = 0;
	$('.check-attr').each(function( index ) {		
		if ($(this).is(':checked')) {
			$d++;
			$id = $(this).attr('data-id');
			$volume_id = $(this).attr('item-id');
		}
	});
	if ($d == 1){
		AjaxFormRequest('addAttrManagerForm', 'ajaxForm', 'modules/attr/miniform.php?action=edit&volume_id=' + $volume_id + '&id=' + $id + '');				
		$('.attr_scroll_class').css('height', '' + $(window).height()-300 + 'px');	
		function scan(){		
			$object = $('.attr_miniform').html();
			if ($object === undefined){} else {
					clearInterval($flajok_scan);									
					if (($('#ID-mainSelectAttrType2').val() > 1) && ($('#ID-mainSelectAttrType2').val() != 3) && ($('#ID-mainSelectAttrType2').val() != 4)){
						AjaxFormRequest('addAttrManagerForm2', 'ajaxForm', 'modules/attr/miniform2.php?id=' + $id + '&type2=' + $('#ID-mainSelectAttrType2').val() + '');			   

						function scan2(){		
							$object2 = $('.attr_miniform2').html();
							if ($object2 === undefined){} else {
								clearInterval($flajok_scan2);
								var nices5 = $(".miniform2 #superTable1").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});
							}
						}
						var $flajok_scan2 = setInterval(scan2, 10);						
					}
			}
		}
		var $flajok_scan = setInterval(scan, 10);
		
	} else {
		alert('Пожалуйста, выберите только один параметр');
	}
}

function editAttr2($id){
	$attr2 = '';
	$('#addAttrManagerForm2 #listingAttr2 span').each(function( index ) {
		$attr2 = $attr2 + $(this).html() + '~';
	});
	$('#ID-special-secret-input').val($attr2);
	
	AjaxFormRequest('channel', 'form-attr', 'modules/attr/processor.php?action=edit&id=' + $id + '');
	
	$('#addAttrManagerForm').html('');
	$('#addAttrManagerForm2').html('');
	
	function scan(){		
		$object = $('.attr_processor').html();
		if ($object === undefined){
				$('#index').css('display', 'block');
		} else {
				clearInterval($flajok_scan);
				$('#index').css('display', 'none');				
				reloadAttr();				
				alert('Сохранено');
				if (parseInt($('.specialBlockShare #category_id').html()) > 0){		
					openProduct('span-' + $('.specialBlockShare #category_id').html() + '', $('.specialBlockShare #category_id').html(), '', '', '', '');		
				}
		}
	}
	var $flajok_scan = setInterval(scan, 10);
}

function deleteAttr(){
	$('#addAttrManagerForm').html('');
	$id_string = '';
	$id = 0;
	$varning = 0;
	$('.check-attr').each(function( index ) {		
		if ($(this).is(':checked')) {
			$id = $(this).attr('data-id');		
			if (($id == 63) || ($id == 5) || ($id == 4) || ($id == 3) || ($id == 2) || ($id == 1) || ($id == 546) || ($id == 550) || ($id == 551) || ($id == 573)){
				$varning++;
			} else {
				$id_string = $id_string + $id + '~';
			}
		}
	});
	if ($id_string != ''){
		if (confirm("Удалить?")){
			if ($varning > 0) alert('В Вашем выборе есть статичные атрибуты. Они не подлежат удалению.');
				
			AjaxFormRequest('channel', 'form-attr', 'modules/attr/processor.php?action=delete&id_string=' + $id_string + '');
		
			function scan(){		
				$object = $('.attr_processor').html();
				if ($object === undefined){} else {
						clearInterval($flajok_scan);									
						reloadAttr();						
						if (parseInt($('.specialBlockShare #category_id').html()) > 0){
							openProduct('span-' + $('.specialBlockShare #category_id').html() + '', $('.specialBlockShare #category_id').html(), '', '', '', '');
						}			
				}
			}
			var $flajok_scan = setInterval(scan, 10);
		}
	} else {
		alert('Не выбраны единицы атрибуты');
	}
}

function attrCategory(){
	$('#addAttrManagerForm2').html('');
	$id_attr = '';
	$id = 0;
	$i = 0;
	$('.check-attr').each(function( index ) {		
		if ($(this).is(':checked')) {
			$i++;
			$id = $(this).attr('data-id');
			$id_attr = $id_attr + $(this).attr('data-id') + '~';
		}
	});
	if ($i > 0){
		if ($i < 6){	
			$('.attr_scroll_class').css('height', '' + $(window).height()-350 + 'px');	
			$('#addAttrManagerForm').html("<div id='category-connect-loader' class='loader'><img src='img/loader.gif' /></div>");
			AjaxFormRequest('addAttrManagerForm', 'ajaxForm', 'modules/attr/hierarchy-selector.php?id_attr=' + $id_attr + '');
						
			function scan(){		
				$object = $('.attr_hierarchy_selector').html();
				if ($object === undefined){} else {
						clearInterval($flajok_scan);									
						$('#ID-connect-cat .ulLevelThree').each(function( index ) {
							$("#ID-connect-cat #" + $(this).attr('id')).append($("#ID-connect-cat #" + $(this).attr('id') + " > li").remove().sort(function(a, b) {
								var at = $(a).text(), bt = $(b).text();
								return (at > bt)?1:((at < bt)?-1:0);
							}));
						});
						
						$("#ID-connect-cat").append($("#ID-connect-cat > li").remove().sort(function(a, b) {
							var at = $(a).text(), bt = $(b).text();
							return (at > bt)?1:((at < bt)?-1:0);
						}));
						var nices3 = $("#addAttrManagerForm").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});						
				}
			}
			var $flajok_scan = setInterval(scan, 10);
			
		} else {
			alert('Пожалуйста, выберите не более 5 атрибутов');
		}
	} else {
		alert('Пожалуйста, выберите атрибут');
	}
}

function connectCategorySave($typeFunction){
	if ($typeFunction == 'attrCategory'){
		
		$id_string_attr = '';
		$id = 0;
		$i = 0;
		$('.check-attr').each(function( index ) {		
			if ($(this).is(':checked')) {
				$i++;
				$id = $(this).attr('data-id');				
				$id_string_attr = $id_string_attr + $(this).attr('data-id') + '~';
			}
		});
		if ($i > 0){
			$('.CLASS-connectCategorySave').css('display', 'none');
			$id_string_hierarchy = '';
			$id = 0;
			$('#blockPopup .hierarchy-check').each(function( index ) {		
				if ($(this).is(':checked')) {
					$id = $(this).attr('data-id');				
					$id_string_hierarchy = $id_string_hierarchy + $id + '~';
				}
			});			
			AjaxFormRequest('channel', 'form-attr', 'modules/attr/processor.php?action=attr-category&id_string_attr=' + $id_string_attr + '&id_string_hierarchy=' + $id_string_hierarchy + '');		

			function scan(){		
				$object = $('.attr_processor').html();
				if ($object === undefined){
					$('#index').css('display', 'block');
				} else {
						clearInterval($flajok_scan);									
						reloadAttr();			
						alert('Сохранено');						
						if (parseInt($('.specialBlockShare #category_id').html()) > 0){				
							openProduct('span-' + $('.specialBlockShare #category_id').html() + '', $('.specialBlockShare #category_id').html(), '', '', '', '');				
						}
				}
			}
			var $flajok_scan = setInterval(scan, 10);

		} else {
			alert('Пожалуйста, выберите атрибут');	
		}
	}	
}


function checkAllProduct(){
	setTimeout(function () {
		if ($('#check-all').is(':checked')){			
			$('.checkProduct').each(function( index ) {				
				$(this).prop('checked', true);				
			});
		} else {			
			$('.checkProduct').each(function( index ) {
				$(this).prop('checked', false);
			});
		}
	}, 500);	
}

function checkHierarchyChild($child_id){
	setTimeout(function () {
		if ($('#ID-check-hierarchy-' + $child_id + '').is(':checked')){
			$('.hierarchy-check').each(function( index ) {		
				if ($(this).attr('data-parent') == $child_id) $(this).prop('checked', true);
				if ($(this).attr('item-id') == $child_id) $(this).prop('checked', true);
			});
		} else {			
			$('.hierarchy-check').each(function( index ) {
				if ($(this).attr('data-parent') == $child_id) $(this).prop('checked', false);
				if ($(this).attr('item-id') == $child_id) $(this).prop('checked', false);
			});			
		}
	}, 500);
}

function checkSpan($name_id, $data_id){	
	$('#' + $name_id + $data_id + '').click();
}

function checkSpan2($name_id, $data_id){
	$('#' + $name_id + $data_id + '').click();
	
	if ($('#' + $name_id + $data_id + '').is(':checked')){
		$('#' + $name_id + '2' + $data_id + '').css('box-shadow', '0px 0px 5px red');
	} else {
		$('#' + $name_id + '2' + $data_id + '').css('box-shadow', 'none');
	}
}

function checkSpan3($name_id, $data_id){
	$('#' + $name_id + $data_id + '').click();
	
	if ($('#' + $name_id + $data_id + '').is(':checked')){
		$('#' + $name_id + '3' + $data_id + '').css('box-shadow', '0px 0px 5px red');
	} else {
		$('#' + $name_id + '3' + $data_id + '').css('box-shadow', 'none');
	}
}

function closeMiniForm(){
	$('.miniform').html('');
	$('.attr_scroll_class').css('height', '' + $(window).height()-100 + 'px');	
	$('.volume_scroll_class').css('height', '' + $(window).height()-100 + 'px');
}

function formLoadNewXMLsubmit_closeButton(){
	$('input[name="formLoadNewXMLsubmit"]').css('display', 'none');
}

function activeSpan($id){
	$('.spanPoint').css('color', 'blue');
	$('#' + $id).css('color', 'red');
}

function selectAttrType2(){	
	if (($('#ID-mainSelectAttrType2').val() > 1) && ($('#ID-mainSelectAttrType2').val() != 3) && ($('#ID-mainSelectAttrType2').val() != 4)){
		$id = 0;
		$d = 0;
		$('.check-attr').each(function( index ) {		
			if ($(this).is(':checked')) {
				$d++;
				$id = $(this).attr('data-id');
			}
		});
		if ($d == 1){
			AjaxFormRequest('addAttrManagerForm2', 'form-attr', 'modules/attr/miniform2.php?id=' + $id + '&type2=' + $('#ID-mainSelectAttrType2').val() + '');
			function scan(){		
				$object = $('.attr_miniform2').html();
				if ($object === undefined){} else {
						clearInterval($flajok_scan);									
						var nices5 = $(".miniform2 #superTable1").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});						
				}
			}
			var $flajok_scan = setInterval(scan, 10);

		} 
		if ($d > 1){
			alert('Пожалуйста, выберите только один параметр');
		}
		if ($d == 0){
			AjaxFormRequest('addAttrManagerForm2', 'form-attr', 'modules/attr/miniform2.php');			
		}
	} else {
		$('#addAttrManagerForm2').html('');
	}
	
	
	if ($('#ID-mainSelectAttrType2').val() > 0){
		$('#ID-mainSelectAttrType-TR').css('display', 'none');
	} else {
		$('#ID-mainSelectAttrType-TR').css('display', 'table-row');
	}
}

function addAttrType2(){
	AjaxFormRequest('addAttrManagerForm3', 'form-attr', 'modules/attr/miniform2.php?action=add');
}

function addAttrType2_f(){
	if ($('#ID-mainSelectAttrType2').val() == 2){ // для селекта
		$i = 0;
		$('#addAttrManagerForm2 #listingAttr2 input[type="checkbox"]').each(function( index ) {		
			$i++;
		});
		$i++;
		$variable = $('#listingAttr2 tbody').html();
		if ($('#ID-attrType2').val() != ''){
			$variable = "<tr id='checkAttr2-TR-" + $i + "'><td><input data-id='" + $i + "' type='checkbox' id='checkAttr2-" + $i + "'></td><td><span onclick='checkSpan(\"checkAttr2-\", " + $i + ");' id='checkAttr2-SPAN-" + $i + "'>" + $('#ID-attrType2').val() + "</span></td></tr>" + $variable;
			$('#listingAttr2 tbody').html($variable);
			$('#ID-attrType2').val('');
		} else {
			alert('Нельзя использовать пустое значение');
		}
	}
	if ($('#ID-mainSelectAttrType2').val() == 3){ // для логических
		$i = 0;
		$('#addAttrManagerForm2 #listingAttr2 input[type="checkbox"]').each(function( index ) {		
			$i++;
		});
		$i++;		
		if ($i == 1){
			$variable = $('#listingAttr2 tbody').html();
			if ($('#ID-attrType2').val() != ''){
				$variable = "<tr id='checkAttr2-TR-" + $i + "'><td><input data-id='" + $i + "' type='checkbox' id='checkAttr2-" + $i + "'></td><td><span onclick='checkSpan(\"checkAttr2-\", " + $i + ");' id='checkAttr2-SPAN-" + $i + "'>" + $('#ID-attrType2').val() + "</span></td></tr>" + $variable;
				$('#listingAttr2 tbody').html($variable);
				$('#ID-attrType2').val('');		
			} else {
				alert('Нельзя использовать пустое значение');
			}
		} else {
			alert('Для логических значений "Да / Нет" можно использовать только один чекбукс')
		}
	}
}

function deleteAttrType2(){		
	if (confirm("Удалить?")){
		$('#addAttrManagerForm3').html('');
		$('#addAttrManagerForm2 #listingAttr2 input[type="checkbox"]').each(function( index ) {
			if ($(this).is(':checked')) {
				$id = $(this).attr('id');
				$data_id = $(this).attr('data-id');
				$('#checkAttr2-TR-' + $data_id).remove();
			}
		});			
	}
}

function editAttrType2(){
	$i = 0;
	$id = 0;
	$('#addAttrManagerForm2 #listingAttr2 input[type="checkbox"]').each(function( index ) {
		if ($(this).is(':checked')) {
			$i++;
			$id = $(this).attr('data-id');
		}		
	});
	
	if ($i == 1){	
		AjaxFormRequest('addAttrManagerForm3', 'form-attr', 'modules/attr/miniform2.php?action=edit');

		function scan(){		
			$object = $('.attr_miniform2').html();
			if ($object === undefined){} else {
					clearInterval($flajok_scan);									
					$('#ID-attrType2').val($('#checkAttr2-SPAN-' + $id).html());					
					$('#addEditAttr2').attr('onclick', 'editAttrType2_last();');		
					$('#addEditAttr2').val('Изменить');		
			}
		}
		var $flajok_scan = setInterval(scan, 10);
		
	} else {
		alert('Пожайлуста, выберите только одно значение')
	}
}

function editAttrType2_last(){	
	$i = 0;
	$id = 0;
	$('#addAttrManagerForm2 #listingAttr2 input[type="checkbox"]').each(function( index ) {
		if ($(this).is(':checked')) {
			$i++;
			$id = $(this).attr('data-id');
		}		
	});
	
	if ($i == 1){		
		$('#checkAttr2-SPAN-' + $id).html($('#ID-attrType2').val());
	}	
}



/*======== SPECIAL SELECT =======*/
function specialSelectOpen($formName, $blockId, $sqlTable, $text, $id, $selectBlock, $selectName){	
	if ($('#' + $blockId).html() == ''){
		AjaxFormRequest($blockId, $formName, 'modules/special-select/special-select.php?formName=' + $formName + '&blockId=' + $blockId + '&sqlTable=' + $sqlTable + '&text=' + $text + '&id=' + $id + '&selectBlock=' + $selectBlock + '&selectName=' + $selectName + '');
		$('.specialSelect-list').html('');
		$('#' + $selectBlock + ' .specialSelect-header-input').css('display', 'block');
	} else {
		$('#' + $blockId).html('');
		$('#' + $selectBlock + ' .specialSelect-header-input').css('display', 'none');
		$('.specialSelect-list').html('');
	}
}

function specialSelectClick($formName, $blockId, $sqlTable, $text, $id, $selectBlock, $id2, $selectName){
	$('#' + $selectBlock + ' .specialSelect-header-input').css('display', 'none');
	$('#' + $selectBlock + ' .specialSelect-header-value span').html($('#' + $selectBlock + ' #ID-specialSelect-li-' + $id2 + ' span').html());
	
	
	$('#' + $selectBlock + ' input[name="' + $selectName + '"]').val($('#' + $selectBlock + ' #ID-specialSelect-li-' + $id2 + ' span').html());
	
	
	$('#' + $selectBlock + ' .specialSelect-header-value span').attr('data-id', $id2);
	$('#' + $blockId).html('');
}

function specialSelectpress($formName, $blockId, $sqlTable, $text, $id, $selectBlock, $id2){
	
	$string = $('#' + $selectBlock + ' input[type="text"]').val();	
	if ($string.length > 1){
		AjaxFormRequest($blockId, $formName, 'modules/special-select/special-select.php?formName=' + $formName + '&blockId=' + $blockId + '&sqlTable=' + $sqlTable + '&text=' + $text + '&id=' + $id + '&selectBlock=' + $selectBlock + '&string=' + $string + '');	
	} else {
		AjaxFormRequest($blockId, $formName, 'modules/special-select/special-select.php?formName=' + $formName + '&blockId=' + $blockId + '&sqlTable=' + $sqlTable + '&text=' + $text + '&id=' + $id + '&selectBlock=' + $selectBlock + '');	
	}
	
	/*
	$(document).keyup((e) => {
		if (e.keyCode == 8) { // если нажали esc
			$string = $('#' + $selectBlock + ' input[type="text"]').val();	
			if ($string.length > 1){
				AjaxFormRequest($blockId, $formName, 'modules/special-select/special-select.php?formName=' + $formName + '&blockId=' + $blockId + '&sqlTable=' + $sqlTable + '&text=' + $text + '&id=' + $id + '&selectBlock=' + $selectBlock + '&string=' + $string + '');	
			} else {
				AjaxFormRequest($blockId, $formName, 'modules/special-select/special-select.php?formName=' + $formName + '&blockId=' + $blockId + '&sqlTable=' + $sqlTable + '&text=' + $text + '&id=' + $id + '&selectBlock=' + $selectBlock + '');	
			}
		}
		// 40
		// 38
	});	
	*/
}


/*======== END SPECIAL SELECT =======*/








/*======== TAB =======*/

function tab($id){
	$('.tab').css('display', 'none');
	$('.spanTab').css('color', 'blue');
	$('#block-' + $id).css('display', 'block');	
	$('#spanTab-' + $id).css('color', 'red');
	$('#k1').html('');
}

function loadTab($blockId, $formId){
	$category_id = $('.specialBlockShare #category_id').html();		
	
	AjaxFormRequest($blockId, $formId, 'modules/filtr/miniform.php?action=showFilter&category_id=' + $category_id + '');
	
	function scan(){		
		$object = $('.filtr_miniform').html();
		if ($object === undefined){
				$('#index').css('display', 'block');
		} else {
				clearInterval($flajok_scan);									
				$('#index').css('display', 'none');
				$('.sortable-ul').sortable();	
				
				$('#block-2-child').css('height', '' + $(window).height()-150 + 'px');
				var nices8 = $("#block-2-child").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});				
		}
	}
	var $flajok_scan = setInterval(scan, 10);
	
}

/*======== END TAB =======*/










function saveFiltrShow(){
	if (parseInt($('.specialBlockShare #category_id').html()) > 0){	
		$string = '';
		$warning = 0;
		$('.CLASS-showAttrXLS').each(function( index ) {
			if ($(this).is(':checked')) {
				$string = $string + $(this).val() + '~';
			} else {
				if ($(this).val() == '-2') $warning++;
				if ($(this).val() == '-1') $warning++;			
			}
		});
		if ($warning > 0){
			alert('Нельзя убрать "Имя продукта" и "Артикул"');
		} else {		
			AjaxFormRequest('channel', 'form-filter', 'modules/filtr/processor.php?action=saveFiltrShow&stringId=' + $string + '&category_id=' + $('.specialBlockShare #category_id').html() + '');
			//alert('Сохранено');
			$('#index').css('display', 'block');
			
			
			
			function scan(){		
				$object = $('.filtr_processor').html();
				if ($object === undefined){} else {
						clearInterval($flajok_scan);
						openProduct('span-' + $('.specialBlockShare #category_id').html() + '', $('.specialBlockShare #category_id').html(), '', '', '', '');
				}
			}
			var $flajok_scan = setInterval(scan, 10);
		}
	} else {
		alert('Выберите категорию');
	}	
}

function saveFiltrSort(){
	if (parseInt($('.specialBlockShare #category_id').html()) > 0){	
		$string = '';	
		$('.CLASS-sortAttrXLS').each(function( index ) {		
			$string = $string + $(this).attr('data-id') + '~';
		});	
		
		AjaxFormRequest('channel', 'form-filter', 'modules/filtr/processor.php?action=saveFiltrSort&stringId=' + $string + '&category_id=' + $('.specialBlockShare #category_id').html() + '');
		//alert('Сохранено');
		$('#index').css('display', 'block');
		
		function scan(){		
			$object = $('.filtr_processor').html();
			if ($object === undefined){} else {
					clearInterval($flajok_scan);													
					openProduct('span-' + $('.specialBlockShare #category_id').html() + '', $('.specialBlockShare #category_id').html(), '', '', '', '');
			}
		}
		var $flajok_scan = setInterval(scan, 10);
	} else {
		alert('Выберите категорию');
	}
}




function xls(){	
	// Собираем таблицу из desctop и кладем в спецблок
		$table = '<thead>' + $('.desctop #superTable1 .table_sort1 thead').html() + '</thead>';	
		$('#xls_data_block').html($table);
		$('#xls_data_block input[type="text"]').remove();	
		$('#xls_data_block i').remove();	
		$table = $('#xls_data_block').html();
		
		$('#xls_data_block').html('');
		$table = $table + '<tbody>';
		$i = 0;
		$('.checkProduct').each(function( index ) {
			if ($(this).is(':checked')){	
				$i++;			
				$tr = $('#product-' + parseInt($(this).attr('data-id'))).html();			
				$table = $table + "<tr>" + $tr + "</tr>";			
			}		
		});
		
		if ($i == 0){
			$table = $table + $('.desctop #superTable1 .table_sort1 tbody').html();
		}
		$table = $table + '</tbody>';
		
		$table = "<table class='xls_table'>" + $table + "</table>";
		$('#xls_data_block').html($table);
	// end Собираем таблицу из desctop и кладем в спецблок #xls_data_block
	
	
	// Удаление чекбуксов
		$('#xls_data_block .xls_table > thead > tr > td:first-child').remove();	
		$('#xls_data_block .xls_table > tbody > tr > td:first-child').remove();	
	
	// Скан каждой tr	
	$('#xls_data_block tr').each(function( index ) {
		$tr = $(this).html();
		
		// Ликвидируем <img src  и оставляем только url от картинки
			$i = 0;
			while ($i < 1000){
				$i++;
				
				if ($('#thooseTypeXLS').val() == 'url'){
					$tr = $tr.replace('<img style="width: 100px;" src="', '');
					$tr = $tr.replace('"><span style="display: none;"></span>', '');					
				} else {					
					$tr = $tr.replace('<td><img style="width: 100px;" src="', '<td height="120"><img height="100" align="middle" src="');
				}
				
				$tr = $tr.replace('<img style="width: 50px;" src="', '');				
				$tr = $tr.replace('"><div style="display: none;"></div>', '; ');							
				$tr = $tr.replace('<td class="annotation"', '<td height="120"');

			}		
		$(this).html($tr);
	});	
	
	// Кидаем таблицу в input text на экспорт в excel
		$('#xls_data').val($('#xls_data_block').html());	
		$('.r_report_button--excel').click();
		$('#xls_data_block').html('');
		$table = '';
}








function checkAllCat(){
	setTimeout(function () {
		if ($('#check-all-cat').is(':checked')){			
			$('.hierarchy-check').each(function( index ) {				
				$(this).prop('checked', true);				
			});
		} else {			
			$('.hierarchy-check').each(function( index ) {
				$(this).prop('checked', false);
			});
		}
	}, 500);	
}

function showCartAttr($block, $id, $product_id, $category_id, $datchik_img){	
	$('#resultEditCartProductSave').html('');
	
	$block_id = 1;
	
	if ($block == 'sap'){
		$block_id = 1;
		$('.cart-tab li:nth-child(1)').attr('class', 'active');
		$('.cart-tab li:nth-child(2)').attr('class', '');
		
		$('#ID-form-edit-cart-product-block1').css('display', 'block');
		$('#ID-form-edit-cart-product-block2').css('display', 'none');	
	}
	if ($block == 'dynamic'){
		$block_id = 2;
		$('.cart-tab li:nth-child(1)').attr('class', '');
		$('.cart-tab li:nth-child(2)').attr('class', 'active');
		
		$('#ID-form-edit-cart-product-block1').css('display', 'none');
		$('#ID-form-edit-cart-product-block2').css('display', 'block');		
	}
}

function valid(){	
	$('.plusImg').css('display', 'none');
}

function reloadAttr(){	
	$order = get_order_sort(3);
	$td = get_td_sort(3);		
	AjaxFormRequest('blockPopup', 'ajaxForm', 'modules/attr/attr.php');		
	
	function scan(){		
		$object = $('.attr_attr').html();
		if ($object === undefined){
				$('#index').css('display', 'block');
		} else {
				clearInterval($flajok_scan);
				$('#index').css('display', 'none');
				sortableHead(3);
				function_table_sort(3, $order, $td);				
				var nices2 = $("#attr_scroll_id").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});
				setTimeout(function () {
					$('.attr_scroll_class').css('height', '' + $(window).height()-100 + 'px');
				}, 100);
				
		}
	}
	var $flajok_scan = setInterval(scan, 10);
}

function reloadVolume(){	
	$order = get_order_sort(4);
	$td = get_td_sort(4);		
	AjaxFormRequest('blockPopup', 'ajaxForm', 'modules/volume/volume.php');		
	
	function scan(){		
		$object = $('.volume_volume').html();
		if ($object === undefined){
				$('#index').css('display', 'block');
		} else {
				clearInterval($flajok_scan);		
				$('#index').css('display', 'none');				
				sortableHead(4);
				function_table_sort(4, $order, $td);
				$('.volume_scroll_class').css('height', '' + $(window).height()-100 + 'px');

				var nices6 = $(".volume_scroll_class").niceScroll({touchbehavior:false,cursorcolor:"#7780e3",cursoropacitymax:0.6,cursorwidth:8});		
		}
	}
	var $flajok_scan = setInterval(scan, 10);
}

function desctopFiltr($id){	
	$d = 0;
	$category_id = $('.specialBlockShare #category_id').html();
	$('#desctop-filtr-' + $id + '').keypress(function(event) {
		if (event.keyCode == 13){			
			$d++;
			if ($d == 1){
				if ($('#desctop-filtr-' + $id + '').val() != ''){
					$id_attr_filtr = '';
					$value_filtr = '';				
					$id_attr_filtr = $id_attr_filtr + $('#desctop-filtr-' + $id + '').attr('data-id') + '~';
					$value_filtr = $value_filtr + $('#desctop-filtr-' + $id + '').val() + '~';
					openProduct('span-' + $category_id + '', $category_id, $id_attr_filtr, $value_filtr, '', '');
				} else {
					$('#desctop-filtr-' + $id + '').css('display', 'none');
				}
			}
		}
	});		
	
}

function closeFiltrTeg($row, $s_d){
	$category_id = $('.specialBlockShare #category_id').html();
	openProduct('span-' + $category_id + '', $category_id, '', '', $row, $s_d);
}

function openDesctopFiltr($id){
	$('#desctop-filtr-' + $id + '').css('display', 'block');
	$('#lupa-desctop-filtr-' + $id + '').css('display', 'none');
	$('#close-desctop-filtr-' + $id + '').css('display', 'block');
	$('#desctop-filtr-' + $id + '').focus();
}


function closeDesctopFiltr($id){
	$('#desctop-filtr-' + $id + '').css('display', 'none');
	$('#lupa-desctop-filtr-' + $id + '').css('display', 'block');
	$('#close-desctop-filtr-' + $id + '').css('display', 'none');	
}


function closeInputClassShaddow($id){
	$('#inputClassShaddow-' + $id + '').css('display', 'none');		
	
	$('#ulId-' + $id + ' .inputClassShaddow').each(function( index ) {			
		$(this).css('display', 'none');
	});
	
	$('#ID-check-hierarchy-' + $id + '').prop('checked', true);
	$('#ulId-' + $id + ' .hierarchy-check').each(function( index ) {			
		$(this).prop('checked', true);
	});	
}

function addImg($product_id, $category_id){
	$('#ID-attrType2').click();
	
	function scan(){
		$object = $('#ID-attrType2').val().length;		
		if ($object == 0){} else {
			clearInterval($flajok_scan);
			$('#clickPlusImg').click();			
		}
	}
	var $flajok_scan = setInterval(scan, 100);
}
















