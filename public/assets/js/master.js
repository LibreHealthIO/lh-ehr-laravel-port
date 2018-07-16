/*
|--------------------------------------------------------------------------
| Report generator master Javascript (JQuery) file.
|--------------------------------------------------------------------------
|
| This is the main JS file for the report generator.
| Basically, all Javascript work for the module is here.
| @author: Tigpezeghe Rodrige K. <tigrodrige@gmail.com>
|
| Copyright 2018 Tigpezeghe Rodrige K. <tigrodrige@gmail.com>
|
*/
var IDs = []; // array to store the IDs of dropped components.

$(function() {
  $('.col-sm-2').draggable({
      addClasses: true
  });

  var addClasses = $('.col-sm-2').draggable("option", "addClasses");

  $('#second').droppable({
    drop: function(event, ui) { // when a component is dropped
          $(this)
            .addClass('ui-state-highlight')     // 1. add this jquery class
            .css('background-color', '#fd7e14') // 2. change 'dropbox' background color
            .find('p')                          // 3. get the text in the 'dropbox'
            .html("Dropped " + $(ui.draggable).find("p").attr("title")) // 4. replace it with name of dropped component
            .html();
          $(ui.draggable).addClass('ui-state-highlight');
          console.log('Dragged: ' + $(ui.draggable).find("p").attr("title"));
          IDs.push((ui.draggable).attr("id")); // Push the id of the dropped component to the IDs array
    }
  });
});

/* This function gets the IDs of all (unique) dropped components and displays them.
 * @params: array: IDs
 * @return: Display these IDs
 */
function generate(IDs) {
  var option_ids = IDs.filter(function(item, i, IDs) {
    return i == IDs.indexOf(item);
  });
  console.log(option_ids);
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });
  $.ajax({
    url: 'reportgenerator/generate',
    type: 'get',
    data: { ids: option_ids },
    dataType: 'json',
    success: function(response){
      console.log(response);
      //alert("You've successfully sent the unique ids");
      jQuery('.alert').show();
      jQuery('.alert').html(response.option_ids);
      window.location.href = response.redirecturl; // your action should return an object having [redirecturl] property
    },
    error: function (httpRequest, textStatus, errorThrown) {  // detailed error messsage
      alert("Error: " + textStatus + " " + errorThrown + " " + httpRequest);
    }
  });
}

/* This function prints the report.
 * @params: DOM element: report_div
 * @return: Boolean: True
 */
function printReport(report_div) {
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById(report_div).innerHTML);
    mywindow.document.write('</body></html>');

    //mywindow.document.write('<script type="text/javascript">$(window).load(function() { window.print(); window.close(); });</script>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    setTimeout(function() { // This is for large documents
        mywindow.close();
    }, 10);

    mywindow.print();
    mywindow.close();

    return true;
}

$(document).ready(function() {
    /*** generate report from dropped components ***/
    $('#generate-button').click(function(e) {
        e.preventDefault();
        if (jQuery.isEmptyObject(IDs)) { // check if the user has dropped any component before trying to generate a report
            alert("Cannot generate a blank report! You must add at least one component.");
        } else {
            generate(IDs); // Call the generate function above when the generate button is clicked
        }
    });

    /*** Edit system feature ***/
    $('#edit-system-feature').on('show.bs.modal', function(e){
        $('#edit-system-feature #feature_name').val($(e.relatedTarget).data('feature_name'));
        $('#edit-system-feature #description').val($(e.relatedTarget).data('description'));
        $('#edit-system-feature-form').submit(function(){
            var id = $('#edit-system-feature #id').val($(e.relatedTarget).data('id'));
            $("#edit-system-feature-form").attr("action", "system_feature/" + id);
        });
    });

    /*** Delete system feature ***/
    $('#delete-system-feature').on('show.bs.modal', function(e){
        $('#delete-system-feature #feature_name').text($(e.relatedTarget).data('feature_name'));
        $('#delete-system-feature-form').submit(function(){
            var id = $('#delete-system-feature #id').val($(e.relatedTarget).data('id'));
            $("#delete-system-feature-form").attr("action", "system_feature/" + id);
        });
    });

    /*** Hide alert messsage after 30 seconds ***/
    setTimeout(function(){
        $("#alert").hide();
    }, 10000);
});
