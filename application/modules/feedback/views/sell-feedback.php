    <div class="modal inmodal fade" id="seller_feedback" tabindex="-1" role="dialog"  aria-hidden="true"> 

          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <h4 class="modal-title">Leave Feedback </h4>
                      <small class="font-bold"><strong >Feedback</strong> for <?php echo $this->company_model->get_where($this->member_model->get_where($sid)->company_id)->company_name; ?></small>
                  </div>
                  <div class="modal-body">
                  <div class="row">
                  <form>
                  	<input type="text" class="form-control" id="summary_feedback_<?php echo $order_id; ?>" placeholder="Summary of your thoughts and experience for this user" />
                    
                    <!-- 
                    <div class="form-group" style="margin-top:15px">
                        <label class="col-md-6 control-label" style="margin-top:10px;text-align:right">How accurate was the item description?</label>
                        <div class="col-md-6">
                            <input class="description-rating">
                        </div>
                    </div>
                    -->
                    <div class="form-group" style="margin-top:15px">
                        <label class="col-md-6 control-label" style="margin-top:10px;text-align:right">How satisfied were you with the users communication?</label>
                        <div class="col-md-6">
                            <input class="communication-rating" id="communication-rating_<?php echo $order_id; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 control-label" style="margin-top:10px;text-align:right">How quickly did the user dispatch the fund(s)?</label>
                        <div class="col-md-6">
                            <input class="shipping-rating" id="shipping-rating_<?php echo $order_id; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 control-label" style="margin-top:10px;text-align:right">Would you recommend this company to other users?</label>
                        <div class="col-md-6">
                            <input class="company-rating" id="company-rating_<?php echo $order_id; ?>">
                        </div>
                    </div>
                  </form>  
                  </div>
                  </div>
					
                  <div class="modal-footer">
                  <input type="hidden" name="order_id" id="order_id_<?php echo $order_id; ?>" value="<?php echo $order_id; ?>"/>
                      <input type="hidden" name="sent_by" id="sent_by_<?php echo $order_id; ?>" value="<?php echo $mid; ?>"/>
                      <input type="hidden" name="sent_to" id="sent_to_<?php echo $order_id; ?>" value="<?php echo $sid; ?>"/>
                      <button type="button" id="submit_message_<?php echo $order_id; ?>" class="btn btn-primary">Leave Feedback</button>
                      <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
    </div>
   
    <!-- Feedback Stars -->
    <link rel="stylesheet" href="public/main/template/gsm/css/star-rating.min.css" rel="stylesheet">
    <script type="text/javascript" src="public/main/template/gsm/js/star-rating.min.js"></script>
    <script>
    jQuery(document).ready(function () {
        var id = '<?php echo $order_id; ?>';
        //$('.description-rating').rating({'showCaption':true, 'stars':'5', 'min':'0', 'max':'5', 'step':'1', 'size':'xs', 'starCaptions': {0:'Very inaccurate', 1:'Very inaccurate', 2:'Inaccurate', 3:'Neither inaccurate nor accurate', 4:'Accurate', 5:'Very accurate'}});
        $('#communication-rating_' + id +'').rating({'showCaption':true, 'stars':'5', 'min':'0', 'max':'5', 'step':'1', 'size':'xs', 'starCaptions': {0:'Very Poor', 1:'Very Poor', 2:'Poor', 3:'Average', 4:'Good', 5:'Excellent'}});
        $('#shipping-rating_' + id +'').rating({'showCaption':true, 'stars':'5', 'min':'0', 'max':'5', 'step':'1', 'size':'xs', 'starCaptions': {0:'Very Slowly', 1:'Very Slowly', 2:'Slowly', 3:'Neither slowly nor quickly', 4:'Quickly', 5:'Very quickly'}});
        $('#company-rating_' + id +'').rating({'showCaption':true, 'stars':'5', 'min':'0', 'max':'5', 'step':'1', 'size':'xs', 'starCaptions': {0:'Very unlikely', 1:'Very unlikely', 2:'Unlikely', 3:'Neither likely or unlikely', 4:'Likely', 5:'Very likely'}});
        
        $(document).on('click', '#submit_message_' + id +'', function(event) {
            event.preventDefault();
            //function submitFeedback(mid, sid, order_id){
            // alert('test');
            
            $('#submit_message_' + id +'').hide(); 
            var mid             = $('#sent_by_' + id +'').val();
            var sid             = $('#sent_to_' + id +'').val();
            //var rateDesc        = $('.description-rating').val();
            var rateDesc        = 5;
            var rateComms       = $('#communication-rating_' + id +'').val();
            var rateShip        = $('#shipping-rating_' + id +'').val();
            var rateCompany     = $('#company-rating_' + id +'').val();
            var type            = 'sell';
            var order_id        = $('#order_id_' + id +'').val();

            //var subject = $("#subject").val().replace(/(\r\n|\n|\r)/gm, '%0D%0A');
            var body    = $('#summary_feedback_' + id +'').val().replace(/(\r\n|\n|\r)/gm, 'BREAK1');
            var body    = body.replace(/\//g, 'SLASH1');
            var body    = body.replace(/\?/g, 'QUEST1');
            var body    = body.replace(/\%/g, 'PERCENT1');

             $.ajax({
                    type: "POST",
                    url: "feedback/processFeedback/"+ mid +"/"+ sid +"/"+ rateDesc +"/"+ rateComms +"/"+ rateShip +"/"+ rateCompany +"/"+ order_id+"/"+ 2 +"/"+ body +"/" + type + "",
                    dataType: "html",
                    success:function(data){

                      window.location.href = "<?php echo base_url('marketplace/feedback_redirect')?>";
                    },
                });
            return FALSE;
        });
    
    });
    </script>
    