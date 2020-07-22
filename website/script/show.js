$(document).ready(function(){
    $('#show').on('change', function() {
        if ( this.value == '0')
        {
            $("#jens").show();
            $("#realtox").show();
            $("#random").show();
            $("#hendrik").show();
            $("#jens").show();

        }
        else if(this.value == '1')
        {
            $("#jens").hide();
            $("#realtox").hide();
            $("#random").hide();
            $("#hendrik").hide();
            $("#jens").show();
        }else if(this.value == '2')
        {
            $("#jens").hide();
            $("#realtox").show();
            $("#random").hide();
            $("#hendrik").hide();
            $("#jens").hide();
        }else if(this.value == '3')
        {
            $("#jens").hide();
            $("#realtox").hide();
            $("#random").hide();
            $("#hendrik").show();
            $("#jens").hide();
        }else if(this.value == '4')
        {
            $("#jens").hide();
            $("#realtox").hide();
            $("#random").show();
            $("#hendrik").hide();
            $("#jens").hide();
        }else if(this.value == '5')
        {
            $("#jens").hide();
            $("#realtox").hide();
            $("#random").hide();
            $("#hendrik").hide();
        }
    });
});