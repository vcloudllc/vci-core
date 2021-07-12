</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<script>
$(document).ready( function () {

    $('#table_id').DataTable({
        dom: 'lBfrtip',
        buttons : [ {
            extend : 'excelHtml5',
            text : 'Export to Excel',
            filename: 'Request for Proposal',
            title: null,
            exportOptions : {
                modifier : {
                    page : 'all'
                },
			        	columns: [0,1,2,3,4,5,6,8,9]
            }
        } ],
        
    });

    $('#entryModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('button') // Extract info from data-* attributes
        console.log(recipient);
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);

        if(recipient=='@edit'){
            modal.find('.modal-title').text('Edit Entry');
            modal.find('.modal-footer #submitbtn').text('Edit').removeClass('btn-success').addClass('btn btn-primary');
        }
        else if(recipient=='@add'){
            modal.find('.modal-title').text('Add an Entry');
            modal.find('.modal-footer #submitbtn').text('Add').removeClass('btn-primary').addClass('btn btn-success');
        }
    });

    $("#submitbtn").click(function(){
        let data = {
        question_category : ($('input[id="blockcaller"]:checked').val() == 'true') ? $('#reason-block-textarea').val() : '',
        industry: $('#caseID').val()
        } 
        $.ajax({
            url : '/addRFPEntry',
            type : 'POST',
            data : data,
            success : function(data) {              
                alert('Data: '+data);
            },
            error : function(request,error)
            {
                alert("Request: "+JSON.stringify(request));
            }
        });
    }); 

    

} );
</script>
