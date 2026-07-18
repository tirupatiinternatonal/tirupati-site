

    <style>
  
  .bolg {
  width: auto;
  height: 40px;
  border-radius: 10px;
  background-color: #41d0a1;
  color: white;
  font-weight: bold;
  border: 0;
}

.bolg:hover {
  color: #fff;
  text-decoration: none;
}
  .gn{
    color: #41d0a1;
  }

  @media screen and (min-width: 600px) {
    .bolg {
  width: 33%;
 
}
  }
table{
    text-align:left;
}
</style>
<html>
    <body>
      
<table>
        <tr>
          <th>
            <h1><b>AMC Reminder</b></h1>
          </th>
        </tr>
   
         <tr>
            <td><b>From Date = </b><span> {{$emailData['from_date'] ?? ''}}</span></td>
            </tr>
       
         <tr>
            <td><b>To Date = </b><span> {{$emailData['to_date'] ?? ''}}</span></td>
            </tr>
       
         <tr>
            <td><b>Description = </b><span> {{$emailData['description'] ?? ''}}</span></td>
            </tr>
       

            
      </tbody>
    </table>


    </body>
</html>