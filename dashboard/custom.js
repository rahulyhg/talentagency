     
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