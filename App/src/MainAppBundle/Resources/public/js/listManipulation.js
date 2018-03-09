/**
 * Created by lerm on 17/07/2017.
 */
jQuery(document).ready(function($)
{

    var arrayDeferred = [];
    $("#submitDataList").click(function()
    {
        validateListData();
    });

    $(document).on('click', '.choiceList', function()
    {
        window.location = $(this).attr("data-href");
    });

    $(document).on('change', '#pointLimit', function()
    {
        arrayDeferred.push($.ajax({
            url: Routing.generate('main_app_updateList',"",true),
            data: {
                listId: $(this).attr('data-listId'),
                method: "updatePointLimit",
                value: $(this).val()
            },
            success: function(data) {
                console.log(data);
            },
            type: 'POST'
        }));
    });

    $(document).on('change', '#listName', function()
    {
        arrayDeferred.push($.ajax({
            url: Routing.generate('main_app_updateList',"",true),
            data: {
                listId: $(this).attr('data-listId'),
                method: "updateName",
                value: $(this).val()
            },
            success: function(data) {
                console.log(data);
            },
            type: 'POST'
        }));
    });

    $(document).on('change', '#artefactNumber', function()
    {
        arrayDeferred.push($.ajax({
            url: Routing.generate('main_app_updateList',"",true),
            data: {
                listId: $(this).attr('data-listId'),
                method: "updateArtefactNumber",
                value: $(this).val()
            },
            success: function(data) {
                console.log(data);
                $("#commandPointValue").html(data);
            },
            type: 'POST'
        }));
    });


    $(".addFormation").click(function(){

        var url = baseUrl+"/list/addFormation";
        var form = $('<form action="' + url + '" method="post">' +
            '<input type="number" name="list_id" value="' + $("#addFormation").attr("data-listId") + '" />' +
            '</form>');
        $('body').append(form);
        form.submit();
    });

    $(".addSquad").click(function () {


        var url = baseUrl+"/list/addSquad";
        var form = $('<form action="' + url + '" method="post">' +
            '<input type="number" name="list_id" value="' + $(this).attr("data-listId") + '" />' +
            '<input type="number" name="formation_id" value="' + $(this).attr("data-formationId") + '" />' +
            '</form>');
        $('body').append(form);
        form.submit();
    });

    $(".addModel").click(function () {


        var url = baseUrl+"/list/addModel";
        var form = $('<form action="' + url + '" method="post">' +
            '<input type="number" name="list_id" value="' + $(this).attr("data-listId") + '" />' +
            '<input type="number" name="squad_id" value="' + $(this).attr("data-squadId") + '" />' +
            '</form>');
        $('body').append(form);
        form.submit();
    });

    $(".collapse-focus").click(function(){
        $focusRow = $(this).attr("data-focus");
        $row =$("#collapseF"+$focusRow);
        if($row.is(":Visible"))
        {
            $row.hide();
        }
        else
        {
            $row.show();
        }
        console.log($focusRow);
    });

    $(".editModel").click(function(){
        var url = baseUrl+"/list/editModel";
        var form = $('<form action="' + url + '" method="post">' +
            '<input type="number" name="model_id" value="' + $(this).attr("data-modelid") + '" />' +
            '<input type="number" name="list_id" value="' + $(this).attr("data-listId") + '" />' +
            '</form>');
        $('body').append(form);
        form.submit();
    });

    $(".removeModel").click(function(){
        var url = baseUrl+"/list/removeModel";
        var form = $('<form action="' + url + '" method="post">' +
            '<input type="number" name="model_id" value="' + $(this).attr("data-modelid") + '" />' +
            '<input type="number" name="list_id" value="' + $(this).attr("data-listId") + '" />' +
            '</form>');
        $('body').append(form);
        form.submit();
    });


    $(document).on('click', '.exportETC', function()
    {
        var form = $('<form action="' + Routing.generate('export_ETC',"",true) + '" method="post">' +
            '<input type="number" name="list_id" value="' + $(this).attr("data-listId") + '" />' +
            '</form>');
        $('body').append(form);
        form.submit();
    });

    $(document).on('click', '.collapseRow', function()
    {
        var row = $(this).attr("data-row");
        var $row =$("#"+row);
        if($row.is(":Visible"))
        {
            $row.hide();
        }
        else
        {
            $row.show();
        }
    });


    $(document).on('click', '.duplicateModel', function()
    {
        var form = $('<form action="' + $(this).attr("data-URL") + '" method="post">' +
            '<input type="number" name="model_id" value="' + $(this).attr("data-modelid") + '" />' +
            '<input type="number" name="list_id" value="' + $(this).attr("data-listId") + '" />' +
            '</form>');
        $('body').append(form);
        form.submit();
    });



});

function validateListData()
{
}