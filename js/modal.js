$(function(){

    $(document).on('click', '.add_customer', function(e){
  	    $('#add_customer_modal').modal('show');
  	});

     $(document).on('click', '.add_supplier', function(e){
        $('#add_supplier_modal').modal('show');
    });

    $(document).on('click', '.add_product', function(e){
        $('#add_product_modal').modal('show');
    });

    $(document).on('click', '.add_product_category', function(e){
        $('#add_product_category_modal').modal('show');
    });

    $(document).on('click', '.add_cheque', function(e){
        $('#add_cheque_modal').modal('show');
    });

    //----- Customer------------


     $(document).on('submit', '#customer_modal', function(e){
        var customer_name = $('.modal_customer_name').val();
        var email = $('.modal_customer_email').val();
        var mobile_no = $('.modal_customer_mobile').val();
        var address = $('.modal_customer_address').val();
        var company_name = $('.modal_customer_com_name').val();
        var company_address = $('.modal_customer_com_address').val();
        var company_website = $('.modal_customer_com_web').val();
        var status = $(".status:checked").val();
        var form_action_value = $('#customer_modal').attr('action');

        var data = {
          customer_name: customer_name,
          email: email,
          mobile_no: mobile_no,
          address: address,
          company_name: company_name,
          company_address: company_address,
          company_website: company_website,
          status: status,
          _token : csrf_token
        };

        e.preventDefault();
        $.ajax({
          method: "POST",
          type: "json",
          url: form_action_value,
          data: data,
          success : function(data){
            if(data.status){
                var customer_option = data.result;
                $('.customer_modal_sales').html(customer_option);
                $('#customer_modal')[0].reset();
                $('#add_customer_modal').modal('hide');
            }else{
              console.log('Error Occured!!!');
              $('.error').html('**Mobile No. Already Exist');
            }
          },
          error : function(err){
            //console.log('Error Occured!!!');
          }
        });
        return false;
    });

    //----- Supplier------------


     $(document).on('submit', '#supplier_modal', function(e){
        var supplier_name = $('.modal_supplier_name').val();
        var email = $('.modal_supplier_email').val();
        var mobile_no = $('.modal_supplier_mobile').val();
        var address = $('.modal_supplier_address').val();
        var company_name = $('.modal_supplier_com_name').val();
        var company_address = $('.modal_supplier_com_address').val();
        var company_website = $('.modal_supplier_com_web').val();
        var status = $(".status:checked").val();
        var form_action_value = $('#supplier_modal').attr('action');

        var data = {
          supplier_name: supplier_name,
          email: email,
          mobile_no: mobile_no,
          address: address,
          company_name: company_name,
          company_address: company_address,
          company_website: company_website,
          status: status,
          _token : csrf_token
        };

        e.preventDefault();
        $.ajax({
          method: "POST",
          type: "json",
          url: form_action_value,
          data: data,
          success : function(data){
            if(data.status){
                var supplier_option = data.result;
                $('.supplier_modal_purchase').html(supplier_option);
                $('#supplier_modal')[0].reset();
                $('#add_supplier_modal').modal('hide');
            }else{
              console.log('Error Occured!!!');
              $('.error').html('*****Mobile No. Already Exist');
            }
          },
          error : function(err){
            //console.log('Error Occured!!!');
          }
        });
        return false;
    });

    //----- Cheque------------


     $(document).on('submit', '#cheque_modal', function(e){
        var cheque_no = $('.modal_cheque_no').val();
        var amount = $('.modal_amount').val();
        var cheque_date = $('.modal_cheque_date').val();
        var bank_name = $('.modal_bank_name').val();
        var branch_name = $('.modal_branch_name').val();
        var type = $('.modal_type').val();
        var status = $(".status:checked").val();
        var form_action_value = $('#cheque_modal').attr('action');

        var data = {
          cheque_no: cheque_no,
          amount: amount,
          cheque_date: cheque_date,
          bank_name: bank_name,
          branch_name: branch_name,
          type: type,
          status: status,
          _token : csrf_token
        };

        e.preventDefault();
        $.ajax({
          method: "POST",
          type: "json",
          url: form_action_value,
          data: data,
          success : function(data){
            if(data.status){
                var cheque_option = data.result;
                $('.cheque_modal_purchase').html(cheque_option);
                $('.cheque_modal_sales').html(cheque_option);
                $('#cheque_modal')[0].reset();
                $('#add_cheque_modal').modal('hide');
            }else{
              console.log('Error Occured!!!');
            }
          },
          error : function(err){
            //console.log('Error Occured!!!');
          }
        });
        return false;
    });


     //----- Product ------------


     $(document).on('submit', '#product_modal', function(e){
        e.preventDefault();
        var form_action_value = $('#product_modal').attr('action');

        $.ajax({
          method: "POST",
          url: form_action_value,
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success : function(data){
            if(data.status){
                var product_option = data.result;
                $('.modal_product').html(product_option);
                $('#product_modal')[0].reset();
                $('#add_product_modal').modal('hide');
            }else{
              console.log('Error Occured!!!');
              //$('.error').html('**Mobile No. Already Exist');
            }
          },
          error : function(err){
            console.log('Error Occured!!!');
          }
        });
        return false;
    });

     //----- Product Category ------------


     $(document).on('submit', '#product_category_modal', function(e){
        var parent_id = $('.modal_parent_id').val();
        var category_name = $('.modal_category_name').val();
        var status = $(".status:checked").val();
        var form_action_value = $('#product_category_modal').attr('action');

        var data = {
          parent_id: parent_id,
          category_name: category_name,
          status: status,
          _token : csrf_token
        };

        e.preventDefault();
        $.ajax({
          method: "POST",
          type: "json",
          url: form_action_value,
          data: data,
          success : function(data){
            if(data.status){
                var category_option = data.result;
                $('.modal_parent_id').html(category_option);
                $('.product_category_modal').html(category_option);
                $('#product_category_modal')[0].reset();
                $('#add_product_category_modal').modal('hide');
            }else{
              console.log('Error Occured!!!');
              $('.error').html('**Category Name Exist');
            }
          },
          error : function(err){
            //console.log('Error Occured!!!');
          }
        });
        return false;
    });

    $('.price').on('keyup', function(e){
       var price = parseFloat($(this).val());
       var qty = parseFloat($(this).parent('td').siblings('td').children('.qty').val());
       var less = parseFloat($(this).parent('td').siblings('td').children('.less').val());

       if(isNaN(price)){
          price = 0;
       }
       if(isNaN(qty)){
          qty = 0;
       }

       if(isNaN(less)){
          less = 0;
       }

       var total = parseFloat((price*qty)-less);
       $(this).parent('td').siblings('td').children('.subtotal').val(total);
    });

    $('.qty').on('keyup', function(e){
       var qty = parseFloat($(this).val());
       var price = parseFloat($(this).parent('td').siblings('td').children('.price').val());
       var less = parseFloat($(this).parent('td').siblings('td').children('.less').val());

       //console.log(price);

       if(isNaN(price)){
          price = 0;
       }

       if(isNaN(less)){
          less = 0;
       }

       if(isNaN(qty)){
          qty = 0;
       }

       var total = parseFloat((price*qty)-less);
       $(this).parent('td').siblings('td').children('.subtotal').val(total);
    });

    $('.less').on('keyup', function(e){
       var less = parseFloat($(this).val());
       var price = parseFloat($(this).parent('td').siblings('td').children('.price').val());
       var qty = parseFloat($(this).parent('td').siblings('td').children('.qty').val());

       //console.log(price);

       if(isNaN(price)){
          price = 0;
       }

       if(isNaN(qty)){
          qty = 0;
       }

       if(isNaN(less)){
          less = 0;
       }

       var total = parseFloat((price*qty)-less);
       $(this).parent('td').siblings('td').children('.subtotal').val(total);
    });


});