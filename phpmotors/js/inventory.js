'use strict'

var classificationList = document.querySelector('#classificationList')

classificationList.addEventListener('change', function(){
    var classificationId = classificationList.value;

    console.log(`classification Id is: ${classificationId}`);

    var classIdURL = "/phpmotors/vehicle/index.php?action=getInventoryItems&classificationId=" + classificationId;

    fetch(classIdURL).then(function(response){
        if(response.ok){
            return response.json();
        }

        throw Error("Network response was not OK");
    }).then(function(data){
        console.log(data);

        buildInventoryList(data);
    }).catch(function(error){
        console.log('There was a problem: ', error.message) ;
    })
})

function buildInventoryList(data) { 
    let inventoryDisplay = document.getElementById("inventoryDisplay"); 
    let dataTable = '<thead>'; 

    dataTable += '<tr><th>Vehicle Name</th><td>&nbsp;</td><td>&nbsp;</td></tr>'; 
    dataTable += '</thead>'; 
    dataTable += '<tbody>'; 

    data.forEach(function (element) { 
        console.log(element.invId + ", " + element.invModel); 
        dataTable += `<tr><td>${element.invMake} ${element.invModel}</td>`; 
        dataTable += `<td><a href='/phpmotors/vehicle?action=mod&invId=${element.invId}' title='Click to modify'>Modify</a></td>`; 
        dataTable += `<td><a href='/phpmotors/vehicle?action=del&invId=${element.invId}' title='Click to delete'>Delete</a></td></tr>`; 
    })

    dataTable += '</tbody>'; 
    
    inventoryDisplay.innerHTML = dataTable; 
}