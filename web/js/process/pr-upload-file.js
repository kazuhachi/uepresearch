$(document).ready(function(){

    

})

function uploadFile(targetInput, filenameStr){

    // let fd = new FormData();
    // let file = targetInput[0].files[0];
    // fd.append('file',files);
    // let returnData;

    let fd = new FormData();
    let file = targetInput[0].files[0];
    let fileExt = file.name;
    var blob = file.slice(0, file.size, 'document/text/docx/doc'); 
   
    
    

    let constructedFileName = `${filenameStr}-${fileExt}`;
    file = new File([blob], constructedFileName, {type: 'text/txt/docx/doc'});


    fd.append('file',file);
    
    return $.ajax({
        url: 'process/upload-file.php',
        type: 'post',
        data: fd,
        contentType: false, 
        processData: false,
        success: function(data){
            return  data;
        },
        fail: function(){
            return  0;
        }
    });


    function getLatestFileIndex(){
        $.when(function(){
            return $.post("process/pr-fileGetIndex.php",{
                process : 'getIndex'
            }, function(data, status){
                
                if (status == "success"){
                    
                }else{

                }
                
            })
        }).done(function(returnVal){

        })
    }
}