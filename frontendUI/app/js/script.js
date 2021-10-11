


// function myFunction()
// {

// var http = new XMLHttpRequest();
// var url = 'http://genxshopping.herokuapp.com/signup';
// http.open('POST', url, true);

// var elements = document.getElementsByClassName("formVal"); // Lay gia tri va name cua cac o nhap lieu
// var formData = new FormData(); 
//     for(var i=0; i<elements.length; i++)
//     {
//         formData.append(elements[i].getAttribute("name"), elements[i].value);// Noi cac gia tri da nhap vao bien formdata
//     }
// //Send the proper header information along with the request
// http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

// http.onreadystatechange = function() {//Call a function when the state changes.
//     if(http.readyState == 4 && http.status == 200) {
//         alert(http.responseText);
//     }
// }
// http.send(formData);
 
// }

function myfun(){
const xhr = new XMLHttpRequest();

// listen for `load` event
xhr.onload = () => {

    // print JSON response
    if (xhr.status >= 200 && xhr.status < 300) {
        // parse JSON
        const response = JSON.parse(xhr.responseText);
        console.log(response);
    }
};
 var name = document.getElementById("name").value;
 var email = document.getElementById("email").value;
 var password = document.getElementById("password").value;
// create a JSON object
const json = {
	"username":name,
    "email": email,
    "password": password
};

// open request
xhr.open('POST', 'https://genxshopping.herokuapp.com/signup');

// set `Content-Type` header
xhr.setRequestHeader('Content-Type', 'application/json');

// send rquest with JSON payload
xhr.send(JSON.stringify(json));
}


