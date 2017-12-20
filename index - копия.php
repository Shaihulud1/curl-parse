<?php require_once "simple_html_dom.php";
// <span id="ctl00_ctl00_main_PlaceHolderMain_atiTrace_lblTotalDistance">1880</span>
$data = file_get_html('http://ati.su/Trace/Default.aspx?EntityType=Trace&City1=самара&City5=москва');
if($data->innertext!='' and count($data->find('#ctl00_ctl00_main_PlaceHolderMain_atiTrace_lblTotalDistance'))){
  foreach($data->find('#ctl00_ctl00_main_PlaceHolderMain_atiTrace_lblTotalDistance') as $a){
    echo $a->plaintext;
  }
 $data->clear(); 
 unset($data);  
}
?>
                                        <textarea class="prod_desc"style="display:none;">Тут описание</textarea>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<button id='btn'>Нажми сюда</button>

<?php
// $homepage = file_get_contents('http://ati.su/Trace/Default.aspx?EntityType=Trace&City1=самара&City5=минск');
// echo $homepage;
?>







<script>  
    //  $('#btn').click(function(){  
    //     // $.ajax({
    //     //     type: "GET",
    //     //     url: "http://ati.su/Trace/Default.aspx?EntityType=Trace&City1=самара&City5=минск",
    //     //     data: 
    //     //     {},            
    //     //     success: function(data)
    //     //     {   
    //     //         alert(data);
    //     //     },
    //     //     error: function(){
    //     //     }
    //     // });
    //     // $.get("http://ati.su/Trace/Default.aspx?EntityType=Trace&City1=самара&City5=минск", function(data) {
    //     //           console.log(data)
    //     //           // var $obj = $(data).find(".sp5");
    //     //       //дальше легко вытягиваем данные из $obj
    //     //      }
    //     // ); 
    //     $data=http_build_query($_POST);
    //     $contx=stream_context_create(array('http'=>array(
    //         'method'=>'GET',
    //         'header'=>'content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    //         'content'=>$data
    //     )));
    //     readfile("http://$_POST['ati.su/Trace/Default.aspx?EntityType=Trace&City1=самара&City5=минск']",false,$contx);            
    //     return false;
    // });
</script>   
</body>
</html> -->
