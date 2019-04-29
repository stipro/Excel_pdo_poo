//importo el excel a la base de datos//
$('#input-excel').change(function(e){
    var reader = new FileReader();
    reader.readAsArrayBuffer(e.target.files[0]);
    reader.onload = function(e) {
      var data = new Uint8Array(reader.result);
      var wb = XLSX.read(data,{type:'array'});
      var htmlstr = XLSX.write(wb,
        {
          sheet:"AVANCEVENDEDOR",
          type:'binary',bookType:'html'
        });
      $('#importacion')[0].innerHTML += htmlstr;
    }
  });
  //Capturo los datos y los envios con json al archivo insertar.php//
$(function() {
  $('form').on('submit', function( event ) {
    event.preventDefault();
    var myData = [],
    keys = 
    [
      'Selection0',
      'Selection1',
      'Selection2',
      'Selection3',
      'Selection4',
      'Selection5',
      'Selection6',
      'Selection7',
      'Selection8',
      'Selection9',
      'Selection10',
      'Selection11',
      'Selection12'
    ],
    url = this.action;
    $('table').find('tr:gt(0)').each
    (function( i, row )
    {
      var oRow = {};
      $( row ).find( 'td' ).each
      ( function( j, cell ) 
      {
        oRow[ keys[ j ] ] = $( cell ).text();
      });
       myData.push( oRow );
    });
    console.log( myData );
    console.log( JSON.stringify( myData ) );
        //myData = [ {"ID":"3u3y","Selection1",....},{"ID":"jdjdj",...}.... ]
        //now you can use one key to send all the data to your server
        //Ahora puede usar una tecla para enviar todos los datos a su servidor
        $.post( url="InserPDO.php", 
        { 
          mydata: JSON.stringify( myData ) 
        }, function(d) 
        { 
           alert( 'Se capturo los datos y se mando a registrar' ); 
        });
        //In your PHP script you would look for the data in mydata --> $_POST['mydata']
        //En tu script PHP buscarías los datos en mydata
    });
});
