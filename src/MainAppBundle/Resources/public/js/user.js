jQuery(document).ready(function($) {
    area = ["userInformation","userEdit","collectionOverview"];
    btn = ["information-tab","edit-tab","collection-tab"];
    $(document).on('click', '.navUser', function()
    {
        const research = $(this).attr("data-id");

        let iCount = 0;
        let bFound = false;
        btn.forEach(function(element)
        {
            if(element === research)
            {
                bFound = true;
                $('#'+element).addClass("active");
            }
            else
            {
                $('#'+element).removeClass("active");
            }
            if(bFound === false)
            {
                iCount++;
            }
        });
        area.forEach(function(value, index)
        {
            if(index === iCount)
           {
                $("#"+value).show();
           }
           else
           {
               $("#"+value).hide();
           }
        });
    });


});