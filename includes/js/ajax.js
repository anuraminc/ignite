function ajaxService(serviceURL, reqMethod, arguments) {
    var req = newXMLHttpRequest();
    var handlerFunction = getReadyStateHandler(req, reqMethod);
    req.onreadystatechange = handlerFunction;
    req.open("POST", serviceURL,
        true);
    req.setRequestHeader("Content-Type",
        "application/x-www-form-urlencoded");
    req.send(arguments);
}

function getReadyStateHandler(req, responseXmlHandler) {
    return function() {
        if (req.readyState == 4) {
            if (req.status == 200) {
                responseXmlHandler(req.responseText);
            } else {
                alert("HTTP error: " + req.status);
            }
        }
    };
}
function newXMLHttpRequest() {
    var xmlreq = false;
    if (window.XMLHttpRequest) {
        xmlreq = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        try {
            xmlreq = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e1) {
            try {
                xmlreq = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e2) {
            }
        }
    }
    return xmlreq;
}


function loadDetails(returnValue) {
    var bkFrm = document.forms[0];
    listElements = returnValue.split(",");
    for ( var i = 0; i < listElements.length; i++) {
        element = listElements[i].split("=");
        document.getElementById(element[0]).value = element[1];
    }
}