function doRichtext() {
	tinymce.init({

		language: 'ru',
		mode: 'textareas',
		selector: '.richtext',
		branding: false,
		height: 300,
		document_base_url: '/',
		
		plugins : 'advlist table autolink link lists charmap fullscreen code paste searchreplace media anchor',
		

		menu: {
		//    file: { title: 'File', items: 'newdocument restoredraft | preview | print ' },
		    edit: { title: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace' },
		    view: { title: 'View', items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen' },
		    insert: { title: 'Insert', items: 'cmsImage cmsFile image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' },
		    format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats blockformats align | removeformat' },
		    tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | code wordcount' },
		    table: { title: 'Table', items: 'inserttable tableprops deletetable row column cell' },
		    help: { title: 'Help', items: 'help' },
		    
		//    custom: { title: "Custom menu", items: "basicitem nesteditem toggleitem" }
			},
		
		toolbar: "undo redo | bold italic | formatselect | alignleft alignright aligncenter alignjustify | numlist bullist | code fullscreen",
		
		menubar: 'edit insert view format table tools custom',


		
		
		setup: function (editor) {
			var toggleState = false;
		
			editor.ui.registry.addMenuItem('cmsImage', {
				text: 'Вставить картинку',
				icon: 'image',
				onAction: function () {
					$.fancybox.open({
						src: 'popup/images/',
						type: 'iframe',
			
						opts: {
							afterShow: function(instance, current) {
								},
							iframe: {
								css: {
									width: '95%',
									height: '95%',
									}
								}
							}
						});
					
					}
				});
				
				
			editor.ui.registry.addMenuItem('cmsFile', {
				text: 'Вставить файл',
//				icon: 'image',
				onAction: function () {
					$.fancybox.open({
						src: 'popup/files/',
						type: 'iframe',
			
						opts: {
							afterShow: function(instance, current) {
								},
							iframe: {
								css: {
									width: '95%',
									height: '95%',
									}
								}
							}
						});
					
					}
				});
				
				
				
			}
		});
	}





function richtextInsertContent(content) {
	jQuery.fancybox.getInstance().close();
	tinymce.activeEditor.insertContent(content);
	}
	
	
	