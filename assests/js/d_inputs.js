<script type="text/javascript">
              $(function () {
                $('[id="sel_city[]"]').change(function () {
                  var x = document.getElementById("dept_code").value;
                          // $('#col_code').val(x);
                          var dept_code=x;
                  var city = $(this).val();

                            // AJAX request
                            $.ajax({
                              "url": "<?php echo site_url('StudindregController/getCityDepartment/'.$dept_code)?>",

                              method: 'post',
                              data: {city: city,"dept_code":dept_code},
                              dataType: 'json',
                              success: function(response){

                                // Remove options 
                                $('#sel_user').find('option').not(':first').remove();
                                $('[id="sel_depart[]"]').find('option').not(':first').remove();

                                // Add options
                                $.each(response,function(index,data){
                                   $('[id="sel_depart[]"]').append('<option value="'+data['subj_name']+'">'+data['subj_name']+'</option>');
                                });
                              }
                           });
                });
              });
            </script>