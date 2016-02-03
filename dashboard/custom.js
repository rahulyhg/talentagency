     
 // For the Second level Dropdown menu, highlight the parent
    $( ".dropdown-menu" )
    .mouseenter(function() {
        $(this).parent('li').addClass('active');
    })
    .mouseleave(function() {
        $(this).parent('li').removeClass('active');
    });


$('input[type="checkbox"].line-blue, input[type="radio"].line-blue').each(function(){
	
	 var self = $(this),
      label = self.next(),
      label_text = label.text();

    label.remove();
	  
	self.iCheck({
      checkboxClass: 'icheckbox_line-blue',
      radioClass: 'iradio_line-blue',
      insert: '<div class="icheck_line-icon"></div>' + label_text
    });
	
});
$('input[type="checkbox"].line-green, input[type="radio"].line-green').each(function(){
	
	 var self = $(this),
      label = self.next(),
      label_text = label.text();

    label.remove();
	  
	self.iCheck({
      checkboxClass: 'icheckbox_line-green',
      radioClass: 'iradio_line-green',
      insert: '<div class="icheck_line-icon"></div>' + label_text
    });
	
});      
  



$(document).ready(function() {
	$(".switch").bootstrapSwitch();
    // Javascript to enable link to tab
          var hash = document.location.hash;
          if (hash) {
            console.log(hash);
            $('.nav-tabs a[href='+hash+']').tab('show');
          }

          // Change hash for page-reload
          $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
            window.location.hash = e.target.hash;
          });
 
$.fn.editable.defaults.ajaxOptions = {type: "GET"};

$('.editable').editable(); 

$('.data-table').dataTable( {
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
 
        "dom": 'T<"clear">lfrtip',
		"responsive": true,
        "tableTools":{  
			"aButtons": [
				{
				"sExtends" : "copy",
				"sButtonText": "Copy to Clipboard" 
				},
                "print",
                {
                    "sExtends":    "collection",
                    "sButtonText": "Save As",
                    "aButtons":    [ 
									{
									"sExtends": "csv",
									"sTitle": $(this).data('title'),
									"sFileName": "*.csv"
									},
									{
									"sExtends": "xls",
									"sTitle": $(this).data('title'),
									"sFileName": "*.xls"
									},
									{
									"sExtends": "pdf",
									"sTitle": $(this).data('title'),
									"sFileName": "*.pdf"
									} 
									]
                }
            ] 
             
        }
    } );
	
$('.input-group.date').datepicker({
    format: "yyyy-mm-dd",
    autoclose:true,
    todayHighlight: true
});

$('.input-group.daterange').daterangepicker({
    format: 'YYYY-MM-DD',
    ranges: {
       'Today': [moment(), moment()],
       'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
       'Last 7 Days': [moment().subtract(6, 'days'), moment()],
       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
       'This Month': [moment().startOf('month'), moment().endOf('month')],
       'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
       }
     
});
$('.input-group.daterange').on('apply.daterangepicker', function(ev, picker) {
  $('#start_date').val(picker.startDate.format('YYYY-MM-DD'));
  $('#end_date').val(picker.endDate.format('YYYY-MM-DD'));
});

$("abbr.timeago").timeago();

$(".masked").inputmask();

});

/* Code for fileupload Button  1*/

$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $(this).closest('.image-preview').popover('show');
        }, 
         function () {
           $(this).closest('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
   		$('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
/* / close Code for fileupload Button */


/* Code for fileupload Button2 */

$(document).on('click', '#close-preview2', function(){ 
    $('.image-preview2').popover('hide');
    // Hover befor close the preview
    $('.image-preview2').hover(
        function () {
           $(this).closest('.image-preview2').popover('show');
        }, 
         function () {
           $(this).closest('.image-preview2').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview2',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview2').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
   		$('.image-preview-clear2').click(function(){
        $('.image-preview2').attr("data-content","").popover('hide');
        $('.image-preview-filename2').val("");
        $('.image-preview-clear2').hide();
        $('.image-preview-input2 input:file').val("");
        $(".image-preview-input-title2").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input2 input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title2").text("Change");
            $(".image-preview-clear2").show();
            $(".image-preview-filename2").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview2").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
/* / close Code for fileupload Button */


