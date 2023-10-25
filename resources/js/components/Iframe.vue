<!-- <script>

export default{
    props: ['modalGuia'],
    mounted(){       
        
        $(document).ready(function(){
            /* Get iframe src attribute value i.e. YouTube video url
            and store it in a variable */
            var url = $("#videoguia").attr('src');
            
            /* Assign empty url value to the iframe src attribute when
            modal hide, which stop the video playing */
            $("#modalGuia").on('data.bs.dismiss.modal', function(){
            $("#videoguia").attr('src', '');
        });
        
        /* Assign the initially stored url back to the iframe src
        attribute when modal is displayed again */
        $("#modalGuia").on('data.bs.toggle.modal', function(){
            $("#videoguia").attr('src', url);
        });
    });
}
}

</script> -->

<script>
import $ from 'jquery';

    // export default{
    //     props:{
            
    //     },
    //     $(document).ready(function() {
    //         var url = $("#Geeks3").attr('src');
    //         $("#Geeks2").on('hide.bs.modal', function() {
    //             $("#Geeks3").attr('src', '');
    //         });
    //         $("#Geeks2").on('show.bs.modal', function() {
    //             $("#Geeks3").attr('src', url);
    //         });
    //     }),
    // };
    </script>