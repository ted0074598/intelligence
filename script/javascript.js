$(document).ready(function(){
  //用户操作
$('#adddep').click(function(){
                              var $addbotton='#deptable';
                              $($addbotton).toggle('slow');
                              var $link=$(this);
                              if($link.text()=='增加用户')
                                      {
                                        $link.text('取消增加');
                                      }else
                                      {
                                        $link.text('增加用户');
                                      }
                                  });
                  
$(document).ready(function(){

                    $('.d_xiugai').click(function(){
                      $('#fofo').fadeIn();
                      $('#fofo').fadeIn("slow");
                      $('#fofo').fadeIn(3000); 
                      var t=$(this).val();
                        var t_id='#up_d_id'+t;
                        var t_id=$(t_id).val();
                        var t_part='#up_d_part'+t;
                        var t_part=$(t_part).val();
                        var t_are='#up_d_are'+t;
                        var t_are=$(t_are).val();
                        var t_pri='#up_d_pri'+t;
                        var t_pri=$(t_pri).val();
                        var t_class='#up_d_class'+t;
                        var t_class=$(t_class).val();
                        var t_pws='#up_d_pws'+t;
                        var t_pws=$(t_pws).val();
                        // confirm(t_part);
                        $('#upd_id').attr('value',t_id);
                        $('#upd_name').attr('value',t_part);
                        $('#upd_are').attr('value',t_are);
                        $('#upd_pws').attr('value',t_pws);
                        $("#up_class").val(t_class);
                        $('#upd_pri').val(t_pri);
                      });

               $('.d_del').click(function(){
                           if(confirm("确认删除"))
                       {

                            var t=$(this).val();
                            //alert(t);
                            window.location.href='pople.php?indele_id='+t;
                       }
                       else
                        {
                             refresh();
                       }
                     });     


  $('.xiugai_cance_id').click(function(){
                    event.preventDefault();
                   $('#updattable').fadeOut();
                    $('#updattable').fadeOut("slow");
                    $('#updattable').fadeOut(3000);
                    $('#fofo').fadeOut();
                    $('#fofo').fadeOut("slow");
                    $('#fofo').fadeOut(3000);
     })

     $("#plus_part").validate({
      errorPlacement: function(error, element) {
    
      $( element )
        .closest( "form" )
          .find( "label[for='" + element.attr( "id" ) + "']" )
            .append( error );
    },
    errorElement: "span",
          rules:{
                        in_name:"required",
                         in_pws:"required",
                          in_are:"required",
                           in_pri:"required",
                       },    

          messages: {
                          in_name: "名称不能为空",
                          in_pws:"密码不能为空",
                          in_are:"地区不能为空",
                          in_pri:"权限不能为空",
                           }
               

          });  
$("#up_depat").validate({
      errorPlacement: function(error, element) {
    
      $( element )
        .closest( "form" )
          .find( "label[for='" + element.attr( "id" ) + "']" )
            .append( error );
    },
    errorElement: "span",
          rules:{
                        upd_name:"required",
                        upd_pws:"required",
                        upd_are:"required",
                        upd_pri:"required"
                  },    

          messages: {
                          upd_name: "名称不能为空",
                          upd_pws: "密码不能为空",
                          upd_are: "地区不能为空",
                          upd_pri: "权限不能为空"
                         }
               

          });  
//用户操作
//案件操作==案件操作===案件操作==案件操作==案件操作==案件操作==案件操作==案件操作==案件操作==案件操作==案件操作==案件操作==案件操作
          
          $('#addcase').click(function(){
              var $addbotton='#casetable';
              $($addbotton).toggle('slow');
              var $link=$(this);
              if($link.text()=='增加案件')
                      {
                        $link.text('取消增加');
                      }else
                      {
                        $link.text('增加案件');
                      }
                  });

            $('.c_xiugai').click(function(){
                      $('#newcase').fadeIn();
                      $('#newcase').fadeIn("slow");
                      $('#newcase').fadeIn(3000); 
                      $('#addcase').fadeOut();
                      $('#addcase').fadeOut("slow");
                      $('#addcase').fadeOut(3000);
                      var t=$(this).val();
                      var t_id='#up_c_id'+t;
                      var t_id=$(t_id).val();
                      var t_name='#up_c_name'+t;
                      var t_name=$(t_name).val();
                      var t_content='#up_c_content'+t;
                      var t_content=$(t_content).val();
                      var t_state='#up_c_state'+t;
                      var t_state=$(t_state).val();
                      var t_note='#up_c_note'+t;
                      var t_note=$(t_note).val();
                       //confirm(t_name);
                      $('#upd_id').attr('value',t_id);
                      $('#upd_name').attr('value',t_name);
                      // $('#upd_content').attr('value',t_content);
                      UE.getEditor('upd_content').setContent(t_content);
                       $('#upd_state').val(t_state);
                       $('#upd_note').attr('value',t_note);
                });
                  $('.c_xiugai_cance').click(function(){
                    event.preventDefault();
                   $('#newcase').fadeOut();
                    $('#newcase').fadeOut("slow");
                    $('#newcase').fadeOut(3000);
                    $('#casetable').fadeOut();
                    $('#casetable').fadeOut("slow");
                    $('#casetable').fadeOut(3000);
                     $('#addcase').fadeIn();
                      $('#addcase').fadeIn("slow");
                      $('#addcase').fadeIn(3000);
     })
                      $('.c_del').click(function(){
                           if(confirm("确认删除"))
                       {

                            var t=$(this).val();
                            //alert(t);
                            window.location.href='newcase.php?c_dele_id='+t;
                       }
                       else
                        {
                             refresh();
                       }
                     });     


$("#case_add_yan").validate({
      errorPlacement: function(error, element) {
    
      $( element )
        .closest( "form" )
          .find( "label[for='" + element.attr( "id" ) + "']" )
            .append( error );
    },
    errorElement: "span",
          rules:{
                      c_name:"required",
                      c_content:"required",
                      c_state:"required",
                      c_note:"required",
                       },    

          messages: {
                          c_name: "名字不能为空",
                          c_content:"内容不能为空",
                          c_state:"状态不能为空",
                          c_note:"备注不能为空",
                           }
               

          });  
$("#case_upd_yan").validate({
      errorPlacement: function(error, element) {
    
      $( element )
        .closest( "form" )
          .find( "label[for='" + element.attr( "id" ) + "']" )
            .append( error );
    },
    errorElement: "span",
          rules:{
                        upd_name:"required",
                        upd_content:"required",
                        upd_state:"required",
                        upd_note:"required",
                  },    

          messages: {
                          upd_name: "名字不能为空",
                          upd_content:"内容不能为空",
                          upd_state:"状态不能为空",
                          upd_note:"备注不能为空",
                         }
               

          });  

//案件操作==案件操作===案件操作==案件操作==案件操作==案件操作==案件操作==案件操作==案件操作==案件操作==案件操作==案件操作==案件操作
//情报操作============================================================
$('#list_show').click(function(){
                              var $addbotton='#case_list';
                              $($addbotton).toggle('slow');
                              var $link=$(this);
                              if($link.text()=='显示专项')
                                      {
                                        $link.text('隐藏专项');
                                      }else
                                      {
                                        $link.text('显示专项');
                                      }
                                  });
  $('#list_add_cance').click(function(){
                    event.preventDefault();
                    $('#list_add').fadeOut();
                    $('#list_add').fadeOut("slow");
                    $('#list_add').fadeOut(3000);
                    $('#wall').fadeOut();
                    $('#wall').fadeOut("slow");
                    $('#wall').fadeOut(3000);
                   
                   });
  $('#add_list_start').click(function(){
                  $('#list_add').fadeIn();
                    $('#list_add').fadeIn("slow");
                    $('#list_add').fadeIn(3000);
                    $('#wall').fadeIn();
                    $('#wall').fadeIn("slow");
                    $('#wall').fadeIn(3000); 
                     }); 
  $('.L_del').click(function(){
                           if(confirm("确认删除"))
                       {

                            var t=$(this).val();
                            //alert(t);
                            window.location.href='list.php?L_dele='+t;
                       }
                       else
                        {
                             refresh();
                       }
                     });    
$('.L_upd').click(function(){
                    if(confirm("确认采用？"))
                    {

                    var t=$(this).val();
                    //alert(t);
                    window.location.href='list.php?L_upd='+t;
                    }
                    else
                    {
                    refresh();
                    }
                    }); 
//情报操作============================================================
//公告操作=============================================================
 $('#add_news').click(function(){
                  $('#new_add').fadeIn();
                    $('#new_add').fadeIn("slow");
                    $('#new_add').fadeIn(3000);
                    $('#new_wall').fadeIn();
                    $('#new_wall').fadeIn("slow");
                    $('#new_wall').fadeIn(3000); 
                     }); 

  $('#list_new_cance').click(function(){
                    event.preventDefault();
                    $('#new_add').fadeOut();
                    $('#new_add').fadeOut("slow");
                    $('#new_add').fadeOut(3000);
                    $('#new_wall').fadeOut();
                    $('#new_wall').fadeOut("slow");
                    $('#new_wall').fadeOut(3000);
                   
                   });

  $('.n_del').click(function(){
                           if(confirm("确认删除"))
                       {

                            var t=$(this).val();
                            //alert(t);
                            window.location.href='gonggao.php?n_del='+t;
                       }
                       else
                        {
                             refresh();
                       }
                     }); 



//公告操作=============================================================

 $('#add').click(function(){
                    $('#addtable').fadeIn();
                    $('#addtable').fadeIn("slow");
                    $('#addtable').fadeIn(3000);
                    $('#quxiao').fadeIn();
                    $('#quxiao').fadeIn("slow");
                    $('#quxiao').fadeIn(3000); 

                  });
   $('#quxiao').click(function(){
                    $('#addtable').fadeOut();
                    $('#addtable').fadeOut("slow");
                    $('#addtable').fadeOut(3000);
                    $('#quxiao').fadeOut();
                    $('#quxiao').fadeOut("slow");
                    $('#quxiao').fadeOut(3000);
                  });


$(".radio-inline").change(function() {
          var $selectedvalue = $("input[name='c_state']:checked").val();
         //alert($selectedvalue);
          if ($selectedvalue == 2) {
                    $('#bujian').fadeIn();
                    $('#bujian').fadeIn("slow");
                    $('#bujian').fadeIn(3000);
          }else
          {
                    $('#bujian').fadeOut();
                    $('#bujian').fadeOut("slow");
                    $('#bujian').fadeOut(3000);
          }
        });   

               
    $('.lingqu_id').click(function(){
                          if(confirm("确定机器修好已经领走？")){
                                       if(confirm("确定机器修好已经领走？")){
                                            
                                            var t=$(this).val();
                                            window.location.href='index.php?id='+t;
                                            alert (t+'号机器被领走');
                                       }else
                                       {
                                           refresh();
                                       }
                       }
       });
        

        $('.print_id').click(function(){
                           if(confirm("确认打印"))
                       {

                            var t=$(this).val();
                           // alert (t);
                            window.location.href='work.php?id='+t;
                       }
                       else
                        {
                             refresh();
                       }

       });     

        $('.weixiu_id').click(function(){
                           if(confirm("确认维修"))
                       {

                            var t=$(this).val();
                           // alert (t);
                            window.location.href='doit.php?id='+t;
                       }
                       else
                        {
                             refresh();
                       }

       });   



               $('.part_del').click(function(){
                           if(confirm("确认删除"))
                       {

                            var t=$(this).val();
                           //alert(t);
                            window.location.href='list.php?part_id='+t;
                       }
                       else
                        {
                             refresh();
                       }

       });     




          jQuery.validator.addMethod("isMobile", function(value, element) {
              var length = value.length;
              var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
              return this.optional(element) || (length == 11 && mobile.test(value));
          }, "请正确填写您的手机号码");




            $("#songxiu").validate({
              errorPlacement: function(error, element) {
    
      $( element )
        .closest( "form" )
          .find( "label[for='" + element.attr( "id" ) + "']" )
            .append( error );
    },
    errorElement: "span",
          rules:{
                          p_name:"required",
                          p_photo:{
                          required : true,
                          digits:true,
                          minlength : 11,
                          isMobile : true
                           },
                           c_fault:{
                            required:true,
                            minlength:10
                           }
                       },    

                     messages: {
                          p_name: "请输入您的名字",
                          p_photo: {
                              required : "请输入手机号",
                              minlength : "确认手机不能小于11个字符",
                              digits:"请输入数字",
                              isMobile : "请正确填写您的手机号码"
                                      },
                          c_fault:{
                            required:"请填写详细的问题所在，方便维修人员修理",
                            minlength:"最少输入10个字符"
                                     }
                         }
               

          });  


              $("#denglu").validate({
              errorPlacement: function(error, element) {
    
      $( element )
        .closest( "form" )
          .find( "label[for='" + element.attr( "id" ) + "']" )
            .append( error );
    },
    errorElement: "span",
          rules:{
                          p_no:"required",
                          p_psw:{
                          required : true,
                           },
                        
                       },    

                     messages: {
                          p_no: "请输入您的用户名",
                          p_psw: {
                              required : "请输入您的密码",
                                      },
                           }
               

          });  



       $("#addpart").validate({
      errorPlacement: function(error, element) {
    
      $( element )
        .closest( "form" )
          .find( "label[for='" + element.attr( "id" ) + "']" )
            .append( error );
    },
    errorElement: "span",
          rules:{
                        part:"required",
                        brand:"required",
                        size:"required",
                        price:"required",
                      },    

          messages: {
                          part: "部件不能为空",
                          brand: "品牌不能为空",
                          size: "型号不能为空",
                          price: "价格不能为空",
                          
                           }
               

          });  


          $("#updatpart").validate({
      errorPlacement: function(error, element) {
    
      $( element )
        .closest( "form" )
          .find( "label[for='" + element.attr( "id" ) + "']" )
            .append( error );
    },
    errorElement: "span",
          rules:{
                        up_part:"required",
                        up_brand:"required",
                        up_size:"required",
                        up_price:"required",
                      },    

          messages: {
                          up_part: "部件不能为空",
                          up_brand: "品牌不能为空",
                          up_size: "型号不能为空",
                          up_price: "价格不能为空",
                          
                           }
               

          });  





            $('.xiugai_id').click(function(){
                    $('#updattable').fadeIn();
                    $('#updattable').fadeIn("slow");
                    $('#updattable').fadeIn(3000); 
                    
                    var t=$(this).val();
                    var t_id='#up_s_id'+t;
                    var t_id=$(t_id).val();
                    var t_part='#up_s_part'+t;
                    var t_part=$(t_part).val();
                    var t_brand='#up_s_brand'+t;
                    var t_brand=$(t_brand).val();
                    var t_size='#up_s_size'+t;
                    var t_size=$(t_size).val();
                    var t_price='#up_s_price'+t;
                    var t_price=$(t_price).val();

                    $('#up_id').attr('value',t_id);
                    $('#up_part').attr('value',t_part);
                    $('#up_brand').attr('value',t_brand);
                    $('#up_size').attr('value',t_size);
                    $('#up_price').attr('value',t_price);
                     $('#up_price').placeholder=t_price;

                 
     });
             
             

});





})






