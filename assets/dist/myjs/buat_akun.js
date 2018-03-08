
function myajax(id,data1,url,fbefore=null,fafter=null) {        
        if(fbefore != null){
            if(typeof fbefore==='function'){
               fbefore();
            }
        }
        
        $.ajax({
            "type" : "post",
            "url" : url,
            "cache" : false,
            "data" : data1,
            success : function (data) {
                if(id!=''){                  
                  $('#'+id).html(data);
                }
                
                if(fafter != null){
                    if(typeof fafter==='function'){
                       fafter(data);
                    }
                }
            }
        });
     }


function init(base_url)
{
   

    $("#jdwl").DataTable({"bPaginate": false,"ordering": false,"searching": false,"info": false}); 
   
   
    $("[data-mask]").inputmask();    
    
    $(".select2").select2();

    //Date picker
    $('#tgl').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });

    $('#tgl_tanya').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });

    $("#fak").change(function () {
       var idfak = $('#fak option:selected').val();
       data = "idfak=" + idfak;
       myajax('prodi',data,base_url+'index.php/Main_dashboard/get_prodi');       
      });        

    $("#buat_akun").validate();

    $("#buat_akun").submit(function(e) {

        //prevent Default functionality
        e.preventDefault();
        var isvalid = $("#buat_akun").valid();
        if (isvalid) {
              var ktp = $("#ktp").val();
              var t = $("#tgl").val();
              var jk = $("#jk").val();
              if(jk=='P'){
                var tmp =Number(t.substr(0,2))+40;
                var sTgl = tmp.toString()+t.substr(3,2)+t.substr(8,2); 
              }else{    
                var sTgl = t.substr(0,2)+t.substr(3,2)+t.substr(8,2);
              }  
              if (ktp.search(sTgl)<0)
              {
                $('#ket').html('<div class="callout callout-danger"><h4>Pemberitahuan</h4><p>Tanggal lahir dan nomor ktp-nya tidak cocok !</p> </div>');
              }else{     
                   data = $("#buat_akun").serialize();
                   myajax('ket',data,base_url+'index.php/Main_dashboard/save');    
              }
        }        
    });
}     