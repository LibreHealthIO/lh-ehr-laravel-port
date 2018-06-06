$( function(){
    $('.col-sm-2').draggable({
        addClasses: true
    });

    var addClasses = $('.col-sm-2').draggable("option", "addClasses");
    $('#second').droppable({
        drop: function(event, ui){
            $(this)
                .addClass('ui-state-highlight')
                .css('background-color', '#fd7e14')
                .find('p')
                .html("Dropped " + $(ui.draggable).attr("id"))
                .html();
            $(ui.draggable).addClass('ui-state-highlight');
            //$(ui.draggable).draggable('disable');
            console.log('Dragged: ' + $(ui.draggable).attr("id"));
        }
    });
});
