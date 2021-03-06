<script>

    $(function() {
        $('#datepickerfrom, #datepickerto').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true, 
            endDate: new Date()
        });
        
        $("#datepickerfrom").on("changeDate", function (e) {
            $('#datepickerto').datepicker('setStartDate', $("#datepickerfrom").val() );
        });

        $('#datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        }).datepicker("setDate", "0");
        
    })
    
    $.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

 </script> 